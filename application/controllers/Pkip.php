<?php
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    
// defined('BASEPATH') OR exit('No direct script access allowed');

class PKIP extends MY_Controller
{
    public function index(){
        $this->load->model("m_pengumuman");
        $data['list_pengumuman'] = $this->m_pengumuman->load_pengumuman();
        $this->load->view('pkip/v_home', $data);
    }
    
//==============================================================================================//
        public function daftarjudul(){
        $this->load->model("m_pkip");
        $data = $this->m_pkip->load_judulsiapseminar();
        $temp_data = $temp_data_group = [];
        foreach ($data as $key => $value) {
            $temp_data_group[$value['idta']] = [
                'idta'               => $value['idta'],
                'nim'                => $value['idta'],
                'nama_awal'          => $value['nama_awal'],
                'nama_akhir'         => $value['nama_akhir'],
                'nip'                => $value['nip'],
                'id_judul'           => $value['id_judul'],
                'judul'              => $value['judul'],
                'topik'              => $value['topik'],
                'pbb1'               => $value['pbb1'],
                'pbb2'               => $value['pbb2'],
                'status'             => $value['status']
            ];
            $temp_data[$value['idta']][] = $value;
        }
        $data['data_list'] = $temp_data;
        $data['data_list_group'] = $temp_data_group;
        $this->load->view("pkip/v_datajudulmahasiswa",$data);
    }

//============================================================================================//

    // public function daftarprosesjudul(){
    //         $this->load->model("m_pkip");
    //         $data['list_prosesjudul'] = $this->m_pkip->load_prosesjudul();
    //         $data['list_judulproposalta'] = $this->m_pkip->load_judulproposalta();
    //         $this->load->view('pkip/v_prosesjudul', $data);
    // }
    
