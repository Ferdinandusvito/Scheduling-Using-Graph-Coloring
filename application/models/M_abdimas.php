<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class m_abdimas extends CI_Model
    {
        // Load Data

        public function load_abdimas(){
            $query  = "SELECT
                        a.*, d.*,
                        s.status as status,
                        sa.skema as skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON a.nip = d.nip
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasSessionBerjalan(){
            $nip = $this->session->userdata("nip");
            $query  = "SELECT
                        a.*, d.*,
                        s.status as status,
                        sa.skema as skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON a.nip = d.nip
                    WHERE a.id_status IN (2,20)
                    AND a.nip = '$nip' 
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasSessionSelesai(){
            $nip = $this->session->userdata("nip");
            $query  = "SELECT
                        a.*, d.*,
                        s.status as status,
                        sa.skema as skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON a.nip = d.nip
                    WHERE a.id_status = 3
                    AND a.nip = '$nip' 
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasSessionPropose(){
            $nip = $this->session->userdata("nip");
            $query  = "SELECT
                        a.*, d.*,
                        s.status as status,
                        sa.skema as skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON a.nip = d.nip
                    WHERE a.id_status = 1
                    AND a.nip = '$nip' 
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasSessionAccepted(){
            $nip = $this->session->userdata("nip");
            $query  = "SELECT
                        a.*, d.*,
                        s.status as status,
                        sa.skema as skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON d.nip = a.nip
                    WHERE a.id_status = 4
                    AND a.nip = '$nip' 
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasSessionRejected(){
            $nip = $this->session->userdata("nip");
            $query  = "SELECT
                        a.*, d.*,
                        s.status as status,
                        sa.skema as skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON d.nip = a.nip
                    WHERE a.id_status = 5
                    AND a.nip = '$nip' 
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasPropose(){
            $query  = "SELECT
                        a.*, d.*, s. status AS status,
                        sa.skema AS skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON d.nip = a.nip
                    WHERE
                        a.id_status = 1
                    ORDER BY a.tgl_mengajukan DESC
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasBerjalan(){
            $query  = "SELECT
                        a.*, d.*, s. status AS status,
                        sa.skema AS skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON d.nip = a.nip
                    WHERE
                        a.id_status = 2
                    ORDER BY a.tgl_mengajukan DESC
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasSelesai(){
            $query  = "SELECT
                        a.*, d.*, s. status AS status,
                        sa.skema AS skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON d.nip = a.nip
                    WHERE
                        a.id_status = 3
                    ORDER BY a.tgl_mengajukan DESC
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasSelesaiVer(){
            $query  = "SELECT
                        a.*, d.*, s. status AS status,
                        sa.skema AS skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON d.nip = a.nip
                    WHERE
                        a.id_status = 20
                    ORDER BY a.tgl_mengajukan DESC
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasAccepted(){
            $query  = "SELECT
                        a.*, d.*, s. status AS status,
                        sa.skema AS skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON d.nip = a.nip
                    WHERE
                        a.id_status = 4
                    ORDER BY a.tgl_mengajukan DESC
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_abdimasRejected(){
            $query  = "SELECT
                        a.*, d.*, s. status AS status,
                        sa.skema AS skema
                    FROM
                        abdimas a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                    JOIN dosen d ON d.nip = a.nip
                    WHERE
                        a.id_status = 5
                    ORDER BY a.tgl_mengajukan DESC
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function selectDetail($id_abdimas){
            $sql_detail = $this->db->query("SELECT
                            a.*, d.*, 
                            s.status as status, 
                            s.status_kk as status_kk,
                            s.id_status as id_status,
                            sa.skema as skema,
                            bd.nama_bidang AS bidang,
                            jb.jabatan AS jab_fungsional
                        FROM
                            abdimas a
                        JOIN status s ON s.id_status = a.id_status
                        JOIN skema_abdimas sa ON sa.id_skema = a.id_skema
                        JOIN dosen d ON d.nip = a.nip
                        JOIN bidang bd ON bd.id_bidang = d.id_bidang
                        JOIN jabatan jb ON jb.id_jabatan = d.id_jabatan
                        WHERE a.id_abdimas = ".intval($id_abdimas));
            if($sql_detail->num_rows() > 0)
                return $sql_detail->row_array();
            return false;
        }

        public function load_skemaAbdimas(){
            $query  = "SELECT * FROM skema_abdimas";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_skemaAbdimasSelect($id_skema){
            $query  = "SELECT * FROM skema_abdimas WHERE id_skema = ".intval($id_skema);
            $sql    = $this->db->query($query);
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }

        public function simpan_pengajuan($post){
            $judul_abdimas      = $this->db->escape($post['judul_abdimas']);
            $mitra_instansi     = $this->db->escape($post['mitra_instansi']);
            $mitra_sasar        = $this->db->escape($post['mitra_sasar']);
            $id_skema           = $this->db->escape($post['id_skema']);
            $tgl_mulai          = $this->db->escape($post['tgl_mulai']);
            $tgl_selesai        = $this->db->escape($post['tgl_selesai']);
            $dana_internal      = $this->db->escape($post['dana_internal']);
            $dana_luar          = $this->db->escape($post['dana_luar']);
            $thn_anggaran       = $this->db->escape($post['thn_anggaran']);
            $tgl_mengajukan     = date('Y-m-d');
            $nip_session        = $this->session->userdata("nip");
            $status             = 1;
            
            $query_abdimas = "INSERT INTO abdimas (
                        judul_abdimas,
                        mitra_instansi,
                        mitra_sasar,
                        id_skema,
                        tgl_mulai,
                        tgl_selesai,
                        dana_internal,
                        dana_luar,
                        tgl_mengajukan,
                        id_status,
                        nip,
                        thn_anggaran
                    )
                    VALUES
                        (
                            $judul_abdimas,
                            $mitra_instansi,
                            $mitra_sasar,
                            $id_skema,
                            $tgl_mulai,
                            $tgl_selesai,
                            $dana_internal,
                            $dana_luar,
                            '$tgl_mengajukan',
                            $status,
                            $nip_session,
                            $thn_anggaran
                        )";
            $sql_abdimas = $this->db->query($query_abdimas);
            
            $anggota_abdimas    = $_POST['anggota_abdimas'];
            $insert_id = $this->db->insert_id();
            // var_dump($anggota_abdimas);exit;
            $data = [];
            for ($i=0; $i < count($anggota_abdimas); $i++) { 
                $data[] = [
                    'nip' => $anggota_abdimas[$i],
                    'id_abdimas' => $insert_id
                ];
            }

            $query = $this->db->insert_batch('anggota_abdimas', $data);
            
            if($sql_abdimas && $query)
                return true;
            return false;
        }

        public function hapusPengajuan($id_abdimas)
        {
            $sql_delete = $this->db->query("DELETE from abdimas WHERE id_abdimas = ".intval($id_abdimas));
        }

        function simpanDataMitra($id_abdimas){
            $mitra_instansi = $this->db->escape($_POST['mitra_instansi']);
            $mitra_sasar    = $this->db->escape($_POST['mitra_sasar']);
            $mitra_nama     = $this->db->escape($_POST['mitra_nama']);
            $mitra_jabatan  = $this->db->escape($_POST['mitra_jabatan']);
            $query = "UPDATE abdimas SET
                        mitra_instansi = $mitra_instansi,
                        mitra_sasar    = $mitra_sasar,
                        mitra_nama     = $mitra_nama,
                        mitra_jabatan  = $mitra_jabatan
                    WHERE id_abdimas = $id_abdimas 
                    ";
            $sql = $this->db->query($query);
            if($sql)
                return true;
            return false;
        }

        function skemaHapus($id_skema){
            $this->db->query("DELETE FROM skema_abdimas WHERE id_skema = ".intval($id_skema));
        }

        function simpanSkema($post){
            $skema  = $this->db->escape($_POST['skema']);
            $link = $this->db->escape($_POST['link']);
            $query = "INSERT INTO skema_abdimas (
                        skema,
                        link
                    )
                    VALUES
                        (
                            $skema,
                            $link
                        )";
            $sql = $this->db->query($query);
            
            if($sql)
                return true;
            return false;
        }

        function getAnggotaAbdimas($id_abdimas)
        {
            $query  = "SELECT
                        *
                    FROM
                        anggota_abdimas aa
                    JOIN dosen d ON d.nip = aa.nip
                    WHERE
                        id_abdimas = $id_abdimas ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        function countAbdimas()
        {
            $query = "SELECT
                        dosen.kode_dosen as kode_dosen,
                        COUNT(abdimas.id_abdimas) as jmlAbdimas
                    FROM
                        dosen
                    LEFT JOIN abdimas ON dosen.nip = abdimas.nip
                    WHERE dosen.kode_dosen is not NULL
                    GROUP BY dosen.nip";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        function cekValidasi($id_skema, $thn_anggaran)
        {
            $nip   = $this->session->userdata("nip");
            $query = "SELECT
                        COUNT(p.id_skema) AS countSkema
                    FROM
                        abdimas p
                    JOIN dosen d ON p.nip = d.nip
                    WHERE
                        p.nip = $nip
                    AND
                        p.id_skema = $id_skema
                    AND
                        p.thn_anggaran = $thn_anggaran ";
            $sql  = $this->db->query($query);
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }

        




    }
    
?>