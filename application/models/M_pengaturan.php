<?php
class m_pengaturan extends CI_Model
{
    function select_dekan()
    {
        $sql = "SELECT
                        *
                    FROM
                        dosen
                    LEFT JOIN roles ON roles.nip = dosen.nip
                    WHERE
                        roles.user_role_id = 5 ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function select_PPM()
    {
        $sql = "SELECT
                        *
                    FROM
                        dosen
                    LEFT JOIN roles ON roles.nip = dosen.nip
                    WHERE
                        roles.user_role_id = 6";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function select_ketuakk()
    {
        $sql = "SELECT
                        *
                    FROM
                        dosen
                    LEFT JOIN roles ON roles.nip = dosen.nip
                    WHERE
                        roles.user_role_id = 1 ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }
    function select_laboran()
    {
        $sql = "SELECT
                        *
                    FROM
                        dosen
                    LEFT JOIN roles ON roles.nip = dosen.nip
                    WHERE
                        roles.user_role_id = 7 ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }
    function select_dsnPkip()
    {
        $sql = "SELECT
                        *
                    FROM
                        dosen
                    LEFT JOIN roles ON roles.nip = dosen.nip
                    WHERE
                        roles.user_role_id = 80 ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function select_dsnPembina()
    {
        $query = "SELECT
                        *
                    FROM
                        dosen
                    LEFT JOIN roles ON roles.nip = dosen.nip
                    WHERE
                        roles.user_role_id = 51 ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    function dataDosen()
    {
        $sql = "SELECT
                        *
                    FROM
                        dosen
                    JOIN roles ON roles.nip = dosen.nip
                    WHERE
                        roles.user_role_id = 2";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dataDosenSelect($nip)
    {
        $sql = "SELECT
                        *
                    FROM
                        dosen d
                    JOIN bidang bd ON bd.id_bidang = d.id_bidang
                    JOIN jabatan jb ON jb.id_jabatan = d.id_jabatan
                    WHERE nip = $nip ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function dataJabatan()
    {
        $sql = "SELECT * FROM jabatan";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dataBidang()
    {
        $sql = "SELECT * FROM bidang ";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    function dataBidangSelect($id_bidang)
    {
        $sql = "SELECT * FROM bidang WHERE id_bidang = $id_bidang ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    public function simpanBidang($post)
    {
        $nama_bidang      = $this->db->escape($_POST['nama_bidang']);
        $query =    "INSERT INTO bidang (nama_bidang) 
                        VALUES
                            ($nama_bidang)
                        ";
        $sql = $this->db->query($query);

        if ($sql)
            return true;
        return false;
    }

    public function simpanDekan($post)
    {
        $nama_awal      = $this->db->escape($post['nama_awal']);
        $nip_lama       = $this->db->escape($post['nip_lama']);
        $nip            = $this->db->escape($post['nip']);
        $user_role_id   = 5;
        $query =    "UPDATE dosen SET
                        nip = $nip,
                        nama_awal = $nama_awal,
                        user_role_id = $user_role_id
                    WHERE 
                        nip = $nip_lama
                    ";
        $sql = $this->db->query($query);

        if ($sql)
            return true;
        return false;
    }

    public function simpanPPM($post)
    {
        $nama_awal      = $this->db->escape($post['nama_awal']);
        $nip_lama       = $this->db->escape($post['nip_lama']);
        $nip            = $this->db->escape($post['nip']);
        $user_role_id   = 6;
        $query =    "UPDATE dosen SET
                        nip = $nip,
                        nama_awal = $nama_awal,
                        user_role_id = $user_role_id
                    WHERE 
                        nip = $nip_lama
                    ";
        $sql = $this->db->query($query);

        if ($sql)
            return true;
        return false;
    }

    public function simpanDosen($post)
    {
        $nip            = $this->db->escape($_POST['nip']);
        $nidn           = $this->db->escape($_POST['nidn']);
        $nama_awal      = $this->db->escape($_POST['nama_awal']);
        $nama_akhir     = $this->db->escape($_POST['nama_akhir']);
        $kode_dosen     = $this->db->escape($_POST['kode_dosen']);
        $alamat         = $this->db->escape($_POST['alamat']);
        $jenis_kelamin  = $this->db->escape($_POST['jenis_kelamin']);
        $telp           = $this->db->escape($_POST['telp']);
        $blog           = $this->db->escape($_POST['blog']);
        $id_bidang      = $this->db->escape($_POST['id_bidang']);
        $username       = $this->db->escape($_POST['username']);
        $password       = md5($this->db->escape($_POST['password']));
        $email          = $this->db->escape($_POST['email']);
        $jab_fungsional = $this->db->escape($_POST['jab_fungsional']);
        $jab_struktural = $this->db->escape($_POST['jab_struktural']);
        $jab_pangkat    = $this->db->escape($_POST['jab_pangkat']);
        $jab_golongan   = $this->db->escape($_POST['jab_golongan']);
        $query = "INSERT INTO dosen (
                        nip,
                        nidn,
                        nama_awal,
                        nama_akhir,
                        kode_dosen,
                        alamat,
                        jenis_kelamin,
                        telp,
                        blog,
                        id_bidang,
                        username,
                        password,
                        email,
                        id_jabatan,
                        jab_struktural,
                        jab_pangkat,
                        jab_golongan
                    )
                    VALUES
                        (
                            $nip,
                            $nidn,
                            $nama_awal,
                            $nama_akhir,
                            $kode_dosen,
                            $alamat,
                            $jenis_kelamin,
                            $telp,
                            $blog,
                            $id_bidang,
                            $username,
                            '$password',
                            $email,
                            $jab_fungsional,
                            $jab_struktural,
                            $jab_pangkat,
                            $jab_golongan
                        )";
        $sql = $this->db->query($query);
        $query_role = "INSERT INTO roles (nip, user_role_id) VALUES ($nip, 2) ";
        $sql_role = $this->db->query($query_role);
    }

    public function simpanLab($post)
    {
        $nama_laboratorium  = $this->db->escape($_POST['nama_laboratorium']);
        $nama_kordas        = $this->db->escape($_POST['nama_kordas']);
        $username           = $this->db->escape($_POST['username']);
        $password           = MD5($_POST["password"]);
        $query = "INSERT INTO laboratorium (
                        nama_laboratorium,
                        nama_kordas,
                        username,
                        password
                    )
                    VALUES
                        (
                            $nama_laboratorium,
                            $nama_kordas,
                            $username,
                            '$password'
                        )";
        $sql = $this->db->query($query);
        $insert_id = $this->db->insert_id();
        $query_role = "INSERT INTO roles (id_laboratorium, user_role_id) VALUES ($insert_id, 8) ";
        $sql_role = $this->db->query($query_role);
    }

    function updateDosen($post, $nip)
    {
        $nip            = $this->db->escape($_POST['nip']);
        $nidn           = $this->db->escape($_POST['nidn']);
        $nama_awal      = $this->db->escape($_POST['nama_awal']);
        $nama_akhir     = $this->db->escape($_POST['nama_akhir']);
        $kode_dosen     = $this->db->escape($_POST['kode_dosen']);
        $alamat         = $this->db->escape($_POST['alamat']);
        $jenis_kelamin  = $this->db->escape($_POST['jenis_kelamin']);
        $telp           = $this->db->escape($_POST['telp']);
        $blog           = $this->db->escape($_POST['blog']);
        $id_bidang      = $this->db->escape($_POST['id_bidang']);
        $username       = $this->db->escape($_POST['username']);
        $email          = $this->db->escape($_POST['email']);
        $jab_fungsional = $this->db->escape($_POST['jab_fungsional']);
        $jab_struktural = $this->db->escape($_POST['jab_struktural']);
        $jab_pangkat    = $this->db->escape($_POST['jab_pangkat']);
        $jab_golongan   = $this->db->escape($_POST['jab_golongan']);
        $query = "UPDATE dosen SET
                        nip = $nip,
                        nidn = $nidn,
                        nama_awal = $nama_awal,
                        nama_akhir = $nama_akhir,
                        kode_dosen = $kode_dosen,
                        alamat = $alamat,
                        jenis_kelamin = $jenis_kelamin,
                        telp = $telp,
                        blog = $blog,
                        id_bidang = $id_bidang,
                        username = $username,
                        email = $email,
                        id_jabatan = $jab_fungsional,
                        jab_struktural = $jab_struktural,
                        jab_pangkat = $jab_pangkat,
                        jab_golongan =$jab_golongan
                    WHERE nip = $nip
                   ";
        // var_dump($query);exit;
        $sql = $this->db->query($query);

        if ($sql)
            return true;
        return false;
    }

    function updateKuotaDosen($post, $nip)
    {
        $nip            = $this->db->escape($_POST['nip']);
        $kuota           = $this->db->escape($_POST['kuota']);
        $query = "UPDATE dosen SET
                        nip = $nip,
                        kuota = $kuota
                    WHERE nip = $nip
                   ";
        // var_dump($query);exit;
        $sql = $this->db->query($query);

        if ($sql)
            return true;
        return false;
    }

    function insert($data)
    {
        $this->db->insert_batch('mahasiswa', $data);
    }

    function load_status()
    {
        $sql = $this->db->query("SELECT * FROM status WHERE class = 1 ");
        return $sql->result_array();
    }

    function updateMhs($post)
    {
        if ($this->session->userdata('user_role') == 3) {
            $nim = $this->session->userdata('nim');
        } else {
            $nim = $this->db->escape($_POST['nim']);
        }
        $nama_awal     = $this->db->escape($_POST['nama_awal_mhs']);
        $nama_akhir     = $this->db->escape($_POST['nama_akhir_mhs']);

        $jenis_kelamin  = $this->db->escape($_POST['jenis_kelamin_mhs']);
        $kelas          = $this->db->escape($_POST['kelas']);
        $telp           = $this->db->escape($_POST['telp_mhs']);
        $angkatan       = $this->db->escape($_POST['angkatan']);
        $email          = $this->db->escape($_POST['email_mhs']);
        $username       = $this->db->escape($_POST['username_mhs']);
        $tak            = $this->db->escape($_POST['tak']);
        $id_status      = 60;
        $query = "UPDATE mahasiswa SET
                        nim = $nim,
                        nama_awal = $nama_awal,
                        nama_akhir = $nama_akhir,
                        jenis_kelamin = $jenis_kelamin,
                        kelas = $kelas,
                        telp = $telp,
                        angkatan = $angkatan,
                        email = $email,
                        username = $username,
                        tak = $tak,
                        id_status = $id_status
                    WHERE nim = $nim
                   ";
        // var_dump($query);exit;
        $sql = $this->db->query($query);

        if ($sql)
            return true;
        return false;
    }

    function simpanMhs($post)
    {
        $nim            = $this->db->escape($_POST['nim']);
        $nama_awal      = $this->db->escape($_POST['nama_awal']);
        $nama_akhir     = $this->db->escape($_POST['nama_akhir']);
        $jenis_kelamin  = $this->db->escape($_POST['jenis_kelamin']);
        $kelas          = $this->db->escape($_POST['kelas']);
        $telp           = $this->db->escape($_POST['telp']);
        $angkatan       = $this->db->escape($_POST['angkatan']);
        $email          = $this->db->escape($_POST['email']);
        $username       = $this->db->escape($_POST['username']);
        $password       = md5($_POST['password']);
        $tak            = $this->db->escape($_POST['tak']);
        $id_status      = 60;
        $query = "INSERT INTO mahasiswa (
                        nim,
                        nama_awal,
                        nama_akhir,
                        jenis_kelamin,
                        kelas,
                        telp,
                        angkatan,
                        email,
                        username,
                        password,
                        tak,
                        id_status
                    )
                    VALUES
                        (
                            $nim,
                            $nama_awal,
                            $nama_akhir,
                            $jenis_kelamin,
                            $kelas,
                            $telp,
                            $angkatan,
                            $email,
                            $username,
                            '$password',
                            $tak,
                            $id_status
                        )
                   ";
        $sql = $this->db->query($query);

        $query2 = "INSERT INTO roles (nim, user_role_id) VALUES ($nim, 3) ";
        $sql2 = $this->db->query($query2);

        if ($sql && $sql2)
            return true;
        return false;
    }

    function updateLab($post)
    {
        $id_laboratorium    = $this->session->userdata('id_laboratorium');
        $nama_laboratorium  = $this->db->escape($_POST['nama_laboratorium']);
        $nama_kordas        = $this->db->escape($_POST['nama_kordas']);
        $username           = $this->db->escape($_POST['username']);
        $query = "UPDATE laboratorium SET
                        nama_laboratorium = $nama_laboratorium,
                        nama_kordas = $nama_kordas,
                        username = $username
                    WHERE id_laboratorium = $id_laboratorium
                   ";
        // var_dump($query);exit;
        $sql = $this->db->query($query);

        if ($sql)
            return true;
        return false;
    }

    function loadUserRole()
    {
        $query  = "SELECT * FROM user_role";
        $sql    = $this->db_query($query);

        return $sql->result_array();
    }

    public function loadRuangan()
    {
        $query = "SELECT
                        *
                    FROM
                        ruangan_seminar";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function loadRuanganSelect($id_slot)
    {
        $query = "SELECT
                        *
                    FROM
                        ruangan_seminar
                    WHERE id_slot = $id_slot ";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }

    public function simpanRuangan($post)
    {
        $ruangan         = $post['ruangan'];
        $jam_mulai         = $post['jam_mulai'];
        $jam_selesai     = $post['jam_selesai'];

        $query             = "INSERT INTO ruangan_seminar (
									ruangan,
									jam_mulai,
									jam_selesai
								)
								VALUES
									(
										'$ruangan',
										'$jam_mulai',
										'$jam_selesai'
									)";
        $this->db->query($query);
    }

    public function updateRuangan($post)
    {
        $id_slot         = $post['id_slot'];
        $ruangan         = $post['ruangan'];
        $jam_mulai         = $post['jam_mulai'];
        $jam_selesai     = $post['jam_selesai'];

        $query             = " UPDATE 
                                    ruangan_seminar
                                SET 
                                    ruangan     = '$ruangan',
                                    jam_mulai   = '$jam_mulai',
                                    jam_selesai = '$jam_selesai' 
                                WHERE
                                    id_slot = '$id_slot' ";
        $this->db->query($query);
    }

    function dataPenjadwalan()
    {
        $sql = "SELECT * FROM baru_test ";
        $query = $this->db->query($sql);

        return $query->result_array();
    }
}
