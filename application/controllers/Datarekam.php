<?php

class Datarekam extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengajuan_model");
        $this->load->model("barang_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data["pengajuan_barang"] = $this->pengajuan_model->getAll();
        $data["pengajuan_barang"] = $this->pengajuan_model->get_by_role();
        $this->load->view("v_lab/v_pengajuan", $data);
    }

    public function inventaris()
    {
        $data["barang"] = $this->barang_model->getAll();
        $data["barang"] = $this->barang_model->get_by_role();
        $this->load->view("v_lab/v_inventaris", $data);
    }


    public function tambahpengajuan()
    {
        $this->load->model('pengajuan_model');
        $this->load->model('combobox_modeldosen');
        $validation = $this->form_validation;
        $data['status_pengajuan'] = $this->combobox_modeldosen->getstatus();
        $data['laboratorium'] = $this->combobox_modeldosen->getlaboratorium();
        $data['cek_barang'] = $this->combobox_modeldosen->getcek();
        $this->load->view("kk/tambahpengajuan", $data);
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('pengajuan');
        $this->load->model('combobox_modeldosen');
        $pengajuan_barang = $this->pengajuan_model;
        $validation = $this->form_validation;
        $data['status_pengajuan'] = $this->combobox_modeldosen->getstatus();
        $data['laboratorium'] = $this->combobox_modeldosen->getlaboratorium();
        $data['cek_barang'] = $this->combobox_modeldosen->getcek();
        $validation->set_rules($pengajuan_barang->rules());
        if (isset($_POST['tombol_submit'])) {
            $pengajuan_barang->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect("pengajuan");
        }
        $data["pengajuan_barang"] = $pengajuan_barang->getById($id);
        if (!$data["pengajuan_barang"]) show_404();

        $this->load->view("kk/edit_pengajuan", $data);
    }
    public function hapus($id_pengajuan)
    {
        $this->db->query("delete from pengajuan_barang where id_pengajuan = $id_pengajuan ");
        redirect("pengajuan");
    }

    public function aksi_upload()
    {
        $config['upload_path']          = './assets/documents/laporan_pengajuan/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 25600000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('v_upload', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('v_uploadSuccess', $data);
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $_table = "pengajuan_barang";
            $this->load->model('pengajuan_model');
            // $this->pengajuan_model->_table();
            $file_name   = $upload_data['file_name'];
            $nip         = $this->session->userdata("nip");
            $post = $this->input->post();
            $this->nama_dosen = $post["nama_dosen"];
            $this->nip = $post["nip"];
            $this->id_laboratorium = $post["id_laboratorium"];
            $this->tanggal_pengajuan = $post["tanggal_pengajuan"];
            $this->file = $file_name;
            $this->nama_barang = $post["nama_barang"];
            $this->spek = $post["spek"];
            $this->vol = $post["vol"];
            $this->id_status = $post["id_status"];
            $this->id_cek = $post["id_cek"];
            $this->db->insert($_table, $this);
            redirect("pengajuan");
            // var_dump($file_name);exit;
        }
    }
    public function accept()
    {
        $this->id_pengajuan = $_POST["id"];
        $query       = "UPDATE pengajuan_barang SET id_cek = 2, WHERE == id_pengajuan = $_POST";
        $sql         = $this->db->query($query);
        $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');

        redirect(base_url("pengajuan")); 
    }
}
