<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class m_penelitian extends CI_Model
    {
        public function load_skemaPenelitian()
        {
            $query = "SELECT * FROM skema_penelitian";
            $sql_skema = $this->db->query($query);
            return $sql_skema->result_array();
        }

        function load_skemaPenelitianSelect($id_skema){
            $query = "SELECT * FROM skema_penelitian WHERE id_skema = ".intval($id_skema);
            $sql = $this->db->query($query);
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }

        function simpanSkema($post){
            $skema  = $this->db->escape($_POST['skema']);
            $link = $this->db->escape($_POST['link']);
            $query = "INSERT INTO skema_penelitian (
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

        function skemaHapus($id_skema){
            $this->db->query("DELETE FROM skema_penelitian WHERE id_skema = ".intval($id_skema));
        }

        public function load_penelitian(){
            $query = "SELECT
                        p.*, d.*,
                        s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_penelitianPropose(){
            $query = "SELECT
                        p.*, d.*,
                        s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE
                        p.id_status = 1";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_sessionPenelitianPropose(){
            $nip = $this->session->userdata("nip");
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.nip = '$nip' AND p.id_status = 1 ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_penelitianAccepted(){
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.id_status = 4 ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_sessionPenelitianAccepted(){
            $nip = $this->session->userdata("nip");
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.nip = '$nip' AND p.id_status = 4 ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_penelitianRejected(){
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.id_status = 5 ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_sessionPenelitianRejected(){
            $nip = $this->session->userdata("nip");
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.nip = '$nip' AND p.id_status = 5 ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_penelitianBerjalan(){
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.id_status =2 ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }
        public function load_penelitianSelesaiVer(){
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.id_status = 20 ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_sessionPenelitianBerjalan(){
            $nip = $this->session->userdata("nip");
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.nip = '$nip' AND p.id_status IN (2,20) ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_penelitianSelesai(){
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.id_status = 3 ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_sessionPenelitianSelesai(){
            $nip = $this->session->userdata("nip");
            $query = "SELECT
                        p.*, d.*, s.status AS status,
                        s.status_kk AS status_kk,
                        sp.skema AS skema
                    FROM
                        penelitian p
                    JOIN dosen d ON d.nip = p.nip
                    JOIN status s ON s.id_status = p.id_status
                    JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                    WHERE p.nip = '$nip' AND p.id_status = 3 ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_penelitianSelect($id_penelitian){
            $sql = $this->db->query("SELECT
                            p.*, d.*, s.status AS status,
                            s.status_kk AS status_kk,
                            sp.skema AS skema,
                            bd.nama_bidang AS bidang,
                            jb.jabatan AS jab_fungsional
                        FROM
                            penelitian p
                        JOIN dosen d ON d.nip = p.nip
                        JOIN status s ON s.id_status = p.id_status
                        JOIN bidang bd ON bd.id_bidang = d.id_bidang
                        JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
                        JOIN jabatan jb ON jb.id_jabatan = d.id_jabatan
                    WHERE p.id_penelitian = ".intval($id_penelitian));
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }

        public function simpanPengajuan($post){
            $judul_penelitian           = $this->db->escape($post['judul_penelitian']);
            $id_skema                   = $this->db->escape($post['id_skema']);
            $mitra_ketua                = $this->db->escape($post['mitra_ketua']);
            $mitra_institusi            = $this->db->escape($post['mitra_institusi']);
            $jadwal_awal                = $this->db->escape($post['jadwal_awal']);
            $jadwal_akhir               = $this->db->escape($post['jadwal_akhir']);
            $dana_internal              = $this->db->escape($post['dana_internal']);
            $dana_luar                  = $this->db->escape($post['dana_luar']);
            $bidang_unggulan            = $this->db->escape($post['bidang_unggulan']);
            $topik_unggulan             = $this->db->escape($post['topik_unggulan']);
            $thn_anggaran               = $this->db->escape($post['thn_anggaran']);
            $semester                   = $this->db->escape($post['semester']);
            $nip                        = $this->session->userdata("nip");
            $tgl_mengajukan             = date('Y-m-d');
            $status                     = 1;
            $config['upload_path']      = './assets/documents/penelitian/proposalAwal/';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = 25600000000;

            $this->load->library('upload', $config);
            
                if ( ! $this->upload->do_upload('proposalAwal')){
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('v_upload', $error);
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->view('v_uploadSuccess', $data);
                    $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                    $file_name   = $upload_data['file_name'];
                    $query_add = "INSERT INTO penelitian (
                                judul_penelitian,
                                id_skema,
                                mitra_ketua,
                                mitra_institusi,
                                dana_internal,
                                dana_luar,
                                id_status,
                                nip,
                                tgl_mengajukan,
                                proposalAwal,
                                thn_anggaran,
                                bidang_unggulan,
                                topik_unggulan,
                                semester
                            )
                            VALUES
                                (
                                    $judul_penelitian,
                                    $id_skema,
                                    $mitra_ketua,
                                    $mitra_institusi,
                                    $dana_internal,
                                    $dana_luar,
                                    $status,
                                    $nip,
                                    '$tgl_mengajukan',
                                    '$file_name',
                                    $thn_anggaran,
                                    $bidang_unggulan,
                                    $topik_unggulan,
                                    $semester
                                )";
                    $sql_add = $this->db->query($query_add);
                    
                    $anggota_peneliti    = $_POST['anggota_peneliti'];
                    $insert_id = $this->db->insert_id();
                    $data = [];
                    for ($i=0; $i < count($anggota_peneliti); $i++) { 
                        $data[] = [
                            'nip' => $anggota_peneliti[$i],
                            'id_penelitian' => $insert_id
                        ];
                    }
                    $query = $this->db->insert_batch('anggota_peneliti', $data);

                    $anggota_peneliti_mhs    = $_POST['anggota_peneliti_mhs'];
                    $data_mhs = [];
                    for ($i=0; $i < count($anggota_peneliti_mhs); $i++) { 
                        $data_mhs[] = [
                            'nim' => $anggota_peneliti_mhs[$i],
                            'id_penelitian' => $insert_id
                        ];
                    }
                    $query_mhs = $this->db->insert_batch('anggota_peneliti_mhs', $data_mhs);
                    
                    redirect("penelitian");
                }
        }

        function getAnggotaPeneliti($id_penelitian){
            $query = "SELECT
                        d.*,
                        ap.id_anggota AS id_anggota,
                        bd.nama_bidang AS nama_bidang
                    FROM
                        anggota_peneliti ap
                    JOIN penelitian p ON p.id_penelitian = ap.id_penelitian
                    JOIN dosen d ON d.nip = ap.nip
                    JOIN bidang bd ON bd.id_bidang = d.id_bidang
                    WHERE ap.id_penelitian = $id_penelitian
                    ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        function getAnggotaPenelitiMhs($id_penelitian){
            $query = "SELECT
                        mhs.*, ap.id_anggota_mhs
                    FROM
                        anggota_peneliti_mhs ap
                    JOIN penelitian p ON p.id_penelitian = ap.id_penelitian
                    JOIN mahasiswa mhs ON mhs.nim = ap.nim
                    WHERE ap.id_penelitian = $id_penelitian
                    ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function hapusPengajuan($id_penelitian)
        {
            $sql_delete = $this->db->query("DELETE from penelitian WHERE id_penelitian = ".intval($id_penelitian));
        }

        function countPenelitian()
        {
            $query = "SELECT
                        dosen.kode_dosen as kode_dosen,
                        COUNT(penelitian.id_penelitian) as jmlPenelitian
                    FROM
                        dosen
                    LEFT JOIN penelitian ON dosen.nip = penelitian.nip
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
                        penelitian p
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

