<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penelitian extends MY_Controller {
	function __construct(){
            parent::__construct();
            $this->load->helper(array('form', 'url'));
        }
	// progress penelitian
	public function index()
	{
        $this->load->model("m_penelitian");
        $data['list_penelitian'] = $this->m_penelitian->load_sessionPenelitianPropose();
		
		$this->load->view('v_penelitian/v_pengajuanProgress', $data);
	}

	public function pengajuanProgressAccepted(){
		$this->load->model("m_penelitian");
		$data['list_penelitian'] = $this->m_penelitian->load_sessionPenelitianAccepted();

		$this->load->view('v_penelitian/v_pengajuanProgressAccepted', $data);
	}
	
	public function pengajuanProgressRejected(){
		$this->load->model("m_penelitian");
		$data['list_penelitian'] = $this->m_penelitian->load_sessionPenelitianRejected();

		$this->load->view('v_penelitian/v_pengajuanProgressRejected', $data);
	}
	
	public function progressPenelitian(){
		$this->load->model("m_penelitian");
		$data['list_penelitian'] = $this->m_penelitian->load_sessionPenelitianBerjalan();
	
		$this->load->view('v_penelitian/v_progressPenelitian', $data);
	}

	public function aksi_upload($id_penelitian){
		$config['upload_path']          = './assets/documents/penelitian/laporan_akhir/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 25600000;
 
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
			$query       = "UPDATE penelitian SET laporan_akhir = '$file_name', id_status = 20 WHERE id_penelitian = ".intval($id_penelitian);
			$qurey_pak   = "INSERT INTO pak(nip, id_pedoman_pak, id_penelitian) VALUES ($nip, $kode_pak, $id_penelitian) ";
			$sql         = $this->db->query($query);
			$sql_pak     = $this->db->query($qurey_pak);
			$this->session->set_flashdata('alert_success', 'Upload Laporan Akhir Berhasil');
			redirect("Penelitian/penelitianDetail/".intval($id_penelitian));
			// var_dump($file_name);exit;
		}
	}

	public function aksi_upload_proposal($id_penelitian){
		$config['upload_path']          = './assets/documents/penelitian/proposal/';
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
			$query       = "UPDATE penelitian SET proposal = '$file_name' WHERE id_penelitian = ".intval($id_penelitian);
			$sql         = $this->db->query($query);
			$this->session->set_flashdata('alert_success', 'Upload Proposal Berhasil');
			redirect("Penelitian/penelitianDetail/".intval($id_penelitian));
			// var_dump($file_name);exit;
		}
	}

	public function aksi_upload_lapantara($id_penelitian){
		$config['upload_path']          = './assets/documents/penelitian/laporan_antara/';
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
			$query       = "UPDATE penelitian SET laporan_antara = '$file_name' WHERE id_penelitian = ".intval($id_penelitian);
			$sql         = $this->db->query($query);
			$this->session->set_flashdata('alert_success', 'Upload Laporan Antara Berhasil');
			redirect("Penelitian/penelitianDetail/".intval($id_penelitian));
			// var_dump($file_name);exit;
		}
	}
	
	public function riwayatPenelitian(){
		$this->load->model("m_penelitian");
		$data['list_penelitian'] = $this->m_penelitian->load_sessionPenelitianSelesai();
	
		$this->load->view('v_penelitian/v_riwayatPenelitian', $data);
	}

	// Input Penelitian
	public function Penelitian_input()
	{
        $this->load->model("m_penelitian");
		$this->load->model("m_akun");
		$this->load->model("m_pak");
		$data['list_kreditPak'] 		= $this->m_pak->load_kreditpakPenelitian();
		$data['list_skemaPenelitian'] 	= $this->m_penelitian->load_skemaPenelitian();
		$data['list_dosen'] 			= $this->m_akun->load_dosen();
		$data['list_mahasiswa'] 		= $this->m_akun->load_mahasiswa();
		// if(isset($_POST['btnSimpanPengajuan'])){
			
		// 	redirect("penelitian");
		// }
		
		$this->load->view('v_penelitian/v_inputpenelitian', $data);
	}

	public function simpanPengajuan(){
		$this->load->model("m_penelitian");
		$this->m_penelitian->simpanPengajuan($_POST);
	}

	public function hapusPengajuan($id_penelitian){
		$this->load->model("m_penelitian");
		$this->m_penelitian->hapusPengajuan($id_penelitian);
		$this->session->set_flashdata('alert_hapus', 'Pengajuan penelitian telah dibatalkan');
		
		redirect (base_url("Penelitian"));
	}

	function tambahAnggotaDsn(){
		$id_penelitian  = $_POST['id_penelitian'];
		$anggota_penelitian = $_POST['anggota_penelitian'];
		$data = [];
		for ($i=0; $i < count($anggota_penelitian); $i++) { 
			$data[] = [
				'id_penelitian' => $id_penelitian,
				'nip_anggota' 	=> $anggota_penelitian[$i]
			];
		}	

		
		$query = $this->db->insert_batch('anggota_peneliti', $data);
		if($query)
			redirect('Penelitian/penelitianDetail/'.$id_penelitian);
			return true;
		return false;
		}
		
	function hapusAnggotaPnt($id_anggota){
		$id_penelitian  = $_POST['id_penelitian'];
		$this->db->query("DELETE FROM anggota_peneliti WHERE id_anggota = $id_anggota ");
		redirect('Penelitian/penelitianDetail/'.$id_penelitian);
	}

	// DETAIL
	public function penelitianDetail($id_penelitian){
		$this->load->model("m_penelitian");
		$this->load->model("m_pak");
		$this->load->model("m_akun");
		$data['detailPenelitian'] 	= $this->m_penelitian->load_penelitianSelect($id_penelitian);
		$data['list_kreditpak'] 	= $this->m_pak->load_kreditpakPenelitian();
		$data['list_dosen'] 		= $this->m_akun->load_dosen();
		$data['dataAnggotaDsn'] 	= $this->m_penelitian->getAnggotaPeneliti($id_penelitian);
		$data['dataAnggotaMhs'] 	= $this->m_penelitian->getAnggotaPenelitiMhs($id_penelitian);

		$this->load->view('v_penelitian/v_detail', $data, array('error' => ' ' ));
	}

	// CETAK
	public function sPernyataanKetua($id_penelitian){
		$this->load->model("m_penelitian");
		$this->load->model("m_pengaturan");
		$data['detailPenelitian'] = $this->m_penelitian->load_penelitianSelect($id_penelitian);
		$data['dataPPM'] = $this->m_pengaturan->select_PPM();

		$this->load->view('v_penelitian/v_sPernyataanKetua', $data);
	}
	public function sKesediaanMitra($id_penelitian){
		$this->load->model("m_penelitian");
		$data['detailPenelitian'] = $this->m_penelitian->load_penelitianSelect($id_penelitian);

		$this->load->view('v_penelitian/v_sKesediaanMitra', $data);
	}
	public function sLembarPengesahan($id_penelitian){
		$this->load->model("m_penelitian");
		$this->load->model("m_pengaturan");
		$data['detailPenelitian'] 	= $this->m_penelitian->load_penelitianSelect($id_penelitian);
		$data['dataAnggotaDsn']		= $this->m_penelitian->getAnggotaPeneliti($id_penelitian);
		$data['dataAnggotaMhs'] 	= $this->m_penelitian->getAnggotaPenelitiMhs($id_penelitian);
		$data['dataDekan'] 			= $this->m_pengaturan->select_dekan();
		$data['dataPPM'] 			= $this->m_pengaturan->select_PPM();
		$data['dataKetuakk'] 		= $this->m_pengaturan->select_ketuakk();

		$this->load->view('v_penelitian/v_sLembarPengesahan', $data);
	}

	function cekValidasi($id_skema, $thn_anggaran)
	{
		$this->load->model("m_penelitian");
		$data = $this->m_penelitian->cekValidasi($id_skema, $thn_anggaran);
		$validate = false;
		if ($data['countSkema'] >= 1) {
			$validate = true;
		}
		header('Content-Type: application/json');
		echo json_encode($validate);
	}

	// CONTROLER ADMIN
	public function skema(){
		$this->load->model("m_penelitian");
		$data['listSkema'] = $this->m_penelitian->load_skemaPenelitian();
		if (isset($_POST['simpanSkema'])) {
			$this->m_penelitian->simpanSkema($post);
			$this->session->set_flashdata('alert', 'Tambah Skema Berhasil');
			redirect("Penelitian/skema");
		}

		$this->load->view('v_penelitian/v_skemaPenelitian', $data);
	}

	function skemaHapus($id_skema){
		$this->load->model('m_penelitian');
		$this->m_penelitian->skemaHapus($id_skema);
		$this->session->set_flashdata('alert', 'Skema telah dihapus');
		
		redirect (base_url("Penelitian/skema"));
	}

	function skemaUbah($id_skema){
		$this->load->model('m_penelitian');
		$data['dataSkema'] = $this->m_penelitian->load_skemaPenelitianSelect($id_skema);

		if (isset($_POST['simpanSkema'])) {
			$skema   = $this->db->escape($_POST['skema']);
			$link    = $this->db->escape($_POST['link']);
			$query = "UPDATE skema_penelitian SET
						skema = $skema,
						link    = $link
					WHERE id_skema = $id_skema 
					";
			$sql = $this->db->query($query);
			$this->session->set_flashdata('alert', 'Skema telah diubah');
			redirect("Penelitian/skema");
		}
			
		$this->load->view('v_penelitian/v_skemaPenelitianUbah', $data);
	}


	
	

}

?>