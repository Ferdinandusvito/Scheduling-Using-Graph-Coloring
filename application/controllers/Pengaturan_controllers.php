<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Pengaturan_controllers extends MY_Controller
{
	public function index()
	{
		$this->load->model('akun_model');
		$this->load->model('pengaturan_model');
		if ($this->session->userdata('user_role') == 3) 
		{
			$data['dataDosen']	 	= $this->akun_model->dataDosenSession();
		}
		$this->load->view('v_pengaturan/v_pengaturan', $data);
	}

	function ubahPassword()
	{
		$user_role 	= $this->session->userdata("user_role");
		$id 		= $_POST['id'];
		$passLama 	= md5($_POST['passLama']);
		$passBaru 	= md5($_POST['passBaru']);
		if ($user_role == 1) 
		{
			$query = "	UPDATE dosen
							SET 
								password = '$passBaru'
							WHERE
								nip = '$id' AND password = '$passLama'
							";
		} else 
		{
			$query = "	UPDATE dosen
							SET 
								password = '$passBaru'
							WHERE
								nip = '$id' AND password = '$passLama'
							";
		}
		$sql = $this->db->query($query);
		$this->session->set_flashdata('alert', 'Password berhasil diubah');
		redirect(base_url('Pengaturan'));
	}

	function md5Generate($passLama, $passLamaInput)
	{
		$passLamaInput = md5($passLamaInput);
		if ($passLama !== $passLamaInput) {
			header('Content-Type: application/json');
			echo json_encode(['error' => true]);
		} else {
			header('Content-Type: application/json');
			echo json_encode(['error' => false]);
		}
	}

	public function ruangan()
	{
		$this->load->model('m_pengaturan');
		$data['listRuangan'] = $this->m_pengaturan->loadRuangan();

		$this->load->view('v_pengaturan/v_ruangan', $data);
	}

	public function generate()
	{
		$this->load->model('m_pengaturan');
		$this->load->view('penjadwalan/generate_jadwal');
	}

	public function simpanRuangan()
	{
		$this->load->model('m_pengaturan');
		$this->m_pengaturan->simpanRuangan($_POST);
		$this->session->set_flashdata('alert_success', 'Ruangan Telah Ditambah');

		redirect(base_url('Pengaturan/ruangan'));
	}

	public function ubahRuangan($id_slot)
	{
		$this->load->model('m_pengaturan');
		$data['dataRuangan'] = $this->m_pengaturan->loadRuanganSelect($id_slot);

		$this->load->view('v_pengaturan/v_ruanganUbah', $data);
	}

	public function updateRuangan()
	{
		$this->load->model('m_pengaturan');
		$this->m_pengaturan->updateRuangan($_POST);
		$this->session->set_flashdata('alert_success', 'Detail Ruangan Telah Diubah');

		redirect(base_url('Pengaturan/ruangan'));
	}

	public function hapusRuangan($id_slot)
	{
		$query 	= "DELETE FROM ruangan_seminar WHERE id_slot = $id_slot ";
		$this->db->query($query);
		$this->session->set_flashdata('alert_danger', 'Ruangan Berhasil Dihapus');
		redirect(base_url('Pengaturan/ruangan'));
	}

	public function penjadwalan()
	{
		$this->load->model('m_penjadwalan');
		$this->load->view('v_pengaturan/v_penjadwalan');
	}
}
