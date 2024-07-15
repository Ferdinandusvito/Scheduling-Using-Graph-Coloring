<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Reader\Csv;
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class data extends MY_Controller
{
    public function index(){
        $this->load->model("m_dosbing");
        $data['list_topik'] = $this->m_dosbing->load_topik();
        $data1 = $this->m_dosbing->get_data()->result();
        $x['data1'] = json_encode($data1);
        // $this->load->view('chart_view',$x);
        $this->load->view("dosen/v_datajudul",$data,$x);
    }
    
    function countTopik()
  {
      $this->load->model("m_dosbing");
      $data = $this->m_dosbing->countTopik();
      header('Content-Type: application/json');
      echo json_encode( $data );
  }
    
    public function daftarkeseluruhan(){
            $this->load->model("m_dosbing");
            $this->load->model('m_akun');
            $data['load_dosen'] = $this->m_akun->load_dosen();
            $data['list_prosesjudul'] = $this->m_dosbing->load_prosesjudul();
            $data['load_judulprosesta'] = $this->m_dosbing->load_judulprosesta();
            $semester   = (!empty($_POST['semester'])) ? $_POST['semester'] : '' ;
            $tahun   = (!empty($_POST['tahun'])) ? $_POST['tahun'] : '' ;
            $nip    = (!empty($_POST['nip'])) ? $_POST['nip'] : '' ;
            $query  = "SELECT
                        a.*, d.*, sa.*, s. status AS status,
                        tt.kode_dosen AS kode1,
                        ty.kode_dosen AS kode2,
                        x.kode_dosen AS nip
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN t_topik sa ON sa.idta = a.idta
                    JOIN mahasiswa d ON d.nim = a.nim
                    LEFT JOIN dosen tt ON tt.nip = a.pbb1
                    JOIN dosen ty ON ty.nip = a.pbb2
                    JOIN dosen x ON x.nip = a.nip
                    WHERE a.id_judul IS NOT NULL
                    ";
            if (!empty($tahun)) {
                $query .= " AND (sa.tahun = '$tahun')";
            }
            if (!empty($nip)) {
                $query .= " AND (a.nip = '$nip')";
            }
            if (!empty($semester)) {
                $query .= " AND (sa.semester = '$semester')";
            }

            $sql    = $this->db->query($query);
            $row    = $sql->result_array();
            $data['list_prosesjudul'] = $row;
            $this->load->view('dosen/v_datakeseluruhan', $data);
    }
    
    
    // public function daftarkeseluruhan(){
    //     $this->load->model("m_dosbing");
    //     $data['list_topik'] = $this->m_dosbing->load_topikkeseluruhan();
    //     $this->load->view("dosen/v_datakeseluruhan",$data);
    // }
    
    public function daftardosbing(){
        $this->load->model("m_datadosbing");
        $data['list_datadosbing'] = $this->m_datadosbing->load_datadosbing();
        $this->load->view("dosen/v_datadosbing",$data);
    }
    
        function import()
        {
            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
            
                $arr_file = explode('.', $_FILES['file']['name']);
                $extension = end($arr_file);
            
               if($extension == 'csv'){
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                $nip    = $this->session->userdata("nip");
                $tempData = [];
                foreach ($allDataInSheet as $key => $value) {
                    if ($key >= 2) {
                        $tempData[] = [
                            'nip' => $nip,
                            'topik' => $value['A'],
                            'tahun' => $value['B'],
                            'semester' => $value['C'],
                            'id_bidang' => $value['D'],
                            'requirement' => $value['E'],
                            'nip' => $value['F'],
                            'keterangan' => $value['G'],
                            'kuotatopik' => $value['H'],
                            'pbb1' => $value['I'],
                            'pbb2' => $value['J']
                        ];
                    }
                }
                $this->db->insert_batch('t_topik', $tempData);
            }
            $this->session->set_flashdata('alert_success', 'Upload Berhasil');
            redirect('data');
        }
    
    
    
    public function jadwalseminar(){
        $this->load->model("m_dosbing");
        $data = $this->m_dosbing->load_jadwal();
        $temp_data = $temp_data_group = [];
        foreach ($data as $key => $value) {
            $temp_data_group[$value['idta']] = [
                'idta' => $value['idta'],
                'topik' => $value['topik'],
                'judul' => $value['judul'],
                'pbb1' => $value['pbb1'],
                'pbb2' => $value['pbb2'],
                'pgj1' => $value['pgj1'],
                'pgj2' => $value['pgj2'],
                'tanggal' => $value['tanggal'],
                'ruangan' => $value['ruangan'],
                'jam_mulai' => $value['jam_mulai'],
                'jam_selesai' => $value['jam_selesai']
            ];
            $temp_data[$value['idta']][] = $value;
        }
        $data['data_list'] = $temp_data;
        $data['data_list_group'] = $temp_data_group;
        $this->load->view("dosen/v_datajadwalmahasiswa",$data);
    }

    public function inputTopik()
    {
        $this->load->model("m_dosbing");
        $data['list_bidang'] = $this->m_dosbing->load_bidang();
        //$data['detail_dosbing'] = $this->m_dosbing->selectDobing($nip);

        if(isset($_POST['btnSimpanTopik'])){
            $this->load->model("m_dosbing");
            $this->m_dosbing->SimpanTopik($_POST);
            redirect("data");
        }
        $this->load->view('dosen/v_inputjudul', $data);
    }

    public function get_default($idta){
        $sql = $this->db->query("SELECT * FROM t_topik WHERE idta = ".intval($idta));
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }


    public function edit($idta){
        $this->load->model("m_dosbing");

        $data['list_bidang'] = $this->m_dosbing->load_bidang();
        $data['tipe'] = "Edit";
        if(isset($_POST['tombol_submit'])){
            $this->m_dosbing->update($_POST, $idta);
            redirect("data");
        }
        $data['default'] = $this->m_dosbing->get_default($idta);
        $this->load->view("dosen/v_updatejudul",$data);
    }
    public function delete($idta){
        $this->load->model("m_dosbing");
        $this->m_dosbing->hapus($idta);
        redirect("data");
    }

    
    public function pengajuanTopik(){
            $this->load->model("m_dosbing");
            $data['list_TopikPropose'] = $this->m_dosbing->load_TopikPropose();

            $this->load->view('dosen/v_pengajuantopik', $data);
        }

    public function pengajuanpembimbing(){
            $this->load->model("m_dosbing");
            $data['list_pengajuanpembimbing'] = $this->m_dosbing->load_pengajuanpembimbing();

            $this->load->view('dosen/v_pengajuanpembimbing', $data);
        }
    
    public function topikdisetujui(){
            $this->load->model("m_dosbing");
            $data['list_topikdisetujui'] = $this->m_dosbing->load_topikdisetujui();
            
            $this->load->view('dosen/v_topikditerima', $data);
        }   


    public function prosespengerjaan(){
            //$nip = $this->session->userdata("nip");
            $this->load->model("m_dosbing");
            $data['list_juduldikerjakan'] = $this->m_dosbing->load_juduldikerjakan();

            $this->load->view('dosen/v_prosespengerjaan', $data);
        }

     public function prosesproposal(){
            //$nip = $this->session->userdata("nip");
            $this->load->model("m_dosbing");
            $data['list_judulproposalta'] = $this->m_dosbing->load_judulproposalta();

            $this->load->view('dosen/v_prosesproposal', $data);
        }

    // public function prosesproposal2(){
    //         //$nip = $this->session->userdata("nip");
    //         $this->load->model("m_dosbing");
    //         $data['list_judulproposalta2'] = $this->m_dosbing->load_judulproposalta2();

    //         $this->load->view('dosen/v_prosesproposal2', $data);
    //     }


    public function detailtopik($idta){
            $this->load->model("m_dosbing");
            $data['data_topik'] = $this->m_dosbing->selectdetail($idta);

            $this->load->view('dosen/v_topikditerima', $data);
        }

    public function detailjudulta($id_judul){
            $this->load->model("m_dosbing");
            $data['data_judulta'] = $this->m_dosbing->selectjudulta($id_judul);

            $this->load->view('dosen/v_detailpengerjaanjudul', $data);
        }

    public function detailjudultaXXX($idta){
            $this->load->model("m_dosbing");
            $data['data_judulta'] = $this->m_dosbing->selectjudulta($idta);

            $this->load->view('dosen/v_detailpengerjaanjudul', $data);
        }

     public function accept($id_judul){
            $query = "UPDATE t_judul,mahasiswa SET t_judul.id_status = 7, mahasiswa.id_status =7 WHERE t_judul.nim = mahasiswa.nim AND t_judul.id_judul = ".intval($id_judul);
            $sql   = $this->db->query($query) ;
             $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan dan dapat dilihat pada pengajuan judul');
    
             redirect (base_url("/Data/pengajuantopik"));
         }

     public function reject($id_judul){
            $this->load->model("m_dosbing");
            $data['list_topikRejected'] = $this->m_dosbing->load_topikRejected($id_judul);
            // $sql1 = $this->db->query("UPDATE t_topik SET kuotatopik = kuotatopik+1 WHERE idta = ".intval($idta));
            // $query = "UPDATE t_topik,mahasiswa SET t_topik.kuotatopik = t_topik.kuotatopik+1, mahasiswa.id_status =60 WHERE t_topik.idta = ".intval($idta);
            // return TRUE;
            // $sql   = $this->db->query($query) ;
            $this->session->set_flashdata('alert_tolak', 'Anda telah menolak pengajuan');
            redirect (base_url("/Data/topikdisetujui"));
        }


    public function rejectproposal($id_judul){
            $this->load->model("m_dosbing");
            $data['list_proposalreject'] = $this->m_dosbing->load_proposalreject($id_judul);

            $this->session->set_flashdata('alert_tolak', 'Anda telah menolak pengajuan');
            redirect (base_url("/Data/topikdisetujui"));
        }

    public function rejectproposal2($id_judul){
            $this->load->model("m_dosbing");
            $data['list_proposalreject'] = $this->m_dosbing->load_proposalreject($id_judul);

            $this->session->set_flashdata('alert_tolak', 'Anda telah menolak pengajuan');
            redirect (base_url("/Data/topikdisetujui"));
        }


    public function acceptbimbing($id_judul){
             $query = "UPDATE t_judul,mahasiswa SET t_judul.id_status = 52, mahasiswa.id_status =52 WHERE t_judul.nim = mahasiswa.nim AND t_judul.id_judul = ".intval($id_judul);
             $sql   = $this->db->query($query) ;
             $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan dan menjadi pembimbing judul tugas akhir');
             redirect (base_url("/Data/pengajuanpembimbing"));
         }

    public function proposalupdate($id_judul){        
            $query = "UPDATE t_judul,mahasiswa SET t_judul.id_status = 53, mahasiswa.id_status =53 WHERE t_judul.nim = mahasiswa.nim AND t_judul.id_judul = ".intval($id_judul);
            $sql   = $this->db->query($query) ;
            $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui proposal');

            //var_dump($query,$query2);exit;
            redirect (base_url("/Data/prosesproposal"));
        }
//BIAR MENUJU PROPOSAL UPDATE 2 ANJENK GIMANA
    public function proposalupdate2($id_judul){
            $query = "UPDATE t_judul,mahasiswa SET t_judul.id_status = 9, mahasiswa.id_status =9 WHERE t_judul.nim = mahasiswa.nim AND t_judul.id_judul = ".intval($id_judul);
            $sql   = $this->db->query($query) ;
            $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui proposal');

            //var_dump($query,$query2);exit;
            redirect (base_url("/Data/prosesproposal"));
        }



}