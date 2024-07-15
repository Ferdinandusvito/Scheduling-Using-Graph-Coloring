<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("fakultas_model");
        $this->load->model("ruangan_model");
        $this->load->model('waktu_model');
        $this->load->model('kelas_model');
    }

    public function dosen()
    {
        $this->load->model("dosen_model");
        $data['list_dosen'] = $this->dosen_model->daftar_dosen();
        $data['list_dosenbaru'] = $this->dosen_model->daftar_dosenbaru();
        $this->load->view("data/dosen_view", $data);
    }

    public function fakultas()
    {
        $this->load->model("fakultas_model");
        $data['list_jurusan'] = $this->fakultas_model->daftar_jurusan();
        $data['list_fakultas'] = $this->fakultas_model->daftar_fakultas();
        $data['list_gedung'] = $this->fakultas_model->daftar_gedung();
        $data['list_gedung2'] = $this->fakultas_model->daftar_gedung();
        // print_r($data['list_gedung']);
        // $data['list_jurusan'] = $this->fakultas_model->hapus_jurusan($id_jurusan);
        $this->load->view("data/fakultas_view", $data);
        if (isset($_POST['tambahJurusan'])) {
            $this->fakultas_model->tambahJurusan($_POST);
            redirect("Data_controllers/fakultas");
        } else if (isset($_POST['tambahFakultas'])) {
            $this->fakultas_model->tambahFakultas($_POST);
            redirect("Data_controllers/fakultas");
        } else if (isset($_POST['tambahGedung'])) {
            $this->fakultas_model->tambahGedung($_POST);
            redirect("Data_controllers/fakultas");
        }
    }

    public function tambahFakultas()
    {
        if (isset($_POST['tambahFakultas'])) {
            $this->fakultas_model->tambahFakultas($_POST);
        }
    }

    public function ruangan()
    {
        $this->load->model("ruangan_model");
        $data['list_ruangan'] = $this->ruangan_model->daftar_ruangan();
        $data['list_fakultas'] = $this->fakultas_model->daftar_fakultas();
        $data['list_gedung'] = $this->fakultas_model->daftar_gedung();
        // $data['list_ruangan'] = $this->ruangan_model->hapus_ruangan($id_ruangan);
        $this->load->view("data/ruangan_view", $data);
        if (isset($_POST['tambahRuangan'])) {
            $this->ruangan_model->tambahRuangan($_POST);
            redirect("Data_controllers/ruangan");
        }
    }

    public function exploreRuangan($id_ruangan)
    {
        $this->load->model('ruangan_model');
        $data['dataRuangan'] = $this->ruangan_model->load_RuanganSelect($id_ruangan);
        $data['list_gedung'] = $this->fakultas_model->daftar_gedung();
        if (isset($_POST['updateRuangan'])) 
        {
            $this->ruangan_model->updateRuangan($id_ruangan);
			redirect("data_controllers/ruangan");
		}
		$this->load->view('data/ubah_ruangan_view', $data);
    }

    public function exploreGedung($id_gedung)
    {
        $this->load->model('ruangan_model');
        $data['list_ruangangedung'] = $this->ruangan_model->daftar_ruangangedung($id_gedung);
		$data['dataGedung'] = $this->ruangan_model->load_GedungSelect($id_gedung);
        if (isset($_POST['updateGedung'])) 
        {
            $this->ruangan_model->updateGedung($id_gedung);
			redirect("data_controllers/ruangan");
		}
		$this->load->view('data/ubah_gedung_view', $data);
    }

    public function tambahRuangan()
    {
        if (isset($_POST['tambahRuangan'])) {
            $this->ruangan_model->tambahRuangan($_POST);
        }
    }


    public function hapusRuangan($id_ruangan)
    {
		$this->load->model('ruangan_model');
		$this->ruangan_model->hapusRuangan($id_ruangan);
		$this->session->set_flashdata('alert', 'Ruangan Telah Dihapus');
		redirect (base_url("data_controllers/ruangan"));
	}

    public function gedung()
    {
        $this->load->model("ruangan_model");
        $data['list_gedung'] = $this->fakultas_model->daftar_gedung();
        $this->load->view("data/ruangan_view", $data);
        if (isset($_POST['tambahGedung'])) {
            $this->ruangan_model->tambahGedung($_POST);
            redirect("Data_controllers/ruangan");
        }
    }

    public function tambahGedung()
    {
        if (isset($_POST['tambahGedung'])) {
            $this->ruangan_model->tambahGedung($_POST);
        }
    }


    public function hapusGedung($id_gedung)
    {
		$this->load->model('ruangan_model');
		$this->ruangan_model->hapusGedung($id_gedung);
		$this->session->set_flashdata('alert', 'Gedung Telah Dihapus');
		redirect (base_url("data_controllers/ruangan"));
	}

    public function waktu()
    {
        $this->load->model("waktu_model");
        //$data['list_jam'] = $this->waktu_model->daftar_jam();
        $data['list_hari'] = $this->waktu_model->daftar_hari2();
        $data['list_jam'] = $this->waktu_model->daftar_jam2();

        $this->load->view("data/waktu_view", $data);
        if (isset($_POST['tambahWaktu'])) {
            $this->waktu_model->tambahWaktu($_POST);
            redirect("Data_controllers/waktu");
        }
    }

    public function tambahHari()
    {
        if (isset($_POST['tambahHari'])) {
            $this->waktu_model->tambahHari($_POST);
            redirect("Data_controllers/waktu");
        }
    }

    public function exploreHari1($id_hari)
    {
        $this->load->model('waktu_model');
		$data['dataHari'] = $this->waktu_model->load_HariSelect($id_hari);
        if (isset($_POST['updateHari'])) 
        {
            $this->waktu_model->updateHari($id_hari);
			$this->session->set_flashdata('alert', 'Data Hari Telah Diubah');
			redirect("data_controllers/waktu");
		}
		$this->load->view('data/ubah_hari_view', $data);
    }
    
    public function hapusHari1($id_hari)
    {
		$this->load->model('waktu_model');
		$this->waktu_model->hapusHari1($id_hari);
		$this->session->set_flashdata('alert', 'Hari Telah Dihapus');
		redirect (base_url("data_controllers/waktu"));
	}

    public function tambahJam()
    {
        if (isset($_POST['tambahJam'])) {
            $this->waktu_model->tambahJam($_POST);
            redirect("Data_controllers/waktu");
        }
    }

    public function exploreJam1($kode_jam)
    {
        $this->load->model('waktu_model');
		$data['dataJam'] = $this->waktu_model->load_JamSelect($kode_jam);
        if (isset($_POST['updateJam'])) 
        {
            $this->waktu_model->updateJam($kode_jam);
			$this->session->set_flashdata('alert', 'Data Jam Telah Diubah');
			redirect("data_controllers/waktu");
		}
		$this->load->view('data/ubah_jam_view', $data);
    }

    public function hapusJam1($kode_jam)
    {
		$this->load->model('waktu_model');
		$this->waktu_model->hapusJam1($kode_jam);
		$this->session->set_flashdata('alert', 'Jam Telah Dihapus');
		redirect (base_url("data_controllers/waktu"));
	}

    public function tambahWaktu()
    {
        if (isset($_POST['tambahWaktu'])) {
            $this->waktu_model->tambahWaktu($_POST);
        }
    }

    public function kelas()
    {
        $this->load->model("kelas_model");
        $data['list_kelas'] = $this->kelas_model->daftar_kelas();
        $data['list_ruangan'] = $this->ruangan_model->daftar_ruangan();
        $data['list_fakultas'] = $this->fakultas_model->daftar_fakultas();
        $data['list_gedung'] = $this->fakultas_model->daftar_gedung();

        $this->load->view("data/kelas_view", $data);
        if (isset($_POST['tambahKelas'])) {
            $this->kelas_model->tambahRuangan($_POST);
            
        }
    }

    public function tambahKelas()
    {
        if (isset($_POST['tambahKelas'])) {
            $this->kelas_model->tambahKelas($_POST);
            $data['jurusanByID'] = $this->fakultas_model->jurusanByID($_POST['id_jurusan']);
            $data['kelasJurusan'] = $this->fakultas_model->daftar_kelas($_POST['id_jurusan']);
            redirect(base_url("fakultas_controllers/exploreJurusan/" . $_POST['id_jurusan']));
        }
    }
}
