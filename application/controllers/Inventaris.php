<?php

class Inventaris extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("barang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["barang"] = $this->barang_model->getAll();
        $data["barang"] = $this->barang_model->get_by_role();
        $this->load->view("lab/inventaris", $data);
    }

    public function add()
    {
        $this->load->model('pengajuan_model');
        $this->load->model('combobox_modeldosen');
        $validation = $this->form_validation;
        $data['status_barang'] = $this->combobox_modelab->getstatus();  
        $data['laboratorium'] = $this->combobox_modelab->getlaboratorium();
        if(isset($_POST['tombol_submit'])){
                $this->barang_model->save($_POST);
                redirect("dosen/peminjaman");
            }
        $this->load->view("peminjaman/add", $data);
    }


    public function edit($id = null)
    {
        if (!isset($id)) redirect('dosen/peminjamn');
        $this->load->model('combobox_modelab');
        $barang = $this->barang_model;
        $validation = $this->form_validation;
        $data['status_barang'] = $this->combobox_modelab->getstatus();  
        $data['laboratorium'] = $this->combobox_modelab->getlaboratorium();
        $validation->set_rules($barang->rules());
        if(isset($_POST['tombol_submit'])){
            $barang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["barang"] = $barang->getById($id);
        if (!$data["barang"]) show_404();
        
        $this->load->view("lab/edit_inventaris", $data);
    }
    public function hapus ($id_inventaris)
    {
        $this->db->query("delete from barang where id_inventaris = $id_inventaris ");
        redirect("lab/inventaris");
    }
}