    public function daftarprosesjudul(){
            $this->load->model("m_pkip");
            $this->load->model('m_akun');
            $data['load_dosen'] = $this->m_akun->load_dosen();
            $data['list_prosesjudul'] = $this->m_pkip->load_prosesjudul();
            $data['list_judulproposalta'] = $this->m_pkip->load_judulproposalta();
            $semester   = (!empty($_POST['semester'])) ? $_POST['semester'] : '' ;
            $tahun   = (!empty($_POST['tahun'])) ? $_POST['tahun'] : '' ;
            $nip    = (!empty($_POST['nip'])) ? $_POST['nip'] : '' ;
            $query  = "SELECT
                        a.*, d.*, sa.*, s. status AS status,
                        tt.kode_dosen AS kode1,
                        ty.kode_dosen AS kode2,
                        x.kode_dosen AS nip
                        -- sa.topik AS topik
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN t_topik sa ON sa.idta = a.idta
                    JOIN mahasiswa d ON d.nim = a.nim
                    LEFT JOIN dosen tt ON tt.nip = a.pbb1
                    JOIN dosen ty ON ty.nip = a.pbb2 /*Harus di or keknya */
                    JOIN dosen x ON x.nip = a.nip
                    WHERE a.id_judul IS NOT NULL
                    ";
            // var_dump($nip, $year);exit;
            if (!empty($tahun)) {
                $query .= " AND (a.tahun = '$tahun')";
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
            // var_dump($data);exit;
            // $this->$data['dataPublikasi'] = $row;
            // $this->load->view('v_penelitian/v_publikasiFlt', $data);
            $this->load->view('pkip/v_prosesjudul', $data);
    }

    public function daftardosbing(){
            $this->load->model("m_pkip");
            $data['list_datadosbing'] = $this->m_pkip->load_dosen();
            $this->load->view('pkip/v_datadosbing', $data);
    }

    public function inputjadwalseminar($idta){
        $this->load->model("m_pkip");
        // $data['list_topikseminar'] = $this->m_pkip->load_topikseminar($idta);
        // $data['list_topikfilter'] = $this->m_pkip->load_topikfilter($idta);
        // $data['list_jadwalseminarta'] = $this->m_pkip->load_jadwalseminarta($idta);
        $data['list_judulsiap'] = $this->m_pkip->load_judulsiapseminar($idta);
        $data['list_judulseminar'] = $this->m_pkip->selectjudul($idta);
        $data['list_mahasiswata'] = $this->m_pkip->getmahasiswa($idta);
        $data['list_dosen'] = $this->m_pkip->load_dosen();
        $data['list_ruangan'] = $this->m_pkip->getRuanganSeminar();
        if(isset($_POST['btnSimpanJadwal'])){
            $this->m_pkip->simpanjadwal($_POST, $idta);
            redirect("pkip");
        }
        $data['default'] = $this->m_pkip->get_default($idta);
        $this->load->view("pkip/v_inputjadwalseminar",$data);
    }

    // public function kelulusan(){
    //     $this->load->model("m_pkip");
    //     $data['list_kelulusan'] = $this->m_pkip->load_kelulusan();
    //     // echo "<pre>";
    //     // var_dump($data);exit();
    //     // echo "</pre>";
    //     $this->load->view("pkip/v_kelulusan",$data);
    // }

    public function inputkelulusan($idta){
        $this->load->model("m_pkip");
        $data['list_kelulusan'] = $this->m_pkip->load_kelulusan($idta);
        if(isset($_POST['btnlulusseminar'])){
            $this->m_pkip->lulusseminar($_POST, $idta);
            redirect("pkip");
        }
        //$data['default'] = $this->m_pkip->get_default_ta($idta);
        $data['default'] = $this->m_pkip->get_default($idta);
        $this->load->view("pkip/v_inputkelulusan",$data);
        ;
    }


    public function kelulusan(){
            $this->load->model("m_pkip");
        $data = $this->m_pkip->load_kelulusan();
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
        $this->load->view("pkip/v_kelulusan",$data);
    }


    public function jadwalseminar(){
        $this->load->model("m_pkip");
        $data = $this->m_pkip->load_jadwal();
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
        $this->load->view("pkip/v_datajadwalmahasiswa",$data);
    }


    public function reject($id_judul){
            $this->load->model("m_pkip");
            $data['list_seminarulang'] = $this->m_pkip->load_seminarulang($id_judul);
            $this->session->set_flashdata('alert_tolak', 'Anda telah menolak pengajuan');
            redirect (base_url("/pkip/jadwalseminar"));
        }

    // public function acceptlulus($id_judul){
    //         $this->db->query("UPDATE t_judul, t_jadwal, mahasiswa SET t_jadwal.id_status = 51 WHERE t_judul.nim = mahasiswa.nim AND t_jadwal.id_judul = ".intval($id_judul));
    //         $this->db->query("UPDATE t_judul, t_jadwal, mahasiswa SET mahasiswa.id_status = 51 WHERE t_judul.nim = mahasiswa.nim AND t_jadwal.id_judul = ".intval($id_judul));
    //         $this->db->query("UPDATE t_judul, t_jadwal, mahasiswa SET t_judul.id_status = 51 WHERE t_judul.nim = mahasiswa.nim  AND t_jadwal.id_judul = ".intval($id_judul));

    //         $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
    //         redirect (base_url("/pkip/jadwalseminar"));
    //     }

        // public function acceptlulus($idta){
        //     $this->db->query("UPDATE t_judul, t_jadwal, mahasiswa SET t_jadwal.id_status = 51 WHERE t_judul.nim = mahasiswa.nim AND t_jadwal.idta = ".intval($idta));
        //     $this->db->query("UPDATE t_judul, t_jadwal, mahasiswa SET mahasiswa.id_status = 51 WHERE t_judul.nim = mahasiswa.nim AND t_jadwal.idta = ".intval($idta));
        //     $this->db->query("UPDATE t_judul, t_jadwal, mahasiswa SET t_judul.id_status = 51 WHERE t_judul.nim = mahasiswa.nim  AND t_jadwal.idta = ".intval($idta));

        //     $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
        //     redirect (base_url("/pkip/jadwalseminar"));
        // }
        
        public function acceptlulus($idta){
            $this->db->query("UPDATE t_judul, t_jadwal, mahasiswa SET t_jadwal.id_status = 51 WHERE t_judul.idta = t_jadwal.idta AND t_judul.idta = ".intval($idta));
            $this->db->query("UPDATE t_judul, t_jadwal, mahasiswa SET mahasiswa.id_status = 51 WHERE t_judul.nim = mahasiswa.nim AND t_judul.idta = ".intval($idta));
            $this->db->query("UPDATE t_judul, t_jadwal, mahasiswa SET t_judul.id_status = 51 WHERE t_judul.nim = mahasiswa.nim  AND t_judul.idta = ".intval($idta));
            $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
            redirect (base_url("/pkip/jadwalseminar"));
        }

    public function monitoringtugasakhir(){
            $this->load->model('m_pkip');
            $this->load->model('m_akun');
            $this->load->model('m_pengaturan');
            // $data['list_abdimas'] = $this->m_abdimas->load_abdimas();
            $data['load_topik'] = $this->m_pkip->load_topik();

            $data['load_dosen'] = $this->m_akun->load_dosen();
            $data['load_status'] = $this->m_pengaturan->load_status();

            $id_bidang  = (!empty($_POST['id_bidang'])) ? $_POST['id_bidang'] : '' ;
            $nip    = (!empty($_POST['nip'])) ? $_POST['nip'] : '' ;
            $tahun = (!empty($_POST['tahun'])) ? $_POST['tahun'] : '' ;
            $semester       = (!empty($_POST['semester'])) ? $_POST['semester'] : '' ;

            $query  = "SELECT a.*,d.*, 
                    s.nama_bidang as bidang
                    FROM t_topik a
                    JOIN bidang s ON a.id_bidang = s.id_bidang
                    JOIN dosen d ON d.nip = a.nip
                    ";

            if (!empty($id_bidang)) {
                $query .= " AND (a.id_bidang = '$id_bidang')";
            }
            if (!empty($tahun)) {
                $query .= " AND (a.tahun = '$tahun')";
            }
            if (!empty($nip)) {
                $query .= " AND (a.nip = '$nip')";
            }
            if (!empty($semester)) {
                $query .= " AND (a.semester = '$semester')";
            }

            $sql    = $this->db->query($query);
            $row    = $sql->result_array();
            $data['datatugasakhir'] = $row;
            $this->load->view('pkip/v_monitoringtugasakhir', $data);
        }

            function exportExcel()
        {
            $id_bidang         = (!empty($_POST['id_bidang'])) ? $_POST['id_bidang'] : '' ;
            $nip               = (!empty($_POST['nip'])) ? $_POST['nip'] : '' ;
            $tahun             = (!empty($_POST['tahun'])) ? $_POST['tahun'] : '' ;
            $semester          = (!empty($_POST['semester'])) ? $_POST['semester'] : '' ;
            $id_status         = (!empty($_POST['id_status'])) ? $_POST['id_status'] : '' ;


            // $query  = "SELECT a.*,d.*,b.* 
            //         s.nama_bidang as bidang
            //         FROM t_topik a
            //         JOIN
            //         JOIN bidang s ON a.id_bidang = s.id_bidang
            //         JOIN dosen d ON d.nip = a.nip
            //         ";

            $query  = "SELECT
                        a.*, d.*, s. status AS status,
                        tt.kode_dosen AS kode1,
                        ty.kode_dosen AS kode2,
                        tx.tahun AS tahun,
                        tc.semester AS semester,
                        x.id_bidang AS bidang,
                        y.requirement AS requirement,
                        z.nama_bidang AS bidang,
                        sa.topik AS topik,
                        tu.kode_dosen AS pgj1,
                        ti.kode_dosen AS pgj2,
                        -- m.nama_awal AS nim,
                        -- n.nama_awal AS nim,
                        p.kode_dosen AS nip
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN t_topik sa ON sa.idta = a.idta
                    JOIN t_jadwal tj ON tj.idta = a.idta
                    JOIN mahasiswa d ON d.nim = a.nim
                    LEFT JOIN dosen tt ON tt.nip = a.pbb1
                    JOIN dosen ty ON ty.nip = a.pbb2
                    JOIN t_topik tx ON tx.idta = a.idta
                    JOIN t_topik tc ON tc.idta = a.idta
                    JOIN t_topik x ON x.idta = a.idta
                    JOIN t_topik y ON y.idta = a.idta
                    JOIN bidang z ON z.id_bidang = a.id_bidang
                    JOIN dosen p ON p.nip = a.nip
                    LEFT JOIN dosen tu ON tu.nip = tj.pgj1
                    JOIN dosen ti ON ti.nip = tj.pgj2
                    -- JOIN mahasiswa m ON m.nim = a.nim
                    -- JOIN mahasiswa n ON n.nim = a.nim
                    ";

            if (!empty($id_bidang)) {
                $query .= " AND (a.id_bidang = '$id_bidang')";
            }
            if (!empty($nip)) {
                $query .= " AND (a.nip = '$nip')";
            }
            if (!empty($tahun)) {
                $query .= " AND (sa.tahun = '$tahun')";
            }
            if (!empty($semester)) {
                $query .= " AND (sa.semester = '$semester')";
            }
            if (!empty($id_status)) {
                $query .= " AND (a.id_status = '$id_status')";
            }
            if (!empty($nim)) {
                $query .= " AND (a.nim = '$nim')";
            }

            $sql    = $this->db->query($query);
            $row    = $sql->result_array();
            // $data['dataAbdimas'] = $row;
            $spreadsheet = new Spreadsheet;
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'No')
                        ->setCellValue('B1', 'Topik')
                        ->setCellValue('C1', 'Judul')
                        ->setCellValue('D1', 'Tahun')
                        ->setCellValue('E1', 'Semester')
                        ->setCellValue('F1', 'Bidang')
                        ->setCellValue('G1', 'Requirement')
                        ->setCellValue('H1', 'Status Kelulusan')
                        ->setCellValue('I1', 'Mahasiswa')
                        ->setCellValue('J1', 'Mahasiswa')
                        ->setCellValue('K1', 'Pembimbing 1')
                        ->setCellValue('L1', 'Pembimbing 2')
                        ->setCellValue('M1', 'Penerbit')
                        ->setCellValue('N1', 'Penguji 1')
                        ->setCellValue('O1', 'Penguji 2')
                        ;
            $spreadsheet->getActiveSheet()->mergeCells("I1:J1"); 

            $kolom = 2;
            $nomor = 1;
            foreach($row as $row) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, $row['topik'])
                        ->setCellValue('C' . $kolom, $row['judul'])
                        ->setCellValue('D' . $kolom, $row['tahun'])
                        ->setCellValue('E' . $kolom, $row['semester'])
                        ->setCellValue('F' . $kolom, $row['bidang'])
                        ->setCellValue('G' . $kolom, $row['requirement'])
                        ->setCellValue('H' . $kolom, $row['status'])
                        ->setCellValue('I' . $kolom, $row['nama_awal'])
                        ->setCellValue('J' . $kolom, $row['nama_akhir'])
                        ->setCellValue('K' . $kolom, $row['kode1'])
                        ->setCellValue('L' . $kolom, $row['kode2'])
                        ->setCellValue('M' . $kolom, $row['nip'])
                        ->setCellValue('N' . $kolom, $row['pgj1'])
                        ->setCellValue('O' . $kolom, $row['pgj2']);
            $kolom++;
            $nomor++;
            }
            // echo "CHECK: ";
            // echo sys_get_temp_dir(); exit();
            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data Tugas Akhir.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

    public function validasiRuangan($waktuujian)
    {
        $this->load->model("m_pkip");
            $data = $this->m_pkip->validasiRuangan($waktuujian);
            header('Content-Type: application/json');
            echo json_encode($data);
    }

function countTopik()
  {
      $this->load->model("m_pkip");
      $data = $this->m_pkip->countTopik();
      header('Content-Type: application/json');
      echo json_encode( $data );
  }

}