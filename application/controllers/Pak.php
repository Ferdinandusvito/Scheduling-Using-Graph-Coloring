<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pak extends MY_Controller {
	public function index()
	{
		$this->load->model("m_pak");
		$data['list_kreditpak'] = $this->m_pak->load_kreditpak();
		
		$this->load->view('v_pak/v_kreditpak', $data);
	}
	
	public function tambahKredit(){
		$this->load->model("m_pak");
		$data_kategori['list_kategori'] = $this->m_pak->load_kategori();
		if(isset($_POST['tombol_submit'])){
			$this->m_pak->simpan_kredit($_POST);
			redirect("pak");
		}
		
		$this->load->view('v_pak/v_tambahKredit', $data_kategori);
	}
	
	public function ubahKredit($id_pedoman_pak){
		$this->load->model("m_pak");
		$data['list_kategori'] 	= $this->m_pak->load_kategori();
		$data['list_data'] 		= $this->m_pak->get_data($id_pedoman_pak);
		    if(isset($_POST['ubahKredit'])){
                    $id_kategori   = $this->db->escape($_POST['id_kategori']);
                    $kegiatan  	   = $this->db->escape($_POST['kegiatan']);
                    $kode_pak      = $this->db->escape($_POST['kode_pak']);
                    $angka_kredit  = $this->db->escape($_POST['angka_kredit']);
                    $query       = "UPDATE angka_kredit SET
                                        id_kategori      = $id_kategori,
                                        kegiatan = $kegiatan,
                                        kode_pak = $kode_pak,
                                        angka_kredit = $angka_kredit
                                    WHERE id_pedoman_pak = ".intval($id_pedoman_pak)
                                    ;
                    $sql = $this->db->query($query);
                    $this->session->set_flashdata('alert_ubah', 'Pedoman angka kredit telah diperbarui');
                    redirect("pak");
			}

		$this->load->view('v_pak/v_ubahKredit', $data);
	}

	public function hapusKredit($id_pedoman_pak){
		$this->load->model("m_pak");
		$this->m_pak->hapusKredit($id_pedoman_pak);
		$this->session->set_flashdata('alert_hapus', 'Petunjuk angka kredit telah dihapus');
		redirect (base_url("pak"));
	}

	function inputKegiatan(){
		$this->load->model("m_pak");
		$data['list_kategori'] = $this->m_pak->load_kategori();
		$data['list_kredit']   = $this->m_pak->load_kreditpak();
		if(isset($_POST['btn_inputKegiatan'])){
			$this->m_pak->simpan_kegiatan($_POST);
			redirect("/pak/daftarKredit");
		}
		$this->load->view('v_pak/v_inputKegiatan', $data);
	}

	function daftarKredit(){
		$this->load->model("m_pak");
		$data['list_kredit'] 		= $this->m_pak->load_pakSession();
		$data['pakPendidikan'] 		= $this->m_pak->load_pakSessionPendidikan();
		$data['pakPenelitian'] 		= $this->m_pak->load_pakSessionPenelitian();
		$data['pakAbdimas'] 		= $this->m_pak->load_pakSessionAbdimas();
		$data['pakPenunjang'] 		= $this->m_pak->load_pakSessionPenunjang();
		$data['sumPakPendidikan'] 	= $this->m_pak->sumPakPendidikan();
		$data['sumPakPenelitian'] 	= $this->m_pak->sumPakPenelitian();
		$data['sumPakAbdimas'] 		= $this->m_pak->sumPakAbdimas();
		$data['sumPakPenunjang'] 	= $this->m_pak->sumPakPenunjang();
		
		$this->load->view('v_pak/v_daftarKredit', $data);
	}

	function ubahDaftarKredit($id_pak){
		$this->load->model("m_pak");
		$data['data_kegiatan']   	= $this->m_pak->load_pakSelect($id_pak);
		$data['list_pedomanpak'] 	= $this->m_pak->load_kreditpak();
		$data['list_kategori'] 		= $this->m_pak->load_kategori();
		if(isset($_POST['btn_ubahDaftarKredit'])){
			$id_pedoman_pak = $this->db->escape($_POST['id_pedoman_pak']);
			$nama_kegiatan 	= $this->db->escape($_POST['nama_kegiatan']);
			$query 			= $this->db->query("UPDATE pak SET id_pedoman_pak = $id_pedoman_pak, nama_kegiatan = $nama_kegiatan WHERE id_pak = ".intval($id_pak));
			$this->session->set_flashdata('alert_ubah', 'Daftar kegiatan telah diperbarui');
			redirect("pak/daftarKredit");
		}
		$this->load->view('v_pak/v_ubahDaftarKredit', $data);
	}

	function hapusDaftarKredit($id_pak){
		$this->load->model("m_pak");
		$this->m_pak->hapusDaftarKredit($id_pak);
		$this->session->set_flashdata('alert_hapus', 'Daftar Kegiatan telah dihapus');
		redirect (base_url("pak/daftarKredit"));
	}

	// CONTROLER ADMIN
	
	public function kategori(){
		$this->load->model("m_pak");
		$data['list_kategori'] = $this->m_pak->load_kategori();
		
		$this->load->view('v_pak/v_kategori', $data);
	}
	
	public function tambahKategori(){
		$this->load->model("m_pak");
		if(isset($_POST['btn_simpanKategori'])){
			$this->m_pak->simpanKategori($_POST);
			redirect("pak/kategori");
		}
		$this->load->view('v_pak/v_kategoriTambah');
	}

	public function hapusKategori($id_kategori){
		$this->load->model("m_pak");
		$this->m_pak->hapusKategori($id_kategori);
		$this->session->set_flashdata('alert_hapus', 'Kategori telah dihapus');
		redirect (base_url("pak/kategori"));
	}

	public function ubahKategori($id_kategori){
		$this->load->model("m_pak");
		$data['list_kategori'] = $this->m_pak->load_kategoriSelect($id_kategori);
		if(isset($_POST['btn_ubahKategori'])){
			$kategori  = $this->db->escape($_POST['kategori']);
			$query = $this->db->query("UPDATE kategori_pak SET kategori = $kategori WHERE id_kategori = ".intval($id_kategori));
			$this->session->set_flashdata('alert_ubah', 'Kategori telah diperbarui');
			redirect("pak/kategori");
		}
		$this->load->view('v_pak/v_kategoriUbah', $data);
	}

	function getKreditbyKategori($id_kategori){
		$this->load->model("m_pak");
		$data = $this->m_pak->load_kreditKategori($id_kategori);
		header('Content-Type: application/json');
		echo json_encode( $data );
	}





}
?>