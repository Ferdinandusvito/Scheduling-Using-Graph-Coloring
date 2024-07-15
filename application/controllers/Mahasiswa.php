<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->model("m_mahasiswa");
        $data['list_topik'] = $this->m_mahasiswa->load_topik();
        $data['list_mahasiswa'] = $this->m_mahasiswa->load_profile(); //disini error id_status ga nampil
        $data['list_judul'] = $this->m_mahasiswa->load_mahasiswaSessionBerjalan();
        $this->load->view("mahasiswa/v_datajudulmahasiswa", $data);
    }

    public function daftardosbing()
    {
        $this->load->model("m_datadosbing");
        $data['list_datadosbing'] = $this->m_datadosbing->load_datadosbing();
        $this->load->view("mahasiswa/v_datadosbing", $data);
    }

    public function editprofile()
    {
        $this->load->model("m_mahasiswa");
        $data['list_profile'] = $this->m_mahasiswa->load_profile();
        $this->load->view("mahasiswa/v_editprofile", $data);
    }

    public function jadwalseminar()
    {
        $this->load->model("m_mahasiswa");
        $data = $this->m_mahasiswa->load_jadwal();
        $temp_data = $temp_data_group = [];
        foreach ($data as $key => $value) {
            $temp_data_group[$value['idta']] = [
                'idta' => $value['idta'],
                'topik' => $value['topik'],
                'judul' => $value['judul'],
                'pbb1' => $value['pbb1'],
                'pbb2' => $value['pbb2'],
                'pgj1' => $value['pgj1'],
                'pgj2' => $value['pgj2'],
                'tanggal' => $value['tanggal'],
                'ruangan' => $value['ruangan'],
                'jam_mulai' => $value['jam_mulai'],
                'jam_selesai' => $value['jam_selesai']
            ];
            $temp_data[$value['idta']][] = $value;
        }
        $data['data_list'] = $temp_data;
        $data['data_list_group'] = $temp_data_group;
        $this->load->view("mahasiswa/v_datajadwalmahasiswa", $data);
    }

    public function statusta()
    {
        $this->load->model("m_mahasiswa");
        //$data['list_jadwal'] = $this->m_jadwal->load_judul();
        $data['list_judul'] = $this->m_mahasiswa->load_mahasiswaSessionBerjalan();
        $this->load->view("mahasiswa/v_statustugasakhir", $data);
    }

    public function mahasiswabookingtopikta($idta)
    {
        $this->load->model("m_pkip");
        $data['list_judulsiap'] = $this->m_pkip->load_judulsiapseminar($idta);
        $data['list_judulseminar'] = $this->m_pkip->selectjudul($idta);
        $data['list_mahasiswata'] = $this->m_pkip->getmahasiswa($idta);
        if (isset($_POST['btnSimpanJadwal'])) {
            redirect("mahasiswa");
        }
        $data['default'] = $this->m_pkip->get_default($idta);
        $this->load->view("mahasiswa/v_mahasiswabookingtopikta", $data);
    }

    public function inputbimbingan($idta)
    {
        $this->load->model("m_mahasiswa");
        $data['list_pembimbing'] = $this->m_mahasiswa->load_mahasiswaBimbinganBerjalan();
        $data['list_judul'] = $this->m_mahasiswa->selecttopik($idta);
        $data['list_pbb1'] = $this->m_mahasiswa->load_pbb1();
        $data['list_pbb2'] = $this->m_mahasiswa->load_pbb2();
        if (isset($_POST['tombol_submit'])) {
            $this->m_mahasiswa->inputbimbingan($_POST, $idta);
            redirect("mahasiswa");
        }
        $data['default'] = $this->m_mahasiswa->get_default($idta);
        $this->load->view("mahasiswa/v_bimbingantugasakhir", $data);
    }


    public function aksi_upload($id_judul)
    {
        $config['upload_path']          = './assets/documents/proposal/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 25600000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('proposal')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('v_upload', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('v_uploadSuccess', $data);
            $upload_data = $this->upload->data();
            $file_name   = $upload_data['file_name'];
            $nim         = $this->session->userdata("nim");
            //$id_judul          = $this->db->escape($post['id_judul']);
            $query       = "UPDATE t_judul SET id_status = 50, proposal = '$file_name' WHERE id_judul = " . intval($id_judul);
            $query2     = "UPDATE mahasiswa,t_judul SET mahasiswa.id_status =50 WHERE t_judul.nim = mahasiswa.nim AND mahasiswa.nim = " . intval($nim);

            //
            $sql          = $this->db->query($query);
            $sql2         = $this->db->query($query2);
            redirect("mahasiswa/statusta");
            // var_dump($file_name);exit;
        }
    }

    public function inputjudul($id_judul)
    {
        $this->load->model("m_mahasiswa");

        $data['list_judul'] = $this->m_mahasiswa->selectjudul($id_judul);
        $data['list_pbb1'] = $this->m_mahasiswa->load_pbb1();
        $data['list_pbb2'] = $this->m_mahasiswa->load_pbb1();
        $data['list_pbb2'] = $this->m_mahasiswa->load_pbb2();
        if (isset($_POST['tombol_submit'])) {
            $this->m_mahasiswa->updatejudul($_POST, $id_judul);
            redirect("mahasiswa");
        }
        $data['defaultt'] = $this->m_mahasiswa->get_defaultt($id_judul);
        $this->load->view("mahasiswa/v_inputjudulta", $data);
    }

    public function inputproposal($id_judul)
    {
        $this->load->model("m_mahasiswa");

        $data['list_judul'] = $this->m_mahasiswa->selectjudul($id_judul);
        $data['list_pbb1'] = $this->m_mahasiswa->load_pbb1();
        $data['list_pbb2'] = $this->m_mahasiswa->load_pbb2();
        if (isset($_POST['btninputproposal'])) {
            $this->m_mahasiswa->inputproposal($_POST, $id_judul);
            redirect("mahasiswa");
        }
        $data['defaultt'] = $this->m_mahasiswa->get_defaultt($id_judul);
        $this->load->view("mahasiswa/v_inputproposal", $data, array('error' => ' '));
    }

    // Untuk Booking Topik Dosbing
    public function bookingtopikta($idta)
    {
        $this->load->model("m_mahasiswa");
        $data['detail_topik'] = $this->m_mahasiswa->selecttopik($idta);

        if (isset($_POST['tombol_submit'])) {
            //proses simpan dilakukan
            $this->m_mahasiswa->simpan($_POST);
            redirect("mahasiswa/statusta");
        }
        $this->session->set_userdata('id_status', 6);
        $this->load->view('mahasiswa/v_updatejudul', $data);
    }

    public function detailtopikta($idta)
    {
        $this->load->model("m_mahasiswa");
        $data['detail_topik'] = $this->m_mahasiswa->selecttopik($idta);
        $this->load->view('mahasiswa/v_updatejudul', $data);
    }

    // XDXD
    public function get_default($idta)
    {
        $sql = $this->db->query("SELECT * FROM t_topik WHERE idta = " . intval($idta));
        if ($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }


    public function accept($idta)
    {
        $judul = $this->db->escape($_POST['judul']);
        $pbb1 = $this->db->escape($_POST['pbb1']);
        $pbb2 = $this->db->escape($_POST['pbb2']);
        $query = "UPDATE t_judul SET id_status = 8, pbb1 = $pbb1, pbb2 = $pbb2, judul = $judul WHERE idta = " . intval($idta);
        $sql   = $this->db->query($query);
        $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
        redirect(base_url("/mahasiswa"));
    }

    // COBA COBA BROH
    public function accept2($nim)
    {
        $query = "UPDATE mahasiswa SET id_status = 8 WHERE nim = " . intval($nim);
        $sql   = $this->db->query($query);
        $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
        redirect(base_url("/mahasiswa"));
    }


    public function delete($idta)
    {
        $this->load->model("m_mahasiswa");
        $this->m_mahasiswa->hapus($idta);
        redirect("data");
    }


    // CONTROLLER FAJRI
    public function indexpinjam()
    {
        $this->load->model("pinjam_model");
        // $data["peminjaman"] = $this->pinjam_model->getAll();
        $data["peminjaman"] = $this->pinjam_model->get_by_role();
        $this->load->view("mahasiswa/peminjaman", $data);
    }

    public function tambahpinjam()
    {
        $this->load->library('form_validation');
        $this->load->model('pinjam_model');
        $this->load->model('combobox_modelmahasiswa');
        $validation = $this->form_validation;
        $data['laboratorium'] = $this->combobox_modelmahasiswa->getlab();
        $data['status_pengajuan'] = $this->combobox_modelmahasiswa->getstatus();
        if (isset($_POST['tombol_submit'])) {
            $this->pinjam_model->save($_POST);
            redirect("mahasiswa/peminjaman");
        }
        $this->load->view("mahasiswa/tambahpinjam", $data);
    }

    public function editpinjam($id = null)
    {
        if (!isset($id)) redirect('mahasiswa/peminjaman');
        $this->load->model('combobox_modelmahasiswa');
        $this->load->library('form_validation');
        $this->load->model('pinjam_model');
        $peminjaman = $this->pinjam_model;
        $validation = $this->form_validation;
        $data['laboratorium'] = $this->combobox_modelmahasiswa->getlab();
        $data['status_pengajuan'] = $this->combobox_modelmahasiswa->getstatus();
        $validation->set_rules($peminjaman->rules());
        if (isset($_POST['tombol_submit'])) {
            $peminjaman->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["peminjaman"] = $peminjaman->getById($id);
        if (!$data["peminjaman"]) show_404();

        $this->load->view("mahasiswa/editpinjam", $data);
    }

    public function hapuspinjam($pinjam_id)
    {
        $this->db->query("delete from peminjaman where pinjam_id = $pinjam_id ");
        redirect("mahasiswa/indexpinjam");
    }

    public function aksi_upload_pinjam()
    {
        $config['upload_path']          = './assets/documents/laporan_peminjaman/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 25600000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_peminjaman')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('v_upload', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('v_uploadSuccess', $data);
            $upload_data = $this->upload->data();
            $_table = "peminjaman";
            $this->load->model('pinjam_model');
            $nim         = $this->session->userdata("nim");
            $post = $this->input->post();
            $post = $this->input->post();
            $nama_mahasiswa = $this->nama_mahasiswa = $post["nama_mahasiswa"];
            $nim = $this->nim = $post["nim"];
            $id_laboratorium = $this->id_laboratorium = $post["id_laboratorium"];
            $tanggal_peminjaman = $this->tanggal_peminjaman = $post["tanggal_peminjaman"];
            $tanggal_kembali = $this->tanggal_kembali = $post["tanggal_kembali"];
            $tanggal_update = $this->tanggal_update = $post["tanggal_update"];
            $id_pinjam = $this->id_pinjam = $post["id_pinjam"];
            $file_name   = $upload_data['file_name'];
            $nama_barang = $this->nama_barang = $post["nama_barang"];
            $spek = $this->spek = $post["spek"];
            $vol = $this->vol = $post["vol"];
            $nim            = $this->session->userdata("nim");
            $data = [];
            for ($i = 0; $i < count($nama_barang); $i++) {
                $data[] = [
                    'nama_mahasiswa' => $nama_mahasiswa,
                    'nim' => $nim,
                    'id_laboratorium' => $id_laboratorium,
                    'file_peminjaman' => $file_name,
                    'tanggal_peminjaman' => $tanggal_peminjaman,
                    'tanggal_kembali' => $tanggal_kembali,
                    'tanggal_update' => $tanggal_update,
                    'id_pinjam' => $id_pinjam,
                    'nama_barang' => $nama_barang[$i],
                    'spek' => $spek[$i],
                    'vol' => $vol[$i]
                ];
            }
            // var_dump($data);exit;
            $this->db->insert_batch("peminjaman", $data);
            redirect("mahasiswa/indexpinjam");
            // var_dump($file_name);exit;
        }
    }

    public function profilMahasiswa()
    {

        $this->load->model('M_mahasiswa');

        $this->M_mahasiswa->myjadwal();

        $this->load->view('mahasiswa/v_profilmahasiswa');
    }

    public function daftarsidang()
    {
        $this->load->model("m_mahasiswa");
        //$data['list_jadwal'] = $this->m_jadwal->load_judul();
        $data['list_judul'] = $this->m_mahasiswa->load_mahasiswaSessionBerjalan();

        $this->load->model("m_penjadwalan");

        $data['list_jadwal'] = $this->m_penjadwalan->getJadwalSidang();

        // var_dump($data['list_jadwal'][0]['tanggal']);


        $this->load->view("mahasiswa/v_daftarsidang", $data);
    }

    public function daftarsidangtambah()
    {
        $this->load->model("m_mahasiswa");

        $data = $this->m_mahasiswa->pilihTanggalSidang();

        if ($data) {
            $this->session->set_flashdata('sidangtambahsuccess', 'Sidang telah diajukan');
            return redirect('/mahasiswa/daftarsidang');
        } else {
            $this->session->set_flashdata('sidangtambahgagal', 'Sidang gagal diajukan');
            return redirect('/mahasiswa/daftarsidang');
        }
    }

    // public function statusta(){
    //     $this->load->model("m_mahasiswa");
    //     //$data['list_jadwal'] = $this->m_jadwal->load_judul();
    //     $data['list_judul'] = $this->m_mahasiswa->load_mahasiswaSessionBerjalan();
    //     $this->load->view("mahasiswa/v_statustugasakhir",$data);
    // }


}
