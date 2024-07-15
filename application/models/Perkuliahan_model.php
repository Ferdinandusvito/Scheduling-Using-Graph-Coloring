<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perkuliahan_model extends CI_Model
{

    public function daftarMatkul()
    {
        $query = "SELECT * FROM matkul";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function daftarMKDU_jurusan()
    {
        $query = "SELECT * FROM perkuliahan";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function daftarAngkatan()
    {
        $query = "SELECT * FROM angkatan";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function tambahMatkul()
    {
        $nama_matkul   = $this->db->escape($_POST['nama_matkul']);
        $kode_matkul   = $this->db->escape($_POST['kode_matkul']);
        $sks   = $this->db->escape($_POST['sks']);
        $query = "INSERT INTO matkul (
            nama_matkul,
            kode_matkul,
            sks
        )
        VALUES
            (
            $nama_matkul,
            $kode_matkul,
            $sks
            )";
        $sql = $this->db->query($query);
    }

    public function load_MatkulSelect($id_matkul)
    {
        $query = "SELECT * FROM matkul WHERE id_matkul = ".intval($id_matkul);
        $sql = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function updateMatkul()
    {
        $id_matkul  = $this->db->escape($_POST['id_matkul']);
        $nama_matkul  = $this->db->escape($_POST['nama_matkul']);
        $kode_matkul  = $this->db->escape($_POST['kode_matkul']);
        $sks  = $this->db->escape($_POST['sks']);
        $query = "UPDATE matkul SET
						id_matkul = $id_matkul,
                        nama_matkul = $nama_matkul,
                        kode_matkul = $kode_matkul,
                        sks= $sks
					WHERE id_matkul = $id_matkul
					";
        $sql = $this->db->query($query);
        $this->session->set_flashdata('alert', 'Data Mata Kuliah Telah Diubah');
    }

    function hapusMatkul($id_matkul)
    {
        $this->db->query("DELETE FROM matkul WHERE id_matkul = ".intval($id_matkul));
    }


    public function tambahMkdu($post)
    {
        $id_jurusan    = $this->db->escape($_POST['id_jurusan']);
        $id_matkul      = $this->db->escape($_POST['id_matkul']);
        // print_r($id_matkul);
        for ($i = 0; $i < sizeof($id_matkul); $i++) {
            $query = "INSERT INTO perkuliahan (
                id_jurusan,
                id_matkul
            )
            VALUES
            (
                $id_jurusan,
                $id_matkul[$i]
            )";
            $sql = $this->db->query($query);
        }
    }

    public function load_MKDU_jurusanSelect($id_perkuliahan)
    {
        $query = "SELECT 
                    perkuliahan.id_perkuliahan as id_perkuliahan,
                    fakultas.id_fakultas as id_fakultas,
                    fakultas.nama_fakultas as nama_fakultas,
                    jurusan.id_jurusan as id_jurusan,
                    jurusan.nama_jurusan as nama_jurusan,
                    angkatan.id_angkatan as id_angkatan,
                    angkatan.angkatan as angkatan,
                    matkul.id_matkul as id_matkul,
                    matkul.nama_matkul as nama_matkul,
                    matkul.kode_matkul as kode_matkul,
                    matkul.sks as sks
                    FROM perkuliahan
                    JOIN jurusan ON perkuliahan.id_jurusan = jurusan.id_jurusan
                    JOIN matkul ON matkul.id_matkul = perkuliahan.id_matkul
                    JOIN fakultas ON fakultas.id_fakultas = jurusan.id_fakultas
                    JOIN angkatan_jurusan ON jurusan.id_jurusan = angkatan_jurusan.id_jurusan
                    JOIN angkatan ON angkatan_jurusan.id_angkatan = angkatan.id_angkatan
                    WHERE id_perkuliahan = $id_perkuliahan";
        $sql = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function simpanMKDU_jurusan($post)
    {
            $id_jurusan    = $this->db->escape($_POST['id_jurusan']);
            $id_matkul      = $this->db->escape($_POST['id_matkul']);
            for ($i = 0; $i < sizeof($id_matkul); $i++) 
            {
                $query = "INSERT INTO perkuliahan (
                    id_jurusan,
                    id_matkul
                )
                VALUES
                (
                    $id_jurusan,
                    $id_matkul[$i]
                )";
                $sql = $this->db->query($query);
            }
        if($sql)
            return true;
        return false;
    }

    function hapusMKDU_jurusan($id_perkuliahan)
    {
        $this->db->query("DELETE FROM perkuliahan WHERE id_perkuliahan = ".intval($id_perkuliahan));
    }

    public function ambilMatkul($post, $nip)
    {
        $id_matkul      = $this->db->escape($_POST['id_matkul']);
        for ($i = 0; $i < sizeof($id_matkul); $i++) {
            $query = "INSERT INTO mengajar (
            nip,
            id_matkul
        )
        VALUES
            (
            $nip,
            $id_matkul[$i]
            )";
            $sql = $this->db->query($query);
        }
    }

    function hapusMatkul_ajarku($id_mengajar)
    {
        $this->db->query("DELETE FROM mengajar WHERE id_mengajar = ".intval($id_mengajar));
    }

    public function daftarMatkulByDosen($nip)
    {
        $query = "SELECT matkul.nama_matkul as nama_matkul, 
                        matkul.kode_matkul as kode_matkul, 
                        matkul.sks as sks,
                        mengajar.nip as nip,
                        mengajar.id_mengajar as id_mengajar
                        FROM mengajar JOIN matkul on 
                        mengajar.id_matkul = matkul.id_matkul
                        WHERE mengajar.nip = $nip ";
        $sql = $this->db->query($query);
        return $sql->result_array();
        
    }

    public function daftarData_kuliah($nip)
    {
        $query = "SELECT matkul.nama_matkul as nama_matkul, 
                        matkul.kode_matkul as kode_matkul, 
                        matkul.sks as sks,
                        mengajar.nip as nip,
                        mengajar.id_mengajar as id_mengajar,
                        dosen.nama_depan as nama_depan,
                        dosen.nama_belakang as nama_belakang,
                        dosen.kode_dosen as kode_dosen
                        FROM mengajar 
                        JOIN dosen on mengajar.nip = dosen.nip 
                        JOIN matkul on mengajar.id_matkul = matkul.id_matkul";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function deleteByNip($nip)
    {
        $this->db->delete('mengajar', array('nip' => $nip));
         return true;
    }

    public function daftarMKDU()
    {
        $query = "SELECT 
                    perkuliahan.id_perkuliahan as id_perkuliahan,
                    fakultas.nama_fakultas as nama_fakultas,
                    jurusan.nama_jurusan as nama_jurusan,
                    angkatan.angkatan as angkatan,
                    matkul.nama_matkul as nama_matkul,
                    matkul.kode_matkul as kode_matkul,
                    matkul.sks as sks
                    FROM perkuliahan
                    JOIN jurusan ON perkuliahan.id_jurusan = jurusan.id_jurusan
                    JOIN matkul ON matkul.id_matkul = perkuliahan.id_matkul
                    JOIN fakultas ON fakultas.id_fakultas = jurusan.id_fakultas
                    JOIN angkatan_jurusan ON jurusan.id_jurusan = angkatan_jurusan.id_jurusan
                    JOIN angkatan ON angkatan_jurusan.id_angkatan = angkatan.id_angkatan";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function perkuliahanByJurusan($id_jurusan){
        $query = "SELECT 
                    perkuliahan.id_perkuliahan as id_perkuliahan,
                    fakultas.id_fakultas as id_fakultas,
                    fakultas.nama_fakultas as nama_fakultas,
                    jurusan.id_jurusan as id_jurusan,
                    jurusan.nama_jurusan as nama_jurusan,
                    angkatan.id_angkatan as id_angkatan,
                    angkatan.angkatan as angkatan,
                    matkul.id_matkul as id_matkul,
                    matkul.nama_matkul as nama_matkul,
                    matkul.kode_matkul as kode_matkul,
                    matkul.sks as sks
                    FROM perkuliahan
                    JOIN jurusan ON perkuliahan.id_jurusan = jurusan.id_jurusan
                    JOIN matkul ON matkul.id_matkul = perkuliahan.id_matkul
                    JOIN fakultas ON fakultas.id_fakultas = jurusan.id_fakultas
                    JOIN angkatan_jurusan ON jurusan.id_jurusan = angkatan_jurusan.id_jurusan
                    JOIN angkatan ON angkatan_jurusan.id_angkatan = angkatan.id_angkatan
                    WHERE id_jurusan = $id_jurusan";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
}
