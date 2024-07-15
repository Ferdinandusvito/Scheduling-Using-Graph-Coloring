<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengajuan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengajuan_model");
        $this->load->model("barang_model");
        $this->load->library('form_validation');
    }
        public function index()
    {
        $data['load_lab'] = $this->pengajuan_model->load_lab();
        $data['load_status'] = $this->pengajuan_model->load_status();
        $data['load_cek'] = $this->pengajuan_model->load_cek();
        $data['load_tanggal'] = $this->pengajuan_model->load_tanggal();
        $data["pengajuan_barang"] = $this->pengajuan_model->getAll();
        $data["pengajuan_barang"] = $this->pengajuan_model->get_by_roles();
            $this->load->view("dosen/pengajuan", $data);
    }
public function cek()    
     {
        $data['load_lab'] = $this->pengajuan_model->load_lab();
        $data['load_status'] = $this->pengajuan_model->load_status();
        $data['load_cek'] = $this->pengajuan_model->load_cek();
        $data['load_tanggal'] = $this->pengajuan_model->load_tanggal();
        $data["pengajuan_barang"] = $this->pengajuan_model->getAll();
        $data["pengajuan_barang"] = $this->pengajuan_model->get_by_roles();
        $this->load->view("dosen/cek", $data);
    }
    
     public function inventaris()
    {
        $data["barang"] = $this->barang_model->getAll();
        $data["barang"] = $this->barang_model->get_by_role();
         $data['load_lab'] = $this->barang_model->load_lab();
        $data['load_status'] = $this->barang_model->load_status();
        $data['load_kondisi'] = $this->barang_model->load_kondisi();
        $data["barang"] = $this->barang_model->getAll();
        $data["barang"] = $this->barang_model->get_by_role();
        $this->load->view("dosen/Inventaris", $data);
    }


    public function tambahpengajuan()
    {
        $this->load->model('pengajuan_model');
        $this->load->model('combobox_modeldosen');
        $validation = $this->form_validation;
        $data['status_pengajuan'] = $this->combobox_modeldosen->getstatus();	
        $data['laboratorium'] = $this->combobox_modeldosen->getlaboratorium();
        $data['cek_barang'] = $this->combobox_modeldosen->getcek();
        $this->load->view("dosen/tambahpengajuan", $data);
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('pengajuan');
        $this->load->model('combobox_modeldosen');
        $pengajuan_barang = $this->pengajuan_model;
        $validation = $this->form_validation;
        $data['status_pengajuan'] = $this->combobox_modeldosen->getstatus();  
        $data['laboratorium'] = $this->combobox_modeldosen->getlaboratorium();
        $data['cek_barang'] = $this->combobox_modeldosen->getcek();
        $validation->set_rules($pengajuan_barang->rules());
        if(isset($_POST['tombol_submit'])){
            $pengajuan_barang->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect("pengajuan");
        }
        $data["pengajuan_barang"] = $pengajuan_barang->getById($id);
        if (!$data["pengajuan_barang"]) show_404();
        
        $this->load->view("dosen/edit_pengajuan", $data);
    }
    public function hapus ($id_pengajuan)
    {
        $this->db->query("delete from pengajuan_barang where id_pengajuan = $id_pengajuan ");
        redirect("pengajuan");
    }

     public function aksi_upload(){
       // $config['upload_path']          = './assets/documents/laporan_pengajuan/';
       //  $config['allowed_types']        = 'pdf';
       //  $config['max_size']             = 25600000;
 
       //  $this->load->library('upload', $config);
        
       //      if ( ! $this->upload->do_upload('file')){
       //          $error = array('error' => $this->upload->display_errors());
       //          $this->load->view('v_upload', $error);
       //      }else{
       //          $data = array('upload_data' => $this->upload->data());
       //          $this->load->view('v_uploadSuccess', $data);
       //          $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $_table = "pengajuan_barang";
                $this->load->model('pengajuan_model');
                // $this->pengajuan_model->_table();
                // $file_name   = $upload_data['file_name'];
                // $nip         = $this->session->userdata("nip");
                // $post = $this->input->post();
                // $this->nama_dosen = $post["nama_dosen"];
                // $this->nip = $post["nip"];
                // $this->id_laboratorium = $post["id_laboratorium"];
                // $this->tanggal_pengajuan = $post["tanggal_pengajuan"];
                // $this->file = $file_name;
                // $this->nama_barang = $post["nama_barang"];
                // $this->spek = $post["spek"];
                // $this->vol = $post["vol"];
                // $this->id_status = $post["id_status"];
                // $this->id_cek = $post["id_cek"];
                // $this->db->insert($_table, $this);

                
                // JS ++
                $post = $this->input->post();
                $nama_dosen = $this->nama_dosen = $post["nama_dosen"];
                $nip = $this->nip = $post["nip"];
                $id_laboratorium = $this->id_laboratorium = $post["id_laboratorium"];
                $tanggal_pengajuan = $this->tanggal_pengajuan = $post["tanggal_pengajuan"];
                // $file_name   = $upload_data['file_name'];
                $nama_barang = $this->nama_barang = $post["nama_barang"];
                $spek = $this->spek = $post["spek"];
                $vol = $this->vol = $post["vol"];
                // $vol_datang = $this->vol_datang = $post["vol_datang"];
                $id_status = $this->id_status = '0';
                $id_cek = $this->id_cek = '0';
                $nip            = $this->session->userdata("nip");
                $data = [];
                for ($i=0; $i < count($nama_barang); $i++) { 
                    $data[] = [
                        'nama_dosen' => $nama_dosen,
                        'nip' => $nip,
                        'id_laboratorium' => $id_laboratorium,
                        'tanggal_pengajuan' => $tanggal_pengajuan,
                        // 'file' => $file_name,
                        // 'vol_datang' => $vol_datang,
                        'nama_barang' => $nama_barang[$i],
                        'spek' => $spek[$i],
                        'vol' => $vol[$i],
                        'id_status' => $id_status,
                        'id_cek' => $id_cek
                    ];
                }
                // var_dump($data);exit;
                $this->db->insert_batch("pengajuan_barang", $data);
                redirect("pengajuan");
                // var_dump($file_name);exit;
            
        }
     
        public function accept(){
            $this->id_pengajuan = $post["id"];
            $query       = "UPDATE pengajuan_barang SET id_cek = 2, WHERE == id_pengajuan = $post ";
            $sql         = $this->db->query($query);
            $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
            
            redirect (base_url("pengajuan"));
        }
 function exportExcel()
        {
            ob_clean();   
            $this->load->model('barang_model');
            $id_laboratorium       = (!empty($_POST['id_laboratorium'])) ? $_POST['id_laboratorium'] : '' ;
            $id_status       = (!empty($_POST['id_status'])) ? $_POST['id_status'] : '' ;
            $id_kondisi       = (!empty($_POST['id_kondisi'])) ? $_POST['id_kondisi'] : '' ;
            $tanggal_pembelian   = (!empty($_POST['tanggal_pembelian'])) ? $_POST['tanggal_pembelian'] : '' ;
           
            $query  = "SELECT
                       *
                       FROM
                            barang b
                        JOIN laboratorium l ON b.id_laboratorium = l.id_laboratorium 
                        JOIN status_barang sb on b.id_status = sb.id_status
                        JOIN kondisi_barang kb on b.id_kondisi = kb.id_kondisi
                        ";

             if (!empty($id_laboratorium)) {
                $query .= " AND (b.id_laboratorium = '$id_laboratorium')";
            }

            if (!empty($id_status)) {
                $query .= " AND (b.id_status = '$id_status')";
            }

            if (!empty($id_kondisi)) {
                $query .= " AND (b.id_kondisi = '$id_kondisi')";
            }
            
            if (!empty($tanggal_pembelian)) {
            $query .= " AND (b.tanggal_pembelian = '$tanggal_pembelian')";
            }
            $sql    = $this->db->query($query);
            $row    = $sql->result_array();
            // $data['dataAbdimas'] = $row;
            $spreadsheet = new Spreadsheet;
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'No')
                        ->setCellValue('B1', 'Nomor Inventaris')
                        ->setCellValue('C1', 'Nama Barang')
                        ->setCellValue('D1', 'Merk')
                        ->setCellValue('E1', 'Seri')
                        ->setCellValue('F1', 'Jumlah Barang')
                        ->setCellValue('G1', 'Tahun')
                        ->setCellValue('H1', 'Lab')
                        ->setCellValue('I1', 'Status')
                        ->setCellValue('J1', 'Kondisi');           
            $kolom = 2;
            $nomor = 1;
            foreach($row as $row) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $row['nomor_inventaris'])
                            ->setCellValue('C' . $kolom, $row['nama_barang'])
                            ->setCellValue('D' . $kolom, $row['merk'])
                            ->setCellValue('E' . $kolom, $row['seri'])
                            ->setCellValue('F' . $kolom, $row['jumlah_barang'])
                            ->setCellValue('G' . $kolom, $row['tanggal_pembelian'])
                            ->setCellValue('H' . $kolom, $row['nama_laboratorium'])
                            ->setCellValue('I' . $kolom, $row['nama_status'])
                            ->setCellValue('J' . $kolom, $row['nama_kondisi']);
                $kolom++;
                $nomor++;
            }
            
            // echo "CHECK: ";
            // echo sys_get_temp_dir(); exit();
            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data Inventaris.xlsx"');
            header('Cache-Control: max-age=0');
            
            $writer->save('php://output');

        }
        
                 function exportExcels()
        {
            ob_clean();   
            $id_laboratorium       = (!empty($_POST['id_laboratorium'])) ? $_POST['id_laboratorium'] : '' ;
            $id_status       = (!empty($_POST['id_status'])) ? $_POST['id_status'] : '' ;
            $id_cek       = (!empty($_POST['id_cek'])) ? $_POST['id_cek'] : '' ;
            $tanggal_pengajuan   = (!empty($_POST['tanggal_pengajuan'])) ? $_POST['tanggal_pengajuan'] : '' ;
           
            $query  = "SELECT
                       *
                       FROM
                            pengajuan_barang b
                        LEFT JOIN laboratorium l ON b.id_laboratorium = l.id_laboratorium 
                        LEFT JOIN status_pengajuan sb on b.id_status = sb.id_status
                        LEFT JOIN cek_barang cb on b.id_cek = cb.id_cek
                        WHERE b.id_pengajuan IS NOT NULL
                        ";

             if (!empty($id_laboratorium)) {
                $query .= " AND (b.id_laboratorium = '$id_laboratorium')";
            }

            if (!empty($id_status)) {
                $query .= " AND (b.id_status = '$id_status')";
            }

            if (!empty($id_kondisi)) {
                $query .= " AND (b.id_cek = '$id_cek')";
            }
            
            if (!empty($tanggal_pengajuan)) {
            $query .= " AND (b.tanggal_pengajuan = '$tanggal_pengajuan')";
            }
            $sql    = $this->db->query($query);
            $row    = $sql->result_array();
            // $data['dataAbdimas'] = $row;
            $spreadsheet = new Spreadsheet;
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'No')
                        ->setCellValue('B1', 'Nama Barang')
                        ->setCellValue('C1', 'Spesfikasi')
                        ->setCellValue('D1', 'Jumlah')
                        ->setCellValue('E1', 'Jumlah Datang')
                        ->setCellValue('F1', 'Lab')
                        ->setCellValue('G1', 'Status')
                        ->setCellValue('H1', 'Cek')
                        ->setCellValue('I1', 'Tanggal Pengajuan');
                        
           
            $kolom = 2;
            $nomor = 1;
            foreach($row as $row) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $row['nama_barang'])
                            ->setCellValue('C' . $kolom, $row['spek'])
                            ->setCellValue('D' . $kolom, $row['vol'])
                            ->setCellValue('E' . $kolom, $row['vol_datang'])
                            ->setCellValue('F' . $kolom, $row['nama_laboratorium'])
                            ->setCellValue('G' . $kolom, $row['nama_status'])
                            ->setCellValue('H' . $kolom, $row['nama_cek'])
                            ->setCellValue('I' . $kolom, $row['tanggal_pengajuan']);
                $kolom++;
                $nomor++;
            }
            
            // echo "CHECK: ";
            // echo sys_get_temp_dir(); exit();
            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data Pengajuan.xlsx"');
            header('Cache-Control: max-age=0');
            
            $writer->save('php://output');

        }
    
    
}


