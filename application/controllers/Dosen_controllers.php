<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dosen_model');
        $this->load->model('akun_model');
        $this->load->model('perkuliahan_model');
        $this->load->model('M_preferensi');
    }

    public function index()
    {
        $this->load->view('dosen_view');
    }

    // public function exploreDosen($nip)
    // {
    //     $data['detailDosen'] = $this->dosen_model->exploredosenByNip($nip);
    //     $data['detailAdditional'] = $this->dosen_model->exploreadditionalByNip($nip);
    //     $this->load->view("dosen_view/detail_dosen", $data);
    //     if (isset($_POST['updateDosen'])) {
    //         $this->dosen_model->updateDosen($_POST, $nip);
    //         redirect("Data_controllers/dosen");
    //     }
    // }

    public function exploreDosen($nip)
    {
        $data['detailDosen'] = $this->dosen_model->exploredosenByNip($nip);
        $data['detailAdditional'] = $this->dosen_model->exploreadditionalByNip($nip);
        $this->load->view("dosen_view/detail_dosen", $data);
        if (isset($_POST['updateDosen'])) {
            $this->dosen_model->updateDosen($_POST, $nip);
            $this->session->set_flashdata('alert', 'Data Dosen Berhasil Diperbarui');
            redirect("Data_controllers/dosen");
        }
    }

    public function hapusDosen($nip)
    {
        // $data['list_dosen'] = $this->dosen_model->daftar_dosen();
        $data['cek_hapus_dosen_additional'] = $this->akun_model->deleteByNip($nip);
        $data['cek_hapus_preferensi'] = $this->M_preferensi->deleteByNip($nip);
        $data['cek_hapus_mengajar'] = $this->perkuliahan_model->deleteByNip($nip);
        $data['cek_hapus_roles'] = $this->dosen_model->deleteRolesByNip($nip);
        $data['list_dosen'] = $this->dosen_model->hapus_dosen($nip);
        $data['list_dosen'] = $this->dosen_model->daftar_dosen($nip);
        $data['list_dosenbaru'] = $this->dosen_model->daftar_dosenbaru();
        $this->load->view("data/dosen_view", $data);
    }

    public function accDosen($nip)
    {
        $this->dosen_model->acc_dosen($nip);
        $this->dosen_model->tambahRoles($nip);
        redirect("Data_controllers/dosen");
    }
}
