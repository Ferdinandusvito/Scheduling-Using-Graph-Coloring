<?php

class Laboran extends MY_Controller
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
        $this->load->view("laboran/inventaris", $data);
    }

     public function editPengajuan($id = null)
    {
        if (!isset($id)) redirect('laboran/pengajuan');
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
            redirect("/laboran/pengajuan");
        }
        $data["pengajuan_barang"] = $pengajuan_barang->getById($id);
        if (!$data["pengajuan_barang"]) show_404();
        
        $this->load->view("laboran/edit_pengajuan", $data);
    }

     public function pengajuan()
    {
        $data["pengajuan_barang"] = $this->pengajuan_model->getAll();
        $data["pengajuan_barang"] = $this->pengajuan_model->get_by_role();
        $this->load->view("laboran/pengajuan", $data);
    }

    public function add()
    {
        $this->load->model('barang_model');
        $this->load->model('combobox_modelab');
        $validation = $this->form_validation;
        $data['kondisi_barang'] = $this->combobox_modelab->getkondisi();
        $data['status_barang'] = $this->combobox_modelab->getstatus();	
        $data['laboratorium'] = $this->combobox_modelab->getlaboratorium();
        if(isset($_POST['tombol_submit'])){
            	$this->barang_model->save($_POST);
            	redirect("laboran");
            }
        $this->load->view("laboran/add", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('laboran/inventaris');
        $this->load->model('combobox_modelab');
        $barang = $this->barang_model;
        $validation = $this->form_validation;
        $data['kondisi_barang'] = $this->combobox_modelab->getkondisi();
        $data['status_barang'] = $this->combobox_modelab->getstatus();  
        $data['laboratorium'] = $this->combobox_modelab->getlaboratorium();
        $validation->set_rules($barang->rules());
        if(isset($_POST['tombol_submit'])){
            $barang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["barang"] = $barang->getById($id);
        if (!$data["barang"]) show_404();
        
        $this->load->view("laboran/edit_inventaris", $data);
    }
    public function hapus ($id_inventaris)
    {
        $this->db->query("delete from barang where id_inventaris = $id_inventaris ");
        redirect("laboran/");
    }
      public function accept(){
            $id_pengajuan = $this->db->escape($_POST['id_pengajuan']);
            $nip        = $this->db->escape($_POST['nip']);
            $query       = "UPDATE pengajuan_barang SET id_status = 1, WHERE id_pengajuan = $id_pengajuan ";
            $sql         = $this->db->query($query);
            $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
            
            redirect (base_url("laboran/pengajuan"));
        }
    }
        
