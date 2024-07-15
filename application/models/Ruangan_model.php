<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan_model extends CI_Model
{

    public function ruanganByID($id_ruangan)
    {
        $query = "SELECT * FROM ruangan WHERE id_ruangan = $id_ruangan";

        $sql = $this->db->query($query);
        print_r($sql);
    }

    public function ruangan_gedungByID($id_gedung)
    {
        $query = "SELECT * FROM ruangan WHERE id_gedung = $id_gedung";

        $sql = $this->db->query($query);
        print_r($sql);
    }

    public function gedungByID($id_gedung)
    {
        $query = "SELECT * FROM gedung WHERE id_gedung = $id_gedung";

        $sql = $this->db->query($query);
        print_r($sql);
    }

    public function daftar_ruangan()
    {
        $query = "SELECT 
                    gedung.id_gedung,
                    gedung.nama_gedung,
                    ruangan.id_ruangan,
                    ruangan.id_gedung,
                    ruangan.nama_ruangan,
                    ruangan.kapasitas
                    FROM gedung
                    JOIN ruangan ON
                        ruangan.id_gedung = gedung.id_gedung ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function daftar_ruangangedung($id_gedung)
    {
        $query = "SELECT * FROM ruangan 
                    JOIN gedung ON ruangan.id_gedung = gedung.id_gedung
                    WHERE ruangan.id_gedung = $id_gedung";
        // $query = "SELECT 
        //             gedung.id_gedung,
        //             gedung.nama_gedung,
        //             ruangan.id_ruangan,
        //             ruangan.id_gedung,
        //             ruangan.nama_ruangan,
        //             ruangan.kapasitas
        //             FROM ruangan
        //             JOIN gedung ON
        //                 gedung.id_gedung = ruangan.id_gedung ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function daftar_gedung()
    {
        $query = "SELECT * FROM gedung";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function tambahRuangan($post)
    {
        $nama_ruangan = $this->db->escape($_POST['nama_ruangan']);
        $kapasitas    = $this->db->escape($_POST['kapasitas']);
        $id_gedung    = $this->db->escape($_POST['id_gedung']);
        $query = "INSERT INTO ruangan (
                    nama_ruangan,   
                    kapasitas,   
                    id_gedung
                )
                VALUES
                    (
                    $nama_ruangan,
                    $kapasitas,
                    $id_gedung
                    )";
        $sql = $this->db->query($query);
    }

    public function tambahGedung()
    {
        $nama_gedung  = $this->db->escape($_POST['nama_gedung']);
        $query = "INSERT INTO gedung (
                    nama_gedung
                )
                VALUES
                    (
                    $nama_gedung
                    )";
        $sql = $this->db->query($query);
    }

    public function hapus_ruangan($id_ruangan)
    {
        $this->db->delete('ruangan', ['id_ruangan' => $id_ruangan]);
    }

    public function load_RuanganSelect($id_ruangan)
    {
        $query = "SELECT * FROM ruangan WHERE id_ruangan = ".intval($id_ruangan);
        $sql = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function load_GedungSelect($id_gedung)
    {
        $query = "SELECT * FROM gedung WHERE id_gedung = ".intval($id_gedung);
        $sql = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function updateGedung()
    {
            $id_gedung   = $this->db->escape($_POST['id_gedung']);
            $nama_gedung  = $this->db->escape($_POST['nama_gedung']);
			$query = "UPDATE gedung SET
						nama_gedung = $nama_gedung
					WHERE id_gedung = $id_gedung 
					";
			$sql = $this->db->query($query);
			$this->session->set_flashdata('alert', 'Data Gedung Telah Diubah');
    }

    public function updateRuangan($id_ruangan)
    {
            $nama_ruangan   = $this->db->escape($_POST['nama_ruangan']);
            $id_gedung   = $this->db->escape($_POST['id_gedung']);
            $kapasitas   = $this->db->escape($_POST['kapasitas']);
			$query = "UPDATE ruangan SET
						nama_ruangan = $nama_ruangan,
                        id_gedung = $id_gedung,
                        kapasitas = $kapasitas
					WHERE id_ruangan = $id_ruangan 
					";
			$sql = $this->db->query($query);
			$this->session->set_flashdata('alert', 'Data Ruangan Telah Diubah');
    }

    function hapusRuangan($id_ruangan)
    {
        $this->db->query("DELETE FROM ruangan WHERE id_ruangan = ".intval($id_ruangan));
    }

    function hapusGedung($id_gedung)
    {
        $this->db->query("DELETE FROM gedung WHERE id_gedung = ".intval($id_gedung));
    }

    function getRuanganFakultas(){
        $query = "SELECT ruangan.nama_ruangan, fakultas.kode_fakultas FROM `ruangan`
        JOIN gedung ON gedung.id_gedung = ruangan.id_gedung
        JOIN gedung_fakultas ON gedung_fakultas.id_gedung = gedung.id_gedung
        JOIN fakultas ON fakultas.id_fakultas = gedung_fakultas.id_fakultas";
        return $this->db->query($query)->result_array();
    }
}
