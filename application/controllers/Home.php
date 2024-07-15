<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('username'))) {
            redirect(site_url("login"));
        }
        $this->load->model("pengumuman_model");
    }
    public function index()
    {
        $this->load->model("pengumuman_model");
		$data['list_pengumuman'] = $this->pengumuman_model->load_pengumuman();
        $this->load->view('home', $data);
    }
}
