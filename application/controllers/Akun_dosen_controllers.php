<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akun_dosen_controllers extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dosen_model');
    }
    
    public function index()
    {
        $nip                    = $this->session->userdata("nip");
        $data['my_profile']      = $this->dosen_model->exploredosenByNip($nip);
        $data['detailAdditional']      = $this->dosen_model->exploreadditionalByNip($nip);
        $this->load->view('dosen_view/profil_dosen', $data);
        if (isset($_POST['updateDosen'])) {
            $this->dosen_model->updateDosen($_POST);
            $this->session->set_flashdata('alert', 'Data Dosen Berhasil Diperbarui');
            redirect("Akun_dosen_controllers");
        }
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
}
