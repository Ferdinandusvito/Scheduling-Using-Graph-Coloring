<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Lab extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("barang_model");
        $this->load->model("pinjam_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["barang"] = $this->barang_model->get_by_roles();
        $this->load->view("/lab/inventaris", $data);
    }

     public function editPengajuan($id = null)
    {
        if (!isset($id)) redirect('laboran/pengajuan');
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
            redirect("/laboran/pengajuan");
        }
        $data["pengajuan_barang"] = $pengajuan_barang->getById($id);
        if (!$data["pengajuan_barang"]) show_404();
        
        $this->load->view("laboran/edit_pengajuan", $data);
    }
    public function editpinjam($id = null)
    {
        if (!isset($id)) redirect('mahasiswa/peminjaman');
        $this->load->model('combobox_modelmahasiswa');
        $this->load->library('form_validation');
        $this->load->model('pinjam_model');
        $peminjaman = $this->pinjam_model;
        $validation = $this->form_validation;
        $data['laboratorium'] = $this->combobox_modelmahasiswa->getlab();
        $data['cek_pinjam'] = $this->combobox_modelmahasiswa->getstatus();
        $validation->set_rules($peminjaman->rules());
        if(isset($_POST['tombol_submit'])){
            $peminjaman->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["peminjaman"] = $peminjaman->getById($id);
        if (!$data["peminjaman"]) show_404();
        
        $this->load->view("lab/editpinjam", $data);
    }

     public function peminjaman()
    {
        $data['load_lab'] = $this->pinjam_model->load_lab();
        $data['load_status'] = $this->pinjam_model->load_status();
        $data['load_tanggalpinjam'] = $this->pinjam_model->load_tanggalpinjam();
        $data['load_tanggaldatang'] = $this->pinjam_model->load_tanggaldatang();
        $data['load_tanggalupdate'] = $this->pinjam_model->load_tanggalupdate();
        $data["peminjaman"] = $this->pinjam_model->getAll();
        $data["peminjaman"] = $this->pinjam_model->get_by_roles();
        $this->load->view("lab/peminjaman", $data);
    }

    public function add()
    {
        $this->load->model('barang_model');
        $this->load->model('combobox_modelab');
        $validation = $this->form_validation;
        $data['kondisi_barang'] = $this->combobox_modelab->getkondisi();
        $data['status_barang'] = $this->combobox_modelab->getstatus();  
        $data['laboratorium'] = $this->combobox_modelab->getlaboratorium();
        if(isset($_POST['tombol_submit'])){
                $this->barang_model->save($_POST);
                redirect("laboran");
            }
        $this->load->view("laboran/add", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('laboran/inventaris');
        $this->load->model('combobox_modelab');
        $barang = $this->barang_model;
        $validation = $this->form_validation;
        $data['kondisi_barang'] = $this->combobox_modelab->getkondisi();
        $data['status_barang'] = $this->combobox_modelab->getstatus();  
        $data['laboratorium'] = $this->combobox_modelab->getlaboratorium();
        $validation->set_rules($barang->rules());
        if(isset($_POST['tombol_submit'])){
            $barang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["barang"] = $barang->getById($id);
        if (!$data["barang"]) show_404();
        
        $this->load->view("laboran/edit_inventaris", $data);
    }
    public function hapus ($id_inventaris)
    {
        $this->db->query("delete from barang where id_inventaris = $id_inventaris ");
        redirect("laboran/");
    }
      public function accept(){
            $id_pengajuan = $this->db->escape($_POST['id_pengajuan']);
            $nip        = $this->db->escape($_POST['nip']);
            $query       = "UPDATE pengajuan_barang SET id_status = 1, WHERE id_pengajuan = $id_pengajuan ";
            $sql         = $this->db->query($query);
            $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
            
            redirect (base_url("laboran/pengajuan"));
        }
        function exportExcel()
        {
            $this->load->model('pinjam_model');
            ob_clean();   
            $id_laboratorium       = (!empty($_POST['id_laboratorium'])) ? $_POST['id_laboratorium'] : '' ;
            $id_pinjam       = (!empty($_POST['id_pinjam'])) ? $_POST['id_pinjam'] : '' ;
            $tanggal_peminjaman   = (!empty($_POST['tanggal_peminjaman'])) ? $_POST['tanggal_peminjaman'] : '' ;
            $tanggal_kembali   = (!empty($_POST['tanggal_kembali'])) ? $_POST['tanggal_kembali'] : '' ;
            $tanggal_update   = (!empty($_POST['tanggal_update'])) ? $_POST['tanggal_update'] : '' ;
           
            $query  = "SELECT
                       *
                       FROM
                            peminjaman b
                        JOIN laboratorium l ON b.id_laboratorium = l.id_laboratorium 
                        JOIN cek_pinjam sb on b.id_pinjam = sb.id_pinjam
                         ";

            if (!empty($id_laboratorium)) {
                $query .= " AND (b.id_laboratorium = '$id_laboratorium')";
            }

            if (!empty($id_pinjam)) {
                $query .= " AND (b.id_pinjam = '$id_pinjam')";
            }
            
            if (!empty($tanggal_peminjaman)) {
                $query .= " AND (b.tanggal_peminjaman = '$tanggal_peminjaman')";
            }

            if (!empty($tanggal_kembali)) {
                $query .= " AND (b.tanggal_kembali = '$tanggal_kembali')";
            }
            if (!empty($tanggal_update)) {
                $query .= " AND (b.tanggal_update = '$tanggal_update')";
            }
            $sql    = $this->db->query($query);
            $row    = $sql->result_array();
            // $data['dataAbdimas'] = $row;
            $spreadsheet = new Spreadsheet;
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'No')
                        ->setCellValue('B1', 'Nama Mahasiswa')
                        ->setCellValue('C1', 'NIM')
                        ->setCellValue('D1', 'Nama Barang')
                        ->setCellValue('E1', 'Spesifikasi')
                        ->setCellValue('F1', 'Jumlah')
                        ->setCellValue('G1', 'Tanggal Peminjaman')
                        ->setCellValue('H1', 'Tanggal Kembali')
                        ->setCellValue('I1', 'Tanggal Update')
                        ->setCellValue('J1', 'Status');          
            $kolom = 2;
            $nomor = 1;
            foreach($row as $row) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $row['nama_mahasiswa'])
                            ->setCellValue('C' . $kolom, $row['nim'])
                            ->setCellValue('D' . $kolom, $row['nama_barang'])
                            ->setCellValue('E' . $kolom, $row['spek'])
                            ->setCellValue('F' . $kolom, $row['vol'])
                            ->setCellValue('G' . $kolom, $row['tanggal_peminjaman'])
                            ->setCellValue('H' . $kolom, $row['tanggal_kembali'])
                            ->setCellValue('I' . $kolom, $row['tanggal_update'])
                            ->setCellValue('J' . $kolom, $row['nama_pinjam']);
                $kolom++;
                $nomor++;
            }
            
            // echo "CHECK: ";
            // echo sys_get_temp_dir(); exit();
            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data Pinjam.xlsx"');
            header('Cache-Control: max-age=0');
            
            $writer->save('php://output');

        }
    }
    
        
