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
        $jenis_kelamin  = $this->db->escape($_POST['jenis_kelamin']);
        $query = "INSERT INTO dosen (
                    nip,
                    nama_depan,
                    nama_belakang,
                    kode_dosen,
                    email,
                    username,
                    password,
                    jenis_kelamin,
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
                        $jenis_kelamin,
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

    public function deleteByNip($nip)
    {
        $this->db->delete('dosen_additional', array('nip' => $nip));
         return true;
    }

    function dataDosenSession()
    {
        $nip = $this->session->userdata("nip");
        $sql = "SELECT d.*, b.nama_bidang as bidang, jb.jabatan AS jabatan_fungsional  FROM dosen d
                JOIN bidang b ON b.id_bidang = d.id_bidang
                JOIN jabatan jb ON jb.id_jabatan = d.id_jabatan
                WHERE nip = $nip ";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }
}
