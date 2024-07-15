<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('akun_model');
	}

	public function index()
	{
		$this->load->view('login');
		if (isset($_POST['buatAkun'])) {
			$this->akun_model->buatAkun($_POST);
			$this->session->set_flashdata('alert', 'Akun Berhasil Dibuat');
			redirect("Login");
		}
	}

	public function aksi_login()
	{
		$username 	= $this->input->post('username');
		$password 	= md5($this->db->escape($_POST['password']));

		print_r($password);

		$query_dsn	= "SELECT
							dosen.nip as nip,
							nama_depan,
							nama_belakang,
							kode_dosen,
							username,
							email,
							password,
							id_status
						FROM
							dosen
						LEFT JOIN roles ON roles.nip = dosen.nip
						WHERE
						username = '$username' AND password = '$password'
						";
		$cek_dosen 	= $this->db->query($query_dsn);

		$row_dosen 	= $cek_dosen->row_array();

		if ($cek_dosen->num_rows() >= 1) {
			$data_session = array(
				'nip' 					=> $row_dosen['nip'],
				'nama_depan' 			=> $row_dosen['nama_depan'],
				'nama_belakang' 		=> $row_dosen['nama_belakang'],
				'kode_dosen' 			=> $row_dosen['kode_dosen'],
				'username' 			=> $row_dosen['username'],
				'password' 			=> $row_dosen['password'],
				'email' 			=> $row_dosen['email'],
				// 'user_role' 		=> $row_dosen['user_role_id'],
				'id_status' 		=> $row_dosen['id_status']
			);
			if ($data_session['id_status'] == 0) {
				$this->session->set_userdata($data_session);
				redirect(base_url('home'));
			} else if ($data_session['id_status'] == 2) {
				$this->session->set_userdata($data_session);
				redirect(base_url('home'));
			} else {
				$this->session->set_flashdata('alert_gagal', 'Hubungi Admin Untuk Men - ACC');
				redirect(base_url('login'));
			}
		} else {
			$this->session->set_flashdata('alert_gagal', 'Username atau password salah !');
			redirect(base_url('login'));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
