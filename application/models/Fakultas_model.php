<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas_model extends CI_Model
{

    // public function daftar_jurusan()
    // {
    //     $query = "SELECT * FROM jurusan";
    //     $sql = $this->db->query($query);
    //     return $sql->result_array();
    // }

    public function daftar_jurusan()
    {
        $query = "SELECT 
                    fakultas.id_fakultas,
                    fakultas.kode_fakultas,
                    fakultas.nama_fakultas,
                    jurusan.id_jurusan,
                    jurusan.kode_jurusan,
                    jurusan.nama_jurusan,
                    jurusan.id_fakultas,
                    angkatan.angkatan
                    FROM jurusan
                    JOIN fakultas ON
                        jurusan.id_fakultas = fakultas.id_fakultas
                    JOIN angkatan_jurusan ON
                        jurusan.id_jurusan = angkatan_jurusan.id_jurusan
                    JOIN angkatan ON
                        angkatan.id_angkatan = angkatan_jurusan.id_angkatan";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function daftar_angkatan()
    {
        $query = "SELECT * FROM angkatan ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function daftar_fakultas()
    {
        $query = "SELECT * FROM fakultas";
        $sql = $this->db->query($query);
        // print_r($sql);
        return $sql->result_array();
    }

    public function fakultasByID($id_fakultas)
    {
        $query = "SELECT 
                    fakultas.id_fakultas,
                    fakultas.kode_fakultas,
                    fakultas.nama_fakultas,
                    jurusan.id_jurusan,
                    jurusan.kode_jurusan,
                    jurusan.nama_jurusan,
                    angkatan.id_angkatan,
                    angkatan.angkatan,
                    jurusan.id_fakultas as fakultas_id
                    FROM fakultas
                    JOIN jurusan ON jurusan.id_fakultas = fakultas.id_fakultas
                    JOIN angkatan_jurusan ON jurusan.id_jurusan = angkatan_jurusan.id_jurusan
                    JOIN angkatan ON angkatan.id_angkatan = angkatan_jurusan.id_angkatan
                    WHERE fakultas.id_fakultas =" . $id_fakultas;
        $sql = $this->db->query($query);
        return $sql->row_array();
    }

    public function jurusanByID($id_jurusan)
    {
        $query = "SELECT 
                    fakultas.id_fakultas,
                    fakultas.kode_fakultas,
                    fakultas.nama_fakultas,
                    jurusan.id_jurusan,
                    jurusan.kode_jurusan,
                    jurusan.nama_jurusan,
                    angkatan.id_angkatan,
                    angkatan.angkatan,
                    jurusan.id_fakultas as fakultas_id
                    FROM jurusan
                    JOIN fakultas ON
                        fakultas.id_fakultas = jurusan.id_fakultas
                    JOIN angkatan_jurusan ON
                        jurusan.id_jurusan = angkatan_jurusan.id_jurusan
                    JOIN angkatan ON
                        angkatan.id_angkatan = angkatan_jurusan.id_angkatan
                    WHERE jurusan.id_jurusan =" . $id_jurusan;

        $sql = $this->db->query($query);

        return $sql->row_array();
    }

    public function angkatanByID($id_jurusan)
    {
        $query = "SELECT 
                    fakultas.id_fakultas,
                    fakultas.kode_fakultas,
                    fakultas.nama_fakultas,
                    jurusan.id_jurusan,
                    jurusan.kode_jurusan,
                    jurusan.nama_jurusan,
                    jurusan.angkatan,
                    jurusan.id_fakultas as fakultas_id
                    FROM jurusan
                    JOIN fakultas ON fakultas.id_fakultas = jurusan.id_fakultas
                    WHERE jurusan.id_jurusan =" . $id_jurusan;

        $sql = $this->db->query($query);

        return $sql->row_array();
    }

    public function daftar_kelas($id_jurusan)
    {
        $query = "SELECT * FROM kelas WHERE id_jurusan = " . $id_jurusan;
        $sql = $this->db->query($query);
        return $sql->result_array();
    }


    public function daftar_gedung()
    {
        $query = "SELECT * FROM gedung";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }


    public function tambahJurusan($post)
    {
        $id_fakultas    = $this->db->escape($_POST['id_fakultas']);
        $nama_jurusan   = $this->db->escape($_POST['nama_jurusan']);
        $kode_jurusan   = $this->db->escape($_POST['kode_jurusan']);
        $angkatan       = $this->db->escape($_POST['angkatan']);

        // INSERT ANGAKATAN

        $query1 = "INSERT INTO angkatan (
            angkatan
        ) SELECT * FROM (SELECT $angkatan) t
        WHERE NOT EXISTS (SELECT angkatan FROM angkatan WHERE angkatan = $angkatan) ";
        $sql1 = $this->db->query($query1);

        // BACA ANGKATAN YANG KITA INPUT
        
        $query2 = "SELECT * FROM angkatan WHERE angkatan = $angkatan";
        $sql2 = $this->db->query($query2);
        $hasilquery = $sql2->result_array(); 
        $id_angkatan = $hasilquery[0]['id_angkatan'];

        // INSERT JURUSAN

        $query3 = "INSERT INTO jurusan (
            id_fakultas,
            nama_jurusan,
            kode_jurusan
        ) SELECT * FROM (SELECT $id_fakultas, $nama_jurusan, $kode_jurusan) t
        WHERE NOT EXISTS (SELECT nama_jurusan FROM jurusan WHERE kode_jurusan = $kode_jurusan AND id_fakultas = $id_fakultas) ";
        $sql3 = $this->db->query($query3);

        // BACA JURUSAN YANG KITA INPUT

        $query4 = "SELECT * FROM jurusan WHERE kode_jurusan = $kode_jurusan AND id_fakultas = $id_fakultas";
        $sql4 = $this->db->query($query4);
        $hasilquery = $sql4->result_array(); 
        $id_jurusan = $hasilquery[0]['id_jurusan'];

        // INSERT BRIDGE TABEL ANGKATAN_JURUSAN

        $query5 = "INSERT INTO angkatan_jurusan (
                    id_jurusan,
                    id_angkatan
                )
                SELECT * FROM (SELECT $id_jurusan, $id_angkatan) t
                WHERE NOT EXISTS (SELECT id_angkatan_jurusan FROM angkatan_jurusan WHERE id_jurusan = $id_jurusan AND id_angkatan = $id_angkatan) ";
        $sql5 = $this->db->query($query5);
    }
    

    public function tambahFakultas($post)
    {
        $nama_fakultas  = $this->db->escape($_POST['nama_fakultas']);
        $kode_fakultas  = $this->db->escape($_POST['kode_fakultas']);
        $id_gedung      = $this->db->escape($_POST['id_gedung']);

        // Tambah ke tabel fakultas

        $query1   = "INSERT INTO fakultas (
            nama_fakultas,
            kode_fakultas
        ) SELECT * FROM (SELECT $nama_fakultas, $kode_fakultas) t
        WHERE NOT EXISTS (SELECT nama_fakultas FROM fakultas WHERE kode_fakultas = $kode_fakultas AND nama_fakultas = $nama_fakultas)";
        $sql1 = $this->db->query($query1);

        // Ambil id yang sudah di ditambah

        $query2   = "SELECT id_fakultas FROM fakultas WHERE nama_fakultas = $nama_fakultas AND kode_fakultas = $kode_fakultas";
        $sql2 = $this->db->query($query2);
        $hasilquery = $sql2->result_array();
        $id_fakultas = $hasilquery[0]['id_fakultas'];

        // Sambungkan fakultas sesuai gedung

        for ($i = 0; $i < sizeof($id_gedung); $i++) {
            $query3 = "INSERT INTO gedung_fakultas (
                        id_fakultas,
                        id_gedung
                    )
                    VALUES
                        (
                        $id_fakultas,
                        $id_gedung[$i]
                        )";
            $sql3 = $this->db->query($query3);
        }
    }

    public function tambahGedung($post)
    {
        $nama_gedung   = $this->db->escape($_POST['nama_gedung']);
        $query = "INSERT INTO gedung (
                    nama_gedung
                )
                VALUES
                    (
                    $nama_gedung
                    )";
        $sql = $this->db->query($query);
    }

    public function hapus_jurusan($id_jurusan)
    {
        $this->db->delete('jurusan', ['id_jurusan' => $id_jurusan]);
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

    public function jurusanByFakultasId($id_fakultas){
        return $this->db->select('*')->where('id_fakultas', $id_fakultas)->get('jurusan')->result_array();
        // SELECT * FROM FAKULTAS WHERE id_fakultas = $id_fakultas

        // ANGKATAN 
        
        // JURUSAN
    }

    public function angkatanByJurusanId($id_jurusan){
        return $this->db
            ->select('angkatan.*')
            ->where('angkatan_jurusan.id_jurusan', $id_jurusan)
            ->join('angkatan_jurusan','angkatan.id_angkatan = angkatan_jurusan.id_angkatan')
            ->get('angkatan')->result_array();
    }

    public function updateFakultas()
    {
            $id_fakultas   = $this->db->escape($_POST['id_fakultas']);
            $kode_fakultas  = $this->db->escape($_POST['kode_fakultas']);
            $nama_fakultas  = $this->db->escape($_POST['nama_fakultas']);
			$query = "UPDATE fakultas SET
                        id_fakultas = $id_fakultas,
						kode_fakultas = $kode_fakultas,
                        nama_fakultas = $nama_fakultas
					WHERE id_fakultas = $id_fakultas 
					";
			$sql = $this->db->query($query);
			$this->session->set_flashdata('alert', 'Data Fakultas Telah Diubah');
    }

    public function load_FakultasSelect($id_fakultas)
    {
        $query = "SELECT * FROM fakultas WHERE id_fakultas = ".intval($id_fakultas);
        $sql = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    function hapusFakultas($id_fakultas)
    {
        $this->db->query("DELETE FROM fakultas WHERE id_fakultas = ".intval($id_fakultas));
    }

    public function daftarGedung_fakultas()
    {
        $query = "SELECT * FROM gedung_fakultas";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function load_Lokasi_GedungSelect($id_gedung_fakultas)
    {
        $query = "SELECT 
                    gedung_fakultas.id_gedung_fakultas as id_gedung_fakultas,
                    fakultas.id_fakultas as id_fakultas,
                    fakultas.kode_fakultas as kode_fakultas,
                    fakultas.nama_fakultas as nama_fakultas,
                    gedung.id_gedung as id_gedung,
                    gedung.nama_gedung as nama_gedung
                    FROM gedung_fakultas
                    JOIN fakultas ON gedung_fakultas.id_fakultas = fakultas.id_fakultas 
                    JOIN gedung ON gedung.id_gedung = gedung_fakultas.id_gedung
                    WHERE id_gedung_fakultas = $id_gedung_fakultas";
        $sql = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function daftar_jurusanfakultas($id_fakultas)
    {
        $query = "SELECT * 
                    FROM jurusan 
                    JOIN angkatan_jurusan ON angkatan_jurusan.id_jurusan = jurusan.id_jurusan
                    JOIN angkatan ON angkatan.id_angkatan = angkatan_jurusan.id_angkatan
                    WHERE jurusan.id_fakultas = $id_fakultas";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }


}
