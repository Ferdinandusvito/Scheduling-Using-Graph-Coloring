<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class abdimas extends MY_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->helper(array('form', 'url'));
        }

        public function index(){
            $this->load->model("m_abdimas");
            $data['list_abdimas'] = $this->m_abdimas->load_abdimasSessionBerjalan();
            
            $this->load->view('v_abdimas/v_progressAbdimas', $data);
        }
        
        public function inputAbdimas(){
            $this->load->model("m_abdimas");
            $this->load->model("m_akun");
            $data['list_skema'] = $this->m_abdimas->load_skemaAbdimas();
            $data['list_dosen'] = $this->m_akun->load_dosen();  
            

            $this->load->view('v_abdimas/v_inputAbdimas', $data);
        }

        public function simpanPengajuan(){
            $judul_abdimas              = $this->db->escape($_POST['judul_abdimas']);
            $mitra_instansi             = $this->db->escape($_POST['mitra_instansi']);
            $mitra_sasar                = $this->db->escape($_POST['mitra_sasar']);
            $id_skema                   = $this->db->escape($_POST['id_skema']);
            $dana_internal              = $this->db->escape($_POST['dana_internal']);
            $dana_luar                  = $this->db->escape($_POST['dana_luar']);
            $thn_anggaran               = $this->db->escape($_POST['thn_anggaran']);
            $semester                   = $this->db->escape($_POST['semester']);
            $tgl_mengajukan             = date('Y-m-d');
            $nip_session                = $this->session->userdata("nip");
            $status                     = 1;
            $config['upload_path']      = './assets/documents/abdimas/proposalAwal/';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = 25600000000;
    
            $this->load->library('upload', $config);
            
                if ( ! $this->upload->do_upload('proposalAwal')){
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('v_upload', $error);
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->view('v_uploadSuccess', $data);
                    $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                    $file_name   = $upload_data['file_name'];
                    $query_abdimas = "INSERT INTO abdimas (
                                judul_abdimas,
                                mitra_instansi,
                                mitra_sasar,
                                id_skema,
                                dana_internal,
                                dana_luar,
                                tgl_mengajukan,
                                id_status,
                                nip,
                                thn_anggaran,
                                proposalAwal,
                                semester
                            )
                            VALUES
                                (
                                    $judul_abdimas,
                                    $mitra_instansi,
                                    $mitra_sasar,
                                    $id_skema,
                                    $dana_internal,
                                    $dana_luar,
                                    '$tgl_mengajukan',
                                    $status,
                                    $nip_session,
                                    $thn_anggaran,
                                    '$file_name',
                                    $semester
                                )";
                    $sql_abdimas = $this->db->query($query_abdimas);
                    $anggota_abdimas    = $_POST['anggota_abdimas'];
                    $insert_id = $this->db->insert_id();
                    $data = [];
                    for ($i=0; $i < count($anggota_abdimas); $i++) { 
                        $data[] = [
                            'nip' => $anggota_abdimas[$i],
                            'id_abdimas' => $insert_id
                        ];
                    }

                    $query = $this->db->insert_batch('anggota_abdimas', $data);
                    
                    redirect("Abdimas/pengajuanProgress");
                }
        }

        public function pengajuanProgress(){
            $this->load->model("m_abdimas");
            $data['list_abdimasPropose'] = $this->m_abdimas->load_abdimasSessionPropose();
            
            $this->load->view('v_abdimas/v_pengajuanProgress', $data);
        }

        public function pengajuanProgressAccepted(){
            $this->load->model("m_abdimas");
            $data['list_abdimasAccepted'] = $this->m_abdimas->load_abdimasSessionAccepted();
            
            $this->load->view('v_abdimas/v_pengajuanProgressAccepted', $data);
        }

        public function pengajuanProgressRejected(){
            $this->load->model("m_abdimas");
            $data['list_abdimasRejected'] = $this->m_abdimas->load_abdimasSessionRejected();
            
            $this->load->view('v_abdimas/v_pengajuanProgressRejected', $data);
        }

        public function progressDetail($id_abdimas){
            $this->load->model("m_abdimas");
            $this->load->model("m_pak");
            $data['detail_abdimas']     = $this->m_abdimas->selectDetail($id_abdimas);
            $data['getAnggotaAbdimas']  = $this->m_abdimas->getAnggotaAbdimas($id_abdimas);
            $data['list_kreditpak']     = $this->m_pak->load_kreditpakAbdimas();

            if(isset($_POST['simpanDataMitra'])){
                $mitra_instansi = $this->db->escape($_POST['mitra_instansi']);
                $mitra_sasar    = $this->db->escape($_POST['mitra_sasar']);
                $mitra_nama     = $this->db->escape($_POST['mitra_nama']);
                $mitra_jabatan  = $this->db->escape($_POST['mitra_jabatan']);
                $query = "UPDATE abdimas SET
                            mitra_instansi = $mitra_instansi,
                            mitra_sasar    = $mitra_sasar,
                            mitra_nama     = $mitra_nama,
                            mitra_jabatan  = $mitra_jabatan
                        WHERE id_abdimas = $id_abdimas 
                        ";
                $sql = $this->db->query($query);
            	redirect("Abdimas/progressDetail/".intval($id_abdimas));
            }

            $this->load->view('v_abdimas/v_progressDetail', $data, array('error' => ' ' ));
        }

        public function aksi_upload($id_abdimas){
		$config['upload_path']          = './assets/documents/abdimas/laporan_akhir/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 25600000000;
 
        $this->load->library('upload', $config);
        
            if ( ! $this->upload->do_upload('laporan_akhir')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('v_upload', $error);
            }else{
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('v_uploadSuccess', $data);
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $file_name   = $upload_data['file_name'];
                $kode_pak    = $this->db->escape($_POST['kode_pak']);
                $nip         = $this->session->userdata("nip");
                $query       = "UPDATE abdimas SET laporan_akhir = '$file_name', id_status = 20 WHERE id_abdimas = ".intval($id_abdimas);
                $qurey_pak   = "INSERT INTO pak(nip, id_pedoman_pak, id_abdimas) VALUES ($nip, $kode_pak, $id_abdimas) ";
                $sql         = $this->db->query($query);
                $sql_pak     = $this->db->query($qurey_pak);
                $this->session->set_flashdata('alert_success', 'Upload Laporan Akhir Berhasil');
                redirect("Abdimas/progressDetail/".intval($id_abdimas));
                // var_dump($file_name);exit;
            }
        }

        public function aksi_upload_proposal($id_abdimas){
		$config['upload_path']          = './assets/documents/abdimas/proposal/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 25600000;
 
        $this->load->library('upload', $config);
        
            if ( ! $this->upload->do_upload('proposal')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('v_upload', $error);
            }else{
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('v_uploadSuccess', $data);
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $file_name   = $upload_data['file_name'];
                $nip         = $this->session->userdata("nip");
                $query       = "UPDATE abdimas SET proposal = '$file_name' WHERE id_abdimas = ".intval($id_abdimas);
                $sql         = $this->db->query($query);
                $this->session->set_flashdata('alert_success', 'Upload Proposal Berhasil');
                redirect("Abdimas/progressDetail/".intval($id_abdimas));
                // var_dump($file_name);exit;
            }
        }

        public function aksi_upload_lapantara($id_abdimas){
		$config['upload_path']          = './assets/documents/abdimas/laporan_antara/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 25600000;
 
        $this->load->library('upload', $config);
        
            if ( ! $this->upload->do_upload('laporan_antara')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('v_upload', $error);
            }else{
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('v_uploadSuccess', $data);
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $file_name   = $upload_data['file_name'];
                $nip         = $this->session->userdata("nip");
                $query       = "UPDATE abdimas SET laporan_antara = '$file_name' WHERE id_abdimas = ".intval($id_abdimas);
                $sql         = $this->db->query($query);
                $this->session->set_flashdata('alert_success', 'Upload Laporan Kemajuan Berhasil');
                redirect("Abdimas/progressDetail/".intval($id_abdimas));
                // var_dump($file_name);exit;
            }
        }

        public function hapusPengajuan($id_abdimas){
            $this->load->model("m_abdimas");
            $this->m_abdimas->hapusPengajuan($id_abdimas);
            $this->session->set_flashdata('alert_hapus', 'Pengajuan pengabdian masyarakat telah dibatalkan');
            
            redirect (base_url("Abdimas/pengajuanProgress"));
        }

        public function riwayatAbdimas(){
            $this->load->model("m_abdimas");
            $data['list_abdimasSelesai'] = $this->m_abdimas->load_abdimasSessionSelesai();

            $this->load->view('v_abdimas/v_riwayatAbdimas', $data);
        }

        public function cetakPengesahan($id_abdimas){
            $this->load->model("m_abdimas");
            $this->load->model("m_pengaturan");
            $data['list_abdimas'] = $this->m_abdimas->selectDetail($id_abdimas);
            $data['dataPPM'] = $this->m_pengaturan->select_PPM();

            $this->load->view('v_abdimas/v_cetakPengesahan', $data);
        }

        public function cetakPernyataanKetua($id_abdimas){
            $this->load->model("m_abdimas");
            $data['list_abdimas'] = $this->m_abdimas->selectDetail($id_abdimas);

            $this->load->view('v_abdimas/v_cetakPernyataanKetua', $data);
        }

        public function cetakKonfirmasiMasyarakat($id_abdimas){
            $this->load->model("m_abdimas");
            $data['list_abdimas'] = $this->m_abdimas->selectDetail($id_abdimas);

            $this->load->view('v_abdimas/v_cetakKonfirmasiMasyarakat', $data);
        }

        function cekValidasi($id_skema, $thn_anggaran)
        {
            $this->load->model("m_abdimas");
            $data = $this->m_abdimas->cekValidasi($id_skema, $thn_anggaran);
            $validate = false;
            if ($data['countSkema'] >= 1) {
                $validate = true;
            }
            header('Content-Type: application/json');
            echo json_encode($validate);
        }

        

        




    }
    
?>