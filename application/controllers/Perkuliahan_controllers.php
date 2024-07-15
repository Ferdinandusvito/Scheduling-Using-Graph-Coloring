<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perkuliahan_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("perkuliahan_model");
        $this->load->model("fakultas_model");
        $this->load->model("dosen_model");
    }

    public function index()
    {
        $data['list_matkul'] = $this->perkuliahan_model->daftarMatkul();
        $data['list_fakultas'] = $this->fakultas_model->daftar_fakultas();
        $data['list_jurusan'] = $this->fakultas_model->daftar_jurusan();
        $data['list_jurusan2'] = $this->fakultas_model->daftar_jurusan();
        $this->load->view("perkuliahan/index", $data);
        if (isset($_POST['tambahMatkul'])) {
            $this->perkuliahan_model->tambahMatkul($_POST);
            redirect("perkuliahan_controllers");
        } else if (isset($_POST['tambahMkdu'])) {
            $this->perkuliahan_model->tambahMkdu($_POST);
            redirect("perkuliahan_controllers/matkulAmpu");
        }
    }

    public function exploreMatkul($id_matkul)
    {
        $this->load->model('perkuliahan_model');
		$data['dataMatkul'] = $this->perkuliahan_model->load_MatkulSelect($id_matkul);
        if (isset($_POST['updateMatkul'])) 
        {
            $this->perkuliahan_model->updateMatkul($id_matkul);
            redirect("perkuliahan_controllers/index");
            $this->session->set_flashdata('alert', 'Data Mata Kuliah Telah Diubah');
		}
		$this->load->view('perkuliahan/ubah_index', $data);
    }

    public function hapusMatkul_ajarku($id_mengajar)
    {
		$this->load->model('perkuliahan_model');
		$this->perkuliahan_model->hapusMatkul_ajarku($id_mengajar);
        redirect (base_url("perkuliahan_controllers/matkulAmpu"));
        $this->session->set_flashdata('alert', 'Mata Kuliah Telah Dihapus');
    }
    public function hapusMatkul_ajarkuu($id_mengajar)
    {
		$this->load->model('perkuliahan_model');
		$this->perkuliahan_model->hapusMatkul_ajarku($id_mengajar);
        redirect (base_url("perkuliahan_controllers/dataKuliah"));
        $this->session->set_flashdata('alert', 'Mata Kuliah Telah Dihapus');
	}

    public function matkulAmpu()
    {
        $nip                    = $this->session->userdata("nip");
        $data['my_profile']      = $this->dosen_model->exploredosenByNip($nip);
        $data['list_matkul']    = $this->perkuliahan_model->daftarMatkul();
        $data['matkul_ajarku'] = $this->perkuliahan_model->daftarMatkulByDosen($nip);
        $this->load->view("perkuliahan/matkul_ampu", $data);
        if (isset($_POST['ambilMatkul'])) {
            $this->perkuliahan_model->ambilMatkul($_POST, $nip);
            redirect("/perkuliahan_controllers/matkulAmpu");
        }
    }

    public function hapusMatkul($id_matkul)
    {
		$this->load->model('perkuliahan_model');
		$this->perkuliahan_model->hapusMatkul($id_matkul);
        redirect (base_url("perkuliahan_controllers/index"));
        $this->session->set_flashdata('alert', 'Mata Kuliah Telah Dihapus');
	}

    public function jadwalAjar()
    {
    }

    public function dataKuliah()
    {
        try{
            $nip                    = $this->session->userdata("nip");
            $data['my_profile']      = $this->dosen_model->exploredosenByNip($nip);
            $data['list_matkul']    = $this->perkuliahan_model->daftarMatkul();
            $data['matkul_ajarku'] = $this->perkuliahan_model->daftarMatkulByDosen($nip);
            $data['data_matkul'] = $this->perkuliahan_model->daftarData_kuliah($nip);
            $this->load->view("perkuliahan/data_kuliah", $data);
        } catch (Exception $e){
            show_error("Internal Server Error",500);
        }
    }

    public function dataMKDU_fakultas()
    {
        $data['list_matkul'] = $this->perkuliahan_model->daftarMatkul();
        $data['list_mkdu'] = $this->perkuliahan_model->daftarMKDU();
        $data['list_fakultas'] = $this->fakultas_model->daftar_fakultas();
        $this->load->view("perkuliahan/mkdu_fakultas", $data);
        if (isset($_POST['tambahMatkul'])) {
            $this->perkuliahan_model->tambahMatkul($_POST);
            redirect("perkuliahan_controllers");
        } else if (isset($_POST['tambahMkdu'])) {
            $this->perkuliahan_model->tambahMkdu($_POST);
            redirect("perkuliahan_controllers/dataMKDU_fakultas");
        }
    }

    public function exploreMKDU_jurusan($id_perkuliahan)
    {
        $this->load->model('perkuliahan_model');
        $data['list_matkul'] = $this->perkuliahan_model->daftarMatkul();
        $data['list_mkdu'] = $this->perkuliahan_model->daftarMKDU();
        $data['list_fakultas'] = $this->fakultas_model->daftar_fakultas();
        $data['list_jurusan'] = $this->fakultas_model->daftar_jurusan();
        $data['list_angkatan'] = $this->perkuliahan_model->daftarAngkatan();
		$data['dataMKDU'] = $this->perkuliahan_model->load_MKDU_jurusanSelect($id_perkuliahan);
        if (isset($_POST['simpanMKDU_jurusan'])) 
        {
            $id_jurusan    = $this->db->escape($_POST['id_jurusan']);
            $id_matkul      = $this->db->escape($_POST['id_matkul']);
            
            redirect("perkuliahan_controllers/mkdu_fakultas");
            $this->session->set_flashdata('alert', 'Data Mata Kuliah Dasar Umum Jurusan Telah Diubah');
		}
		$this->load->view('perkuliahan/ubah_mkdu_fakultas', $data);
    }

    public function hapusMKDU_jurusan($id_perkuliahan)
    {
		$this->load->model('perkuliahan_model');
		$this->perkuliahan_model->hapusMKDU_jurusan($id_perkuliahan);
        redirect (base_url("perkuliahan_controllers/dataMKDU_fakultas"));
        $this->session->set_flashdata('alert', 'Mata Kuliah Dasar Umum Jurusan Telah Dihapus');
	}

    public function jurusanByFakultasId(){
        $id_fakultas = $this->input->post('id_fakultas');

        $data = $this->fakultas_model->jurusanByFakultasId($id_fakultas);
        echo json_encode($data);
    }

    public function angkatanByJurusanId(){
        $id_jurusan = $this->input->post('id_jurusan');

        $data = $this->fakultas_model->angkatanByJurusanId($id_jurusan);
        echo json_encode($data);
    }
}
