<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Pengaturan extends MY_Controller
{
	public function index()
	{
		$this->load->model('m_akun');
		$this->load->model('m_pengaturan');
		if ($this->session->userdata('user_role') == 3) {
			$data['dataMhs'] = $this->m_akun->dataMhsSession();
		} elseif ($this->session->userdata('user_role') == 8) {
			$data['dataLab'] = $this->m_akun->dataLabSession();
		} else {
			$data['dataDosen']	 	= $this->m_akun->dataDosenSession();
		}
		$data['dataBidang'] 	= $this->m_pengaturan->dataBidang();
		$data['dataJabatan'] 	= $this->m_pengaturan->dataJabatan();
		if (isset($_POST['updateDosen'])) {
			$nip = $this->session->userdata("nip");
			$this->m_pengaturan->updateDosen($_POST, $nip);
			$this->session->set_flashdata('alert', 'Data dosen berhasil diperbarui');
			redirect("Pengaturan");
		} elseif (isset($_POST['updateMhs'])) {
			$this->m_pengaturan->updateMhs($_POST);
			$this->session->set_flashdata('alert', 'Data Mahasiswa berhasil diperbarui');
			redirect("Pengaturan");
		} elseif (isset($_POST['updateLab'])) {
			$this->m_pengaturan->updateLab($_POST);
			$this->session->set_flashdata('alert', 'Data Laboratorium berhasil diperbarui');
			redirect("Pengaturan");
		}
		$this->load->view('v_pengaturan/v_pengaturan', $data);
	}

	public function settingKK()
	{
		$this->load->model("m_pengaturan");
		$data['dataKk'] 	= $this->m_pengaturan->select_ketuakk();
		// $data['dataPPM']   = $this->m_pengaturan->select_PPM();
		$data['dataDosen'] = $this->m_pengaturan->dataDosen();

		// if(isset($_POST['simpanDekan'])){
		// 	$this->m_pengaturan->simpanDekan($_POST);
		// 	$this->session->set_flashdata('alert_success', 'Data Dekan Fakultas Teknik Elektro Telah diubah');
		// 	redirect("Pengaturan/jabatan");
		// }elseif (isset($_POST['simpanPPM'])) {
		// 	$this->m_pengaturan->simpanPPM($_POST);
		// 	$this->session->set_flashdata('alert_success', 'Data Direktur PPM Telah diubah');
		// 	redirect("Pengaturan/jabatan");
		// }
		$this->load->view('v_pengaturan/v_jabatanKK', $data);
	}

	public function setKk($nip)
	{
		$query = "UPDATE roles SET nip = $nip WHERE user_role_id = 1 ";
		// var_dump($query);exit;
		$this->db->query($query);
		$this->session->set_flashdata('alert', 'Data Ketua KK Telah diubah');
		redirect(base_url('Pengaturan/settingKK'));
	}

	function pDekan()
	{
		$this->load->model('m_pengaturan');
		$data['dataDekan'] = $this->m_pengaturan->select_dekan();

		$this->load->view('v_pengaturan/v_jabatanDekan', $data);
	}

	function setDekan()
	{
		$nip_lama 	= $_POST['nip_lama'];
		$nip 		= $_POST['nip'];
		$nama_awal 	= $_POST['nama_awal'];
		$query = "	UPDATE dosen
					SET nip = '$nip',
					nama_awal = '$nama_awal'
					WHERE
						nip = '$nip_lama'
					";
		$this->db->query($query);
		$this->session->set_flashdata('alert', 'Data Dekan FTE Telah diubah');
		redirect(base_url('Pengaturan/pDekan'));
	}

	function pPpm()
	{
		$this->load->model('m_pengaturan');
		$data['dataDekan'] = $this->m_pengaturan->select_PPM();

		$this->load->view('v_pengaturan/v_jabatanPpm', $data);
	}

	function setPpm()
	{
		$nip_lama 	= $_POST['nip_lama'];
		$nip 		= $_POST['nip'];
		$nama_awal 	= $_POST['nama_awal'];
		$query = "	UPDATE dosen
					SET nip = '$nip',
					nama_awal = '$nama_awal'
					WHERE
						nip = '$nip_lama'
					";
		$this->db->query($query);
		$this->session->set_flashdata('alert', 'Data Direktur PPM Telah diubah');
		redirect(base_url('Pengaturan/pPpm'));
	}

	function pLaboran()
	{
		$this->load->model('m_pengaturan');
		$data['dataLaboran'] = $this->m_pengaturan->select_laboran();

		$this->load->view('v_pengaturan/v_jabatanLaboran', $data);
	}

	function setLaboran()
	{
		$nip_lama 	= $_POST['nip_lama'];
		$nip 		= $_POST['nip'];
		$nama_awal 	= $_POST['nama_awal'];
		$query = "	UPDATE dosen
					SET nip = '$nip',
					nama_awal = '$nama_awal'
					WHERE
						nip = '$nip_lama'
					";
		$this->db->query($query);
		$this->session->set_flashdata('alert', 'Data Laboran Telah diubah');
		redirect(base_url('Pengaturan/pLaboran'));
	}

	function pDsnPkip()
	{
		$this->load->model('m_pengaturan');
		$data['dataDsnPkip'] 	= $this->m_pengaturan->select_dsnPkip();
		$data['dataDosen'] 		= $this->m_pengaturan->dataDosen();

		$this->load->view('v_pengaturan/v_jabatanPkip', $data);
	}

	public function setPkip($nip)
	{
		$query = "UPDATE roles SET nip = $nip WHERE user_role_id = 80 ";
		$this->db->query($query);
		$this->session->set_flashdata('alert', 'Data Dosen PKIP Telah diubah');
		redirect(base_url('Pengaturan/pDsnPkip'));
	}

	function pDsnPembina()
	{
		$this->load->model('m_pengaturan');
		$data['dataDsnPembina'] 	= $this->m_pengaturan->select_dsnPembina();
		$data['dataDosen'] 		= $this->m_pengaturan->dataDosen();

		$this->load->view('v_pengaturan/v_jabatanDsnPembina', $data);
	}

	function setDsnPembina($nip)
	{
		$query = "INSERT INTO roles (nip, user_role_id) VALUES ('$nip', 51) ";
		// var_dump($query);exit;
		$this->db->query($query);
		$this->session->set_flashdata('alert', 'Data Dosen Pembina Lab Telah diubah');
		redirect(base_url('Pengaturan/pDsnPembina'));
	}

	function hapusPembina($nip)
	{
		$query = "DELETE FROM roles WHERE nip = '$nip' ";
		$this->db->query($query);
		$this->session->set_flashdata('alert', 'Data Dosen Pembina Lab Telah dihapus');
		redirect(base_url('Pengaturan/pDsnPembina'));
	}

	public function penggunaDosen()
	{
		$this->load->model("m_pengaturan");
		$data['dataDosen'] 	 = $this->m_pengaturan->dataDosen();
		$data['dataBidang']  = $this->m_pengaturan->dataBidang();
		$data['dataJabatan'] = $this->m_pengaturan->dataJabatan();

		if (isset($_POST['simpanDosen'])) {
			$this->m_pengaturan->simpanDosen($_POST);
			redirect("Pengaturan/penggunaDosen");
		}

		$this->load->view('v_pengaturan/v_penggunaDosen', $data);
	}

	function editDosen($nip)
	{
		$this->load->model('m_pengaturan');
		$data['dataDosen'] 		= $this->m_pengaturan->dataDosenSelect($nip);
		$data['dataBidang'] 	= $this->m_pengaturan->dataBidang();
		$data['dataJabatan'] 	= $this->m_pengaturan->dataJabatan();

		if (isset($_POST['updateDosen'])) {
			$this->m_pengaturan->updateDosen($_POST, $nip);
			$this->session->set_flashdata('alert', 'Data dosen berhasil diperbarui');
			redirect("Pengaturan/penggunaDosen");
		}

		$this->load->view('v_pengaturan/v_editDosen', $data);
	}

	function editKuotaDosen($nip)
	{
		$this->load->model('m_pengaturan');
		$data['dataDosen'] 		= $this->m_pengaturan->dataDosenSelect($nip);
		if (isset($_POST['updateKuotaDosen'])) {
			$this->m_pengaturan->updateKuotaDosen($_POST, $nip);
			$this->session->set_flashdata('alert', 'Kuota dosen berhasil diperbarui');
			redirect("Pengaturan/penggunaDosen");
		}
		$this->load->view('v_pengaturan/v_editKuotaDosen', $data);
	}

	function detailDosen($nip)
	{
		$this->load->model('m_pengaturan');
		$data['dataDosen'] 		= $this->m_pengaturan->dataDosenSelect($nip);

		$this->load->view('v_pengaturan/v_detailDosen', $data);
	}

	function hapusDosen($nip)
	{
		$query = "DELETE FROM dosen WHERE nip = $nip ";
		$this->db->query($query);
		$this->session->set_flashdata('alert', 'Data dosen berhasil dihapus');

		redirect(base_url("Pengaturan/penggunaDosen"));
	}

	function penggunaMahasiswa()
	{
		$this->load->model('m_akun');
		$data['dataMHS'] = $this->m_akun->load_mahasiswa();
		if (isset($_POST['simpanMhs'])) {
			$this->load->model('m_pengaturan');
			$this->m_pengaturan->simpanMhs($_POST);
			$this->session->set_flashdata('alert', 'Data mahasiswa berhasil ditambah');
			redirect(base_url('Pengaturan/penggunaMahasiswa'));
		}
		$this->load->view('v_pengaturan/v_penggunaMahasiswa', $data);
	}

	function penggunaLab()
	{
		$this->load->model('m_akun');
		$this->load->model('m_pengaturan');
		$data['dataLab'] = $this->m_akun->load_laboratorium();
		if (isset($_POST['simpanLab'])) {
			$this->m_pengaturan->simpanLab($_POST);
			$this->session->set_flashdata('alert', 'Laboratorium berhasil ditambah');
			redirect("Pengaturan/penggunaLab");
		}
		$this->load->view('v_pengaturan/v_penggunaLab', $data);
	}

	function hapusMahasiswa($nim)
	{
		$this->db->query("DELETE FROM mahasiswa WHERE nim = $nim ");
		$this->session->set_flashdata('alert', 'Data mahasiswa berhasil dihapus');

		redirect(base_url("Pengaturan/penggunaMahasiswa"));
	}

	function editMahasiswa($nim)
	{
		$this->load->model('m_akun');
		$this->load->model('m_pengaturan');
		$data['dataMahasiswa'] = $this->m_akun->load_mahasiswaSelect($nim);
		if (isset($_POST['updateMhs'])) {
			$this->m_pengaturan->updateMhs($_POST);
			$this->session->set_flashdata('alert', 'Laboratorium berhasil ditambah');
			redirect("Pengaturan/penggunaMahasiswa");
		}

		$this->load->view('v_pengaturan/v_editMahasiswa', $data);
	}

	function import()
	{
		$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['file']['name']);
			$extension = end($arr_file);

			if ($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif ($extension == 'xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			// file path
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			$user_role = 3;
			$tempData = [];
			foreach ($allDataInSheet as $key => $value) {
				if ($key >= 2) {
					$tempData[] = [
						'nim' => $value['A'],
						'username' => $value['A'],
						'password' => md5($value['A'])
					];
				}
			}
			$tempData2 = [];
			foreach ($allDataInSheet as $key2 => $value2) {
				if ($key >= 2) {
					$tempData2[] = [
						'nim' => $value2['A'],
						'user_role_id' => $user_role
					];
				}
			}
			$this->db->insert_batch('mahasiswa', $tempData);
			$this->db->insert_batch('roles', $tempData2);
		}
		$this->session->set_flashdata('alert', 'Upload Berhasil');
		redirect('Pengaturan/penggunaMahasiswa');
	}

	function bidang()
	{
		$this->load->model('m_pengaturan');
		$data['dataBidang'] = $this->m_pengaturan->dataBidang();
		if (isset($_POST['simpanBidang'])) {
			$this->m_pengaturan->simpanBidang($_POST);
			redirect("Pengaturan/bidang");
		}
		$this->load->view('v_pengaturan/v_bidang', $data);
	}

	function hapusBidang($id_bidang)
	{
		$this->db->query("DELETE FROM bidang WHERE id_bidang = $id_bidang ");
		$this->session->set_flashdata('alert_danger', 'Bidang telah dihapus');
		redirect('Pengaturan/bidang');
	}

	function editBidang($id_bidang)
	{
		$this->load->model('m_pengaturan');
		$data['dataBidang'] = $this->m_pengaturan->dataBidangSelect($id_bidang);
		if (isset($_POST['updateBidang'])) {
			// $this->m_pengaturan->updateBidang($_POST, $id_bidang);
			$nama_bidang    = $this->db->escape($_POST['nama_bidang']);
			$query          = "UPDATE bidang SET nama_bidang = $nama_bidang WHERE id_bidang = " . intval($id_bidang);
			$sql            = $this->db->query($query);
			$this->session->set_flashdata('alert_success', 'Bidang telah diperbarui');
			redirect("Pengaturan/bidang");
		}
		$this->load->view('v_pengaturan/v_editBidang', $data);
	}

	function hapusLab($id_laboratorium)
	{
		$query = "DELETE FROM laboratorium WHERE id_laboratorium = $id_laboratorium";
		$this->db->query($query);
		$this->session->set_flashdata('alert', 'Laboratorium berhasil dihapus');
		redirect(base_url('Pengaturan/penggunaLab'));
	}

	function editLab($id_laboratorium)
	{
		// $this->load->model('m_pengaturan');
		$this->load->model('m_akun');
		$data['dataLab'] = $this->m_akun->load_labSelected($id_laboratorium);
		if (isset($_POST['updateLab'])) {
			$nama_laboratorium  = $this->db->escape($_POST['nama_laboratorium']);
			$nama_kordas    	= $this->db->escape($_POST['nama_kordas']);
			$username    		= $this->db->escape($_POST['username']);
			$password    		= md5($_POST['password']);

			$query = "	UPDATE laboratorium
							SET nama_laboratorium = $nama_laboratorium,
							nama_kordas = $nama_kordas,
							username = $username,
							password = '$password'
							WHERE
								id_laboratorium = $id_laboratorium
							";
			$this->db->query($query);
			$this->session->set_flashdata('alert', 'Laboratorium berhasil diperbarui');
			redirect(base_url('Pengaturan/penggunaLab'));
		}
		$this->load->view('v_pengaturan/v_editLab', $data);
	}

	function ubahPassword()
	{
		$user_role 	= $this->session->userdata("user_role");
		$id 		= $_POST['id'];
		$passLama 	= md5($_POST['passLama']);
		$passBaru 	= md5($_POST['passBaru']);
		if ($user_role == 3) {
			$query = "	UPDATE mahasiswa
							SET 
								password = '$passBaru'
							WHERE
								nim = '$id' AND password = '$passLama'
							";
		} elseif ($user_role == 8) {
			$query = "	UPDATE laboratorium
							SET 
								password = '$passBaru'
							WHERE
								id_laboratorium = '$id' AND password = '$passLama'
							";
		} else {
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
