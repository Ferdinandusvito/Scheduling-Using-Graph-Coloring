<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{

    public function daftar_kelas()
    {
        $query = "SELECT 
                    fakultas.id_fakultas,
                    fakultas.nama_fakultas,
                    jurusan.id_jurusan,
                    jurusan.nama_jurusan,
                    jurusan.id_fakultas,
                    jurusan.angkatan,
                    kelas.id_kelas,
                    kelas.nama_kelas,
                    kelas.dosen_wali,
                    kelas.id_jurusan
                    FROM fakultas
                    JOIN kelas ON
                        kelas.id_jurusan = jurusan.id_jurusan ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }


    public function daftar_jurusan()
    {
        $query = "SELECT * FROM jurusan";
        $sql = $this->db->query($query);
        // print_r($sql);
        return $sql->result_array();
    }

    public function kelasByID($id_kelas)
    {
        $query = "SELECT 
                    fakultas.id_fakultas,
                    fakultas.kode_fakultas,
                    fakultas.nama_fakultas,
                    jurusan.id_jurusan,
                    jurusan.kode_jurusan,
                    jurusan.nama_jurusan,
                    jurusan.angkatan,
                    kelas.id_kelas,
                    kelas.nama_kelas,
                    kelas.dosen_wali,
                    kelas.id_jurusan,
                    kelas.id_jurusan as jurusan_id
                    FROM kelas
                    JOIN jurusan ON
                        kelas.id_kelas = kelas.id_jurusan
                    WHERE kelas.id_kelas =" . $id_kelas;

        $sql = $this->db->query($query);

        return $sql->row_array();
    }

    public function daftar_kelass($id_jurusan)
    {
        $query = "SELECT * FROM kelas WHERE id_jurusan = " . $id_jurusan;
        $sql = $this->db->query($query);
        return $sql->result_array();
    }


    public function tambahKelas($post)
    {
        $id_jurusan    = $this->db->escape($_POST['id_jurusan']);
        $nama_kelas   = $this->db->escape($_POST['nama_kelas']);
        $dosen_wali   = $this->db->escape($_POST['dosen_wali']);
        $query = "INSERT INTO kelas (
                    id_jurusan,
                    nama_kelas,
                    dosen_wali
                )
                VALUES
                    (
                    $id_jurusan,
                    $nama_kelas,
                    $dosen_wali
                    )";
        $sql = $this->db->query($query);
    }

    public function hapus_kelas($id_jurusan)
    {
        $this->db->delete('kelas', ['id_kelas' => $id_kelas]);
    }

    function select()
    {
        $this->db->order_by('id_kelas', 'DESC');
        $query = $this->db->get('kelas');
        return $query;
    }

    function insert($data)
    {
        $this->db->insert_batch('kelas', $data);
    }
}
