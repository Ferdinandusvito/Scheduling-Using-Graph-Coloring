<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Waktu_model extends CI_Model
{

    public function hariByID($id_hari)
    {
        $query = "SELECT * FROM hari WHERE id_hari = $id_hari";

        $sql = $this->db->query($query);
        print_r($sql);
    }

    public function load_HariSelect($id_hari)
    {
        $query = "SELECT * FROM hari WHERE id_hari = ".intval($id_hari);
        $sql = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function updateHari()
    {
            $nama_hari  = $this->db->escape($_POST['nama_hari']);
            $id_hari  = $this->db->escape($_POST['id_hari']);
            $query = "UPDATE hari SET 
                        nama_hari = $nama_hari 
                        WHERE id_hari = $id_hari
                        ";
            $sql = $this->db->query($query);
			$this->session->set_flashdata('alert', 'Data Hari Telah Diubah');
    }

    function hapusHari1($id_hari){
        $this->db->query("DELETE FROM hari WHERE id_hari = ".intval($id_hari));
    }

    public function jamByID($kode_jam)
    {
        $query = "SELECT * FROM jam WHERE kode_jam = $kode_jam";

        $sql = $this->db->query($query);
        print_r($sql);
    }

    public function load_JamSelect($kode_jam)
    {
        $query = "SELECT * FROM jam WHERE kode_jam = '$kode_jam'";
        $sql = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function updateJam($kode_jam)
    {
            $nama_jam = $this->db->escape($_POST['nama_jam']);
            $kode_jam = $this->db->escape($_POST['kode_jam']);
            $query = "UPDATE jam SET 
                    nama_jam = $nama_jam 
                    WHERE kode_jam = $kode_jam";
            $sql = $this->db->query($query);
			$this->session->set_flashdata('alert', 'Data Jam Telah Diubah');
    }

    function hapusJam1($kode_jam){
        $this->db->query("DELETE FROM jam WHERE kode_jam = '$kode_jam'");
    }


    // public function daftar_jam()
    // {
    //     $query = "SELECT 
    //                 waktu.kode_waktu,
    //                 waktu.id_kelas,
    //                 waktu.kode_jam,
    //                 jam.kode_jam,
    //                 jam.nama_jam
    //                 FROM jam
    //                 JOIN waktu ON
    //                     waktu.kode_jam = jam.kode_jam ";
    //     $sql = $this->db->query($query);
    //     return $sql->result_array();
    // }

    public function daftar_jam2()
    {
        $query = "SELECT * FROM jam";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function daftar_hari2()
    {
        $query = "SELECT * FROM hari";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    // public function daftar_hari()
    // {
    //     $query = "SELECT 
    //                 hari.id_hari,
    //                 hari.nama_hari,
    //                 waktu.kode_waktu,
    //                 waktu.id_kelas,
    //                 waktu.kode_jam
    //                 FROM hari
    //                 JOIN waktu ON
    //                     waktu.id_hari = hari.id_hari ";
    //     $sql = $this->db->query($query);
    //     return $sql->result_array();
    // }

    public function tambahJam($post)
    {
        $kode_jam           = $this->db->escape($_POST['kode_jam']);
        $nama_jam           = $this->db->escape($_POST['nama_jam']);
        $query = "INSERT INTO jam (
                    kode_jam,
                    nama_jam
                )
                VALUES
                    (
                        $kode_jam,
                        $nama_jam
                    )";
        $sql = $this->db->query($query);
    }
    public function tambahHari($post)
    {
        $id_hari           = $this->db->escape($_POST['id_hari']);
        $nama_hari           = $this->db->escape($_POST['nama_hari']);
        $query = "INSERT INTO hari (
                    id_hari,
                    nama_hari
                )
                VALUES
                    (
                        $id_hari,
                        $nama_hari
                    )";
        $sql = $this->db->query($query);
    }

    public function hapus_jam($kode_jam)
    {
        $this->db->delete('jam', ['kode_jam' => $kode_jam]);
    }

    public function hapus_hari($id_hari)
    {
        $this->db->delete('hari', ['id_hari' => $id_hari]);
    }

    function select()
    {
        $this->db->order_by('id_hari', 'DESC');
        $query = $this->db->get('hari');
        return $query;
    }
}
