<?php

class PengajuanKK extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("barang_model");
        $this->load->model("pengajuan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["barang"] = $this->barang_model->getAll();
        $data["barang"] = $this->barang_model->get_by_role();
        $this->load->view("dosen/inventariskk", $data);
    }

     public function editPengajuan($id = null)
    {
        if (!isset($id)) redirect('dosen/pengajuankk');
        $this->load->model('combobox_modeldosen');
        $pengajuan_barang = $this->pengajuan_model;
        $validation = $this->form_validation;
        $data['status_pengajuan'] = $this->combobox_modeldosen->getstatus();  
        $data['laboratorium'] = $this->combobox_modeldosen->getlaboratorium();
        $data['cek_barang'] = $this->combobox_modeldosen->getcek();
        $validation->set_rules($pengajuan_barang->rules());
        if(isset($_POST['tombol_submit'])){
            $pengajuan_barang->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect("dosen/pengajuankk");
        }
        $data["pengajuan_barang"] = $pengajuan_barang->getById($id);
        if (!$data["pengajuan_barang"]) show_404();
        
        $this->load->view("dosen/edit_pengajuankk", $data);
    }

     public function pengajuan()
    {
        $data["pengajuan_barang"] = $this->pengajuan_model->getAll();
        $data["pengajuan_barang"] = $this->pengajuan_model->get_by_role();
        $this->load->view("dosen/pengajuankk", $data);
    }

  
    }
        
