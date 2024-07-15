<?php


class Akun_model extends CI_Model
{

    function buatAkun($post)
    {
        $nip            = $this->db->escape($_POST['nip']);
        $nama_depan      = $this->db->escape($_POST['nama_depan']);
        $nama_belakang     = $this->db->escape($_POST['nama_belakang']);
        $kode_dosen     = $this->db->escape($_POST['kode_dosen']);
        $email          = $this->db->escape($_POST['email']);
        $username       = $this->db->escape($_POST['username']);
        $password       = md5($this->db->escape($_POST['password']));
        $query = "INSERT INTO dosen (
                    nip,
                    nama_depan,
                    nama_belakang,
                    kode_dosen,
                    email,
                    username,
                    password,
                    id_status
                )
                VALUES
                    (
                        $nip,
                        $nama_depan,
                        $nama_belakang,
                        $kode_dosen,
                        $email,
                        $username,
                        '$password',
                        1
                    )";
        $sql = $this->db->query($query);

        $query1 = "INSERT INTO dosen_additional (
                    nip
                )
                VALUES
                    (
                        $nip
                    )";
        $sql1 = $this->db->query($query1);
    }
}
