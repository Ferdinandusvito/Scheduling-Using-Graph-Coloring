<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ruangan_model');
    }

    // public function index()
    // {
    //     redirect("Data_controllers/ruangan");
    // }

    public function exploreRuangan($id_ruangan)
    {
        $data['list_ruanganByNip'] = $this->ruangan_model->ruanganByID($id_ruangan);
        $this->load->view("data/ruangan_view", $data);
    }
    public function tambahGedung()
    {
        $data['list_gedung'] = $this->ruangan_model->tambahGedung();
        redirect("Data_controllers/ruangan");
    }

    public function hapusRuangan($id_ruangan)
    {
        // print_r($id_ruangan);
        $this->ruangan_model->hapus_ruangan($id_ruangan);
        $data['list_ruangan'] = $this->ruangan_model->daftar_ruangan();
        $this->load->view("data/ruangan_view", $data);
    }
}
