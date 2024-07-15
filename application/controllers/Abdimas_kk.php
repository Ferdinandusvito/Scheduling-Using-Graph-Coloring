<?php 
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    class Abdimas_kk extends MY_Controller
    {
        public function index(){
            $this->load->model("m_abdimas");
            $data['list_abdimasBerjalan'] = $this->m_abdimas->load_abdimasBerjalan();
            
            $this->load->view('v_abdimas/kk/v_progressAbdimas', $data);
        }
        
        public function riwayatAbdimas(){
            $this->load->model("m_abdimas");
            $data['list_abdimasSelesai'] = $this->m_abdimas->load_abdimasSelesai();
            
            $this->load->view('v_abdimas/kk/v_riwayatAbdimas', $data);    
        }
        
        public function riwayatAbdimasVer(){
            $this->load->model("m_abdimas");
            $data['list_abdimas'] = $this->m_abdimas->load_abdimasSelesaiVer();

            $this->load->view('v_abdimas/kk/v_riwayatAbdimasVer', $data);
        }

        public function pengajuanAbdimas(){
            $this->load->model("m_abdimas");
            $data['list_abdimasPropose'] = $this->m_abdimas->load_abdimasPropose();

            $this->load->view('v_abdimas/kk/v_pengajuanAbdimas', $data);
        }

        public function pengajuanAccepted(){
            $this->load->model("m_abdimas");
            $data['list_abdimasAccepted'] = $this->m_abdimas->load_abdimasAccepted();
            
            $this->load->view('v_abdimas/kk/v_pengajuanAccepted', $data);
        }
        
        public function pengajuanRejected(){
            $this->load->model("m_abdimas");
            $data['list_abdimasRejected'] = $this->m_abdimas->load_abdimasRejected();
            
            $this->load->view('v_abdimas/kk/v_pengajuanRejected', $data);
        }

        public function detailAbdimas($id_abdimas){
            $this->load->model("m_abdimas");
            $data['data_abdimas'] = $this->m_abdimas->selectDetail($id_abdimas);
            $data['getAnggotaAbdimas']  = $this->m_abdimas->getAnggotaAbdimas($id_abdimas);

            $this->load->view('v_abdimas/kk/v_detailAbdimas', $data);
        }

        public function monitoringAbdimas(){
            $this->load->model('m_abdimas');
            $this->load->model('m_akun');
            $this->load->model('m_pengaturan');
            $data['load_skema'] = $this->m_abdimas->load_skemaAbdimas();
            $data['load_dosen'] = $this->m_akun->load_dosen();
            $data['load_status'] = $this->m_pengaturan->load_status();

            $skema          = (!empty($_POST['skema'])) ? $_POST['skema'] : '' ;
            $nip            = (!empty($_POST['nip'])) ? $_POST['nip'] : '' ;
            $thn_anggaran   = (!empty($_POST['thn_anggaran'])) ? $_POST['thn_anggaran'] : '' ;
            $status         = (!empty($_POST['status'])) ? $_POST['status'] : '' ;

            $query  = "SELECT
                        a.*, d.*,
                        s.status as status,
                        sa.skema as skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON a.nip = d.nip";

            if (!empty($skema)) {
                $query .= " AND (a.id_skema = '$skema')";
            }
            if (!empty($nip)) {
                $query .= " AND (a.nip = '$nip')";
            }
            if (!empty($thn_anggaran)) {
                $query .= " AND (a.thn_anggaran = '$thn_anggaran')";
            }
            if (!empty($status)) {
                $query .= " AND (a.id_status = '$status')";
            }

            $sql    = $this->db->query($query);
            $row	= $sql->result_array();
            $data['dataAbdimas'] = $row;


            $this->load->view('v_abdimas/kk/v_monitoringAbdimas', $data);
        }

        // UPDATE STATUS
        public function accept(){
            $id_abdimas  = $this->db->escape($_POST['id_abdimas']);
            $nip         = $this->db->escape($_POST['nip']);
            $tgl_update  = date('Y-m-d');
            $tgl_notif   = date('Y-m-d H:i:s');
            $query       = "UPDATE abdimas SET id_status = 4, tgl_disetujui = '$tgl_update' WHERE id_abdimas = $id_abdimas ";
            $sql         = $this->db->query($query);
            $query_notif = "INSERT INTO notification(nip, status, created_date, id_abdimas) VALUES ($nip, 0, '$tgl_notif', $id_abdimas) ";
            $sql_notif   = $this->db->query($query_notif);
            $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
            
            redirect (base_url("/Abdimas_kk/pengajuanAccepted"));
        }
        
        public function reject($id_abdimas){
            $tgl_update     = date('Y-m-d');
            $alasan_tolak   = $this->db->escape($_POST['alasan_tolak']);
            $query          = "UPDATE abdimas SET id_status = 5, alasan_tolak = $alasan_tolak, tgl_ditolak = '$tgl_update' WHERE id_abdimas = ".intval($id_abdimas);
            $sql            = $this->db->query($query) ;
            $this->session->set_flashdata('alert_tolak', 'Anda telah menolak pengajuan');
            
            redirect (base_url("/Abdimas_kk/pengajuanRejected"));
        }
        
        public function finish($id_abdimas){
            $tgl_update = date('Y-m-d');
            $query      = "UPDATE abdimas SET id_status = 3, tgl_selesai = '$tgl_update' WHERE id_abdimas = ".intval($id_abdimas);
            $sql        = $this->db->query($query) ;
            $this->session->set_flashdata('alert_selesai', 'Penelitian telah dinyatakan selesai');
            $query_notif = "UPDATE notification SET status = 0 WHERE id_abdimas = $id_abdimas ";
            $sql_notif = $this->db->query($query_notif);
    
            redirect (base_url("/Abdimas_kk/riwayatAbdimasVer"));
        }

        public function berjalan($id_abdimas){
            $tgl_update     = date('Y-m-d');
            $query          = "UPDATE abdimas SET id_status = 2, tgl_berjalan = '$tgl_update' WHERE id_abdimas = ".intval($id_abdimas);
            $sql            = $this->db->query($query) ;
            $query_notif    = "UPDATE notification SET status = 0 WHERE id_abdimas = $id_abdimas ";
            $sql_notif      = $this->db->query($query_notif);
    
            redirect (base_url("/Abdimas_kk/pengajuanAccepted"));
        }

        // CONTROLLER ADMIN
        function skema(){
            $this->load->model('m_abdimas');
            $data['dataSkema'] = $this->m_abdimas->load_skemaAbdimas();

            if (isset($_POST['simpanSkema'])) {
                $this->m_abdimas->simpanSkema($_POST);
                $this->session->set_flashdata('alert', 'Tambah Skema Berhasil');
            	redirect("Abdimas_kk/skema");
            }

            $this->load->view('v_abdimas/v_skema', $data);
        }

        function skemaHapus($id_skema){
            $this->load->model('m_abdimas');
            $this->m_abdimas->skemaHapus($id_skema);
            $this->session->set_flashdata('alert', 'Skema telah dihapus');
            
            redirect (base_url("Abdimas_kk/skema"));
        }

        function skemaUbah($id_skema){
            $this->load->model('m_abdimas');
            $data['dataSkema'] = $this->m_abdimas->load_skemaAbdimasSelect($id_skema);

            if (isset($_POST['simpanSkema'])) {
                $skema   = $this->db->escape($_POST['skema']);
                $link    = $this->db->escape($_POST['link']);
                $query = "UPDATE skema_abdimas SET
                            skema = $skema,
                            link    = $link
                        WHERE id_skema = $id_skema 
                        ";
                $sql = $this->db->query($query);
                $this->session->set_flashdata('alert', 'Skema telah diubah');
            	redirect("Abdimas_kk/skema");
            }

            $this->load->view('v_abdimas/v_skemaUbah', $data);
        }

        function countAbdimas()
        {
            $this->load->model("m_abdimas");
            $data = $this->m_abdimas->countAbdimas();
            header('Content-Type: application/json');
            echo json_encode( $data );
        }

        function exportExcel()
        {
            $id_skema       = (!empty($_POST['id_skema'])) ? $_POST['id_skema'] : '' ;
            $nip            = (!empty($_POST['nip'])) ? $_POST['nip'] : '' ;
            $thn_anggaran   = (!empty($_POST['thn_anggaran'])) ? $_POST['thn_anggaran'] : '' ;
            $status         = (!empty($_POST['status'])) ? $_POST['status'] : '' ;

            $query  = "SELECT
                        a.*, d.*,
                        s.status as status,
                        sa.skema as skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON a.nip = d.nip";

            if (!empty($id_skema)) {
                $query .= " AND (a.id_skema = '$id_skema')";
            }
            if (!empty($nip)) {
                $query .= " AND (a.nip = '$nip')";
            }
            if (!empty($thn_anggaran)) {
                $query .= " AND (a.thn_anggaran = '$thn_anggaran')";
            }
            if (!empty($status)) {
                $query .= " AND (a.id_status = '$status')";
            }

            $sql    = $this->db->query($query);
            $row	= $sql->result_array();
            // $data['dataAbdimas'] = $row;
            $spreadsheet = new Spreadsheet;
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'No')
                        ->setCellValue('B1', 'Judul Abdimas')
                        ->setCellValue('C1', 'Skema Abdimas')
                        ->setCellValue('D1', 'Mitra')
                        ->setCellValue('E1', 'Masyarakat Sasar')
                        ->setCellValue('F1', 'Tahun Anggaran')
                        ->setCellValue('G1', 'Dana Internal')
                        ->setCellValue('H1', 'Dana Eksternal')
                        ->setCellValue('I1', 'Dosen');          
            $kolom = 2;
            $nomor = 1;
            foreach($row as $row) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $row['judul_abdimas'])
                            ->setCellValue('C' . $kolom, $row['skema'])
                            ->setCellValue('D' . $kolom, $row['mitra_instansi'])
                            ->setCellValue('E' . $kolom, $row['mitra_sasar'])
                            ->setCellValue('G' . $kolom, $row['thn_anggaran'])
                            ->setCellValue('G' . $kolom, number_format($row['dana_internal']))
                            ->setCellValue('H' . $kolom, number_format($row['dana_luar']))
                            ->setCellValue('I' . $kolom, $row['kode_dosen']);
                $kolom++;
                $nomor++;
            }
            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data Abdimas.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }



    }
    
?>