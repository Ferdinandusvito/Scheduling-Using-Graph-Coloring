<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{

    // public function index()
    // {
    // }
    public function daftar_dosen()
    {
        $query = "SELECT * FROM dosen WHERE id_status = 2 ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function daftar_dosenbaru()
    {
        $query = "SELECT * FROM dosen WHERE id_status = 1 ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function exploredosenBynip($nip)
    {
        $query = 'SELECT * FROM dosen WHERE nip = ' . $nip;
        $sql = $this->db->query($query)->row_array();
        return $sql;
    }

    public function exploreadditionalBynip($nip)
    {
        $query = 'SELECT * FROM dosen_additional WHERE nip = ' . $nip;
        $sql = $this->db->query($query)->row_array();
        return $sql;
    }

    public function hapus_dosen($nip)
    {
        $this->db->delete('dosen', ['nip' => $nip]);
    }

    public function acc_dosen($nip)
    {
        $query = "UPDATE dosen SET
        id_status = 2
        WHERE nip = $nip
        ";
        // var_dump($query);exit;
        $sql = $this->db->query($query);
    }

    public function tambahRoles($nip)
    {
        $query = "INSERT roles SET
        user_role_id = 2,
        nip = $nip
        ";
        // var_dump($query);exit;
        $sql = $this->db->query($query);
    }

    // function updateeDosen($post)
    // {
    //     $nip                = $this->db->escape($_POST['nip']);
    //     $nama_depan         = $this->db->escape($_POST['nama_depan']);
    //     $nama_belakang      = $this->db->escape($_POST['nama_belakang']);
    //     $email              = $this->db->escape($_POST['email']);

    //     $query = "UPDATE dosen SET
    //                 -- nip             = $nip,
    //                 nama_depan      = $nama_depan,
    //                 nama_belakang   = $nama_belakang,
    //                 email           = $email
    //                 WHERE nip       = $nip";
    //     // var_dump($query);exit;
    //     $sql = $this->db->query($query);
    // }

    // function updateDosen($post)
    // {
    //     $nip                = $this->db->escape($_POST['nip']);
    //     $jab_fungsional     = $this->db->escape($_POST['jab_fungsional']);
    //     $jab_struktural     = $this->db->escape($_POST['jab_struktural']);
    //     $kota_asal          = $this->db->escape($_POST['kota_asal']);
    //     $tanggal_lahir      = $this->db->escape($_POST['tanggal_lahir']);
    //     $alamat             = $this->db->escape($_POST['alamat']);
    //     $no_telp            = $this->db->escape($_POST['no_telp']);

    //     $query = "UPDATE dosen_additional SET
    //                 -- nip             = $nip,
    //                 jab_fungsional  = $jab_fungsional,
    //                 jab_struktural  = $jab_struktural,
    //                 kota_asal       = $kota_asal,
    //                 tanggal_lahir   = $tanggal_lahir,
    //                 alamat          = $alamat,
    //                 no_telp         = $no_telp
    //                 WHERE nip   = $nip";
    //     var_dump($query);exit;
    //     $sql = $this->db->query($query);
    // }

    function updateDosen($post)
    {
        $nip                = $this->db->escape($_POST['nip']);
        $nama_depan         = $this->db->escape($_POST['nama_depan']);
        $nama_belakang      = $this->db->escape($_POST['nama_belakang']);
        $username           = $this->db->escape($_POST['username']);
        // $password           = md5($_POST['password']);
        $email              = $this->db->escape($_POST['email']);
        $jab_fungsional     = $this->db->escape($_POST['jab_fungsional']);
        $jab_struktural     = $this->db->escape($_POST['jab_struktural']);
        $kota_asal          = $this->db->escape($_POST['kota_asal']);
        $tanggal_lahir      = $this->db->escape($_POST['tanggal_lahir']);
        $alamat             = $this->db->escape($_POST['alamat']);
        $no_telp            = $this->db->escape($_POST['no_telp']);

        $query = "UPDATE dosen SET
                    -- nip             = $nip,
                    nama_depan      = $nama_depan,
                    nama_belakang   = $nama_belakang,
                    username        = $username,
                    -- password        = $password,
                    email           = $email
                    WHERE nip       = $nip";
        // var_dump($query);exit;
        $sql = $this->db->query($query);

        $query = "UPDATE dosen_additional SET
                    -- nip             = $nip,
                    jab_fungsional  = $jab_fungsional,
                    jab_struktural  = $jab_struktural,
                    kota_asal       = $kota_asal,
                    tanggal_lahir   = $tanggal_lahir,
                    alamat          = $alamat,
                    no_telp         = $no_telp
                    WHERE nip   = $nip";
        $sql = $this->db->query($query);
    }

    // function profilDosen($nip)
    // {
    //     $query = 'SELECT * FROM dosen WHERE nip = ' . $nip;
    //     $sql = $this->db->query($query)->row_array();
    //     return $sql;
    // }

    function profilDosen($nip)
    {
        $query = 'SELECT  
                dosen_additional.nip,
                dosen_additional.jab_fungsional,
                dosen_additional.jab_struktural,
                dosen_additional.kota_asal,
                dosen_additional.tanggal_lahir,
                dosen_additional.alamat,
                dosen_additional.no_telp,
                dosen.nip as nipDosen,
                dosen.jenis_kelamin,
                dosen.nama_depan,
                dosen.nama_belakang,
                dosen.email
                FROM dosen_additional 
                JOIN dosen ON
                    dosen.nip = dosen_additional.nip
                WHERE dosen.nip = ' . $nip;

        $sql = $this->db->query($query);

        print_r($nip);
        return $sql->row_array();
    }

    public function deleteRolesByNip($nip)
    {
        $this->db->delete('roles', array('nip' => $nip));
         return true;
    }
}
