<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_pkip extends CI_Model
{
	public function index(){
        $this->load->model("model_data");
        $data['list_judul'] = $this->m_pkip->load_judul();

        $this->load->view("pkip/v_datajudul",$data);
    }

    public function load_judul(){
        $query = "SELECT * FROM t_judul";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function load_dosen(){
        $query = "SELECT
                        d.*, b.nama_bidang AS bidang
                    FROM
                        dosen d
                    JOIN bidang b ON b.id_bidang = d.id_bidang
                    JOIN roles r ON r.nip = d.nip
                    WHERE r.user_role_id=2
                    ";
            $sql = $this->db->query($query);
            return $sql->result_array();
    }

    public function load_topik(){
            $query = "SELECT a.*,d.*, 
                    s.nama_bidang as bidang
                    FROM t_topik a
                    JOIN bidang s ON a.id_bidang = s.id_bidang
                    JOIN dosen d ON d.nip = a.nip
                    WHERE kuotatopik != 0";
           $sql = $this->db->query($query);
            return $sql->result_array();
    }
    
    function countTopik()
        {
            $query = "SELECT
                        dosen.kode_dosen as kode_dosen,
                        COUNT(t_topik.idta) as jmlTopik
                    FROM
                        dosen
                    LEFT JOIN t_topik ON dosen.nip = t_topik.nip
                    WHERE dosen.kode_dosen is not NULL
                    GROUP BY dosen.nip";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

    public function load_judulproposalta(){
        $nip = $this->session->userdata("nip");
            $query  = "SELECT
                        a.*, d.*,
                        tt.kode_dosen AS kode1,
                        ty.kode_dosen AS kode2,                          
                        s. status AS status
                    FROM
                        t_judul a
                    LEFT JOIN status s ON a.id_status = s.id_status
                    JOIN mahasiswa d ON d.nim = a.nim
                    LEFT JOIN dosen tt ON tt.nip = a.pbb1
                    LEFT JOIN dosen ty ON ty.nip = a.pbb2 /*Harus di or keknya */
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

    // public function load_prosesjudul(){
    // $query  = "SELECT
    //                     a.*, d.*, s. status AS status,
    //                     tt.kode_dosen AS kode1,
    //                     ty.kode_dosen AS kode2,
    //                     x.kode_dosen AS nip,
    //                     sa.topik AS topik

    //                 FROM
    //                     t_judul a
    //                 JOIN status s ON a.id_status = s.id_status
    //                 JOIN t_topik sa ON sa.idta = a.idta
    //                 JOIN mahasiswa d ON d.nim = a.nim
    //                 LEFT JOIN dosen tt ON tt.nip = a.pbb1
    //                 JOIN dosen ty ON ty.nip = a.pbb2 /*Harus di or keknya */
    //                 JOIN dosen x ON x.nip = a.nip
    //                 ";
    //         $sql    = $this->db->query($query);
    //         return $sql->result_array();
    //     }
    
    public function load_prosesjudul(){
    $query  = "SELECT
                        a.*, d.*, sa.*, s. status AS status,
                        tt.kode_dosen AS kode1,
                        ty.kode_dosen AS kode2,
                        x.kode_dosen AS nip
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN t_topik sa ON sa.idta = a.idta
                    JOIN mahasiswa d ON d.nim = a.nim
                    LEFT JOIN dosen tt ON tt.nip = a.pbb1
                    JOIN dosen ty ON ty.nip = a.pbb2 /*Harus di or keknya */
                    JOIN dosen x ON x.nip = a.nip
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

//====================================================================================================================================//

    // public function load_judulsiapseminar(){
            

    //         $arr_judul_seminar = [];
    //         // Get all `idta`
    //         $this->db->select("idta");
    //         $this->db->group_by("idta");
    //         $arr_idta = $this->db->get("t_judul")->result_array();

    //         foreach ($arr_idta as $item) {
    //             $this->db->select("nama_awal, nama_akhir, nim, nip, pbb1, pbb2, id_status");
    //             $this->db->where("idta", $item["idta"]);
    //             array_push($arr_judul_seminar, $this->db->get("t_judul")->result_array());

    //             $this->db->select("nama_awal, nama_akhir, nim");
    //             $this->db->where("idta", $arr_idta[2]["idta"]);
    //             $dummy = $this->db->get("t_judul")->result();
    //         }
    //         // echo "<pre>";
    //         // print_r($arr_judul_seminar);
    //         // echo "</pre>";
    //         // exit();
    //         return $arr_judul_seminar;
    //     }

        public function load_judulsiapseminar(){
            $query  = "SELECT
                        a.*, d.*, s. status AS status,
                        tt.kode_dosen AS pbb1,
                        ty.kode_dosen AS pbb2,
                        x.kode_dosen AS nip,
                        sa.topik AS topik
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN t_topik sa ON sa.idta = a.idta
                    JOIN mahasiswa d ON d.nim = a.nim
                    LEFT JOIN dosen tt ON tt.nip = a.pbb1
                    JOIN dosen ty ON ty.nip = a.pbb2 /*Harus di or keknya */
                    JOIN dosen x ON x.nip = a.nip
                    WHERE
                        a.id_status = 9 AND a.idta IS NOT NULL
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }


//====================================================================================================================================//

        public function load_judulfilter(){
            $query  = "SELECT
                        a.*, d.*, s. status AS status,
                        tt.kode_dosen AS kode1,
                        ty.kode_dosen AS kode2,
                        x.kode_dosen AS nip,
                        sa.topik AS topik
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN t_topik sa ON sa.idta = a.idta
                    JOIN mahasiswa d ON d.nim = a.nim
                    LEFT JOIN dosen tt ON tt.nip = a.pbb1
                    JOIN dosen ty ON ty.nip = a.pbb2 /*Harus di or keknya */
                    JOIN dosen x ON x.nip = a.nip 
                    ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        public function load_topikfilter(){
            $query = "SELECT a.*,d.*, 
                    s.nama_bidang as bidang
                    FROM t_topik a
                    JOIN bidang s ON a.id_bidang = s.id_bidang
                    JOIN dosen d ON d.nip = a.nip
                    WHERE kuotatopik != 0";
           $sql = $this->db->query($query);
            return $sql->result_array();
    }

        public function load_topikseminar($idta){
            $query ="SELECT a.*,d.*,c.*,m.*, 
                    s.nama_bidang as bidang
                    FROM t_topik a
                    JOIN bidang s ON a.id_bidang = s.id_bidang
                    JOIN dosen d ON d.nip = a.nip
                    JOIN t_judul c ON c.idta = a.idta
                    JOIN mahasiswa m ON m.nim = c.nim
                    WHERE a.idta = '$idta'
                    ";
           $sql = $this->db->query($query);
            return $sql->result_array();
    }

    // public function selectjudulta($idta){
    //         $sql_detail = $this->db->query("SELECT a.*,d.*,
    //                 s.*
    //                 FROM t_judul a
    //                 JOIN mahasiswa s ON a.nim = s.nim
    //                 JOIN dosen d ON d.nip = a.nip
    //                 WHERE a.id_judul = ".intval($id_judul));
    //         if($sql_detail->num_rows() > 0)
    //             return $sql_detail->row_array();
    //         return false;
    // }

    public function selectjudul($idta){
            $sql_detail = $this->db->query("SELECT a.*,d.*,
                    j.*
                    FROM t_topik a
                    JOIN t_judul j ON j.idta = a.idta
                    JOIN dosen d ON d.nip = a.nip
                    WHERE a.idta = ".intval($idta));
            if($sql_detail->num_rows() > 0)
                return $sql_detail->row_array();
            return false;
    }

    // public function selectjadwal($idta){
    // $query ="SELECT
    //         rs.ruangan as hole,
    //         ds.kode_dosen as pmbb1,
    //         ds2.kode_dosen as pmbb2
    //     FROM
    //         t_topik tt
    //     JOIN t_judul tj ON tt.idta = tj.idta
    //     JOIN mahasiswa m ON tj.nim = m.nim
    //     JOIN t_jadwal tjd ON tjd.idta = tt.idta
    //     JOIN ruangan_seminar rs ON rs.id_slot = tjd.ruangan
    //     JOIN dosen ds ON ds.nip = tj.pbb1
    //     JOIN dosen ds2 ON ds2.nip = tj.pbb2
    //     WHERE tj.id_status = 54
    //     ";
    //     $sql = $this->db->query($query);
    //     var_dump($query);
    //     return $sql->result_array();
    // }


            
    
    function getmahasiswa($idta){
            $query = "SELECT
                        a.*,d.*,s.*
                    FROM
                        t_judul a
                    JOIN t_topik d ON d.idta = a.idta
                    JOIN mahasiswa s ON s.nim = a.nim
                    WHERE a.idta = '$idta'
                    ";
            $sql = $this->db->query($query);
            // var_dump($idta);
            return $sql->result_array();
    }

    public function load_pbb1(){
            $query = "SELECT * FROM dosen WHERE pembimbing =1";
            $sql = $this->db->query($query);
            return $sql->result_array();
    }

    public function load_pbb2(){
            $query = "SELECT * FROM dosen WHERE pembimbing =2";
            $sql = $this->db->query($query);
            return $sql->result_array();
    }

    public function get_default($id_judul){
        $sql = $this->db->query("SELECT * FROM t_judul WHERE id_judul = ".intval($id_judul));
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function get_default_ta($idta){
        $sql = $this->db->query("SELECT * FROM t_jadwal WHERE idta = ".intval($idta));
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }
    // public function lulusseminar($post, $id_judul){
    //     $sql  = $this->db->query("UPDATE t_judul, mahasiswa SET t_judul.id_status = 51, mahasiswa.id_status =51, WHERE mahasiswa.nim = t_judul.nim AND t_judul.id_judul = ".intval($id_judul));
    //     if($sql->num_rows() > 0)
    //         return $sql->row_array();
    //     return true;
    // }

        public function lulusseminar($idta){
        $sql  = $this->db->query("UPDATE t_judul, mahasiswa SET t_judul.id_status = 51, mahasiswa.id_status =51, WHERE mahasiswa.nim = t_judul.nim AND t_judul.idta = ".intval($idta));
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return true;
    }

    public function load_jadwal(){
            $query  = "SELECT
                        tj.*, tt.*, rs.*, top.*,
                        -- tj.pbb1 as pbb1,
                        -- tj.pbb2 as pbb2,
                        -- tt.pgj1 as pgj1,
                        -- tt.pgj2 as pgj2
                        d1.kode_dosen as pbb1,
                        d2.kode_dosen as pbb2,
                        p1.kode_dosen as pgj1,
                        p2.kode_dosen as pgj2
                    FROM
                        t_judul tj 
                    INNER JOIN t_jadwal tt ON tj.idta = tt.idta
                    JOIN ruangan_seminar rs ON tt.ruangan = rs.id_slot
                    JOIN t_topik top ON top.idta = tj.idta
                    JOIN dosen d1 ON d1.nip = tj.pbb1
                    JOIN dosen d2 ON d2.nip = tj.pbb2
                    JOIN dosen p1 ON p1.nip = tt.pgj1
                    JOIN dosen p2 ON p2.nip = tt.pgj2
                    WHERE tj.id_status =54";

            $sql    = $this->db->query($query);
            return $sql->result_array();
    }

    public function load_kelulusan(){
        // $nip = $this->session->userdata("nip");
            $query  = "SELECT
                        tj.*, tt.*, rs.*, top.*,
                        -- tj.pbb1 as pbb1,
                        -- tj.pbb2 as pbb2,
                        -- tt.pgj1 as pgj1,
                        -- tt.pgj2 as pgj2
                        d1.kode_dosen as pbb1,
                        d2.kode_dosen as pbb2,
                        p1.kode_dosen as pgj1,
                        p2.kode_dosen as pgj2
                    FROM
                        t_judul tj 
                    INNER JOIN t_jadwal tt ON tj.idta = tt.idta
                    JOIN ruangan_seminar rs ON tt.ruangan = rs.id_slot
                    JOIN t_topik top ON top.idta = tj.idta
                    JOIN dosen d1 ON d1.nip = tj.pbb1
                    JOIN dosen d2 ON d2.nip = tj.pbb2
                    JOIN dosen p1 ON p1.nip = tt.pgj1
                    JOIN dosen p2 ON p2.nip = tt.pgj2
                    WHERE tj.id_status = 54;
                    ";

            $sql    = $this->db->query($query);
            return $sql->result_array();
    }

    public function simpanjadwal($post,$idta){
        $idta          = $this->db->escape($post['idta']);
        // $id_judul          = $this->db->escape($post['id_judul']);
        $id_status          = $this->db->escape($post['id_status']);
        // $judul          = $this->db->escape($post['judul']);
        // $topik               = $this->db->escape($post['topik']);
        // $nim               = $this->db->escape($post['nim']);
        // $nama_awal               = $this->db->escape($post['nama_awal']);
        // $nama_akhir               = $this->db->escape($post['nama_akhir']);
        // $pbb1               = $this->db->escape($post['pbb1']);
        // $pbb2               = $this->db->escape($post['pbb2']);
        $pgj1               = $this->db->escape($post['pgj1']);
        $pgj2           = $this->db->escape($post['pgj2']);
        $tanggal           = $this->db->escape($post['tanggal']);
        $ruangan               = $this->db->escape($post['ruangan']);

        $sql = $this->db->query("INSERT INTO t_jadwal (
                    idta,
                    id_status,
                    
                    pgj1,
                    pgj2,
                    tanggal,
                    ruangan
                )
                VALUES
                    (
                    $idta,
                    $id_status,
                    
                    $pgj1,
                    $pgj2,
                    $tanggal,
                    $ruangan
                                        )");
        $sql2  = $this->db->query("UPDATE mahasiswa, t_judul SET mahasiswa.id_status = 54 WHERE t_judul.nim = mahasiswa.nim AND t_judul.idta = $idta");
        $sql3  = $this->db->query("UPDATE t_judul,mahasiswa SET t_judul.id_status = 54 WHERE t_judul.nim = mahasiswa.nim AND t_judul.idta = $idta");
        // var_dump($sql2,$sql3);exit;
        return TRUE;
        }

        public function load_seminarulang($id_judul)
        {   
            $sql2 = $this->db->query("UPDATE mahasiswa,t_judul SET mahasiswa.id_status = 52, t_judul.id_status = 52 WHERE mahasiswa.nim = t_judul.nim AND t_judul.id_judul = $id_judul");
            $sql1 = $this->db->query("DELETE from t_jadwal WHERE id_jadwal = $id_jadwal");
            return TRUE;
        }


        public function getRuanganSeminar()
        {
            $query = "SELECT
                        *
                    FROM
                        ruangan_seminar";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        public function validasiRuangan($waktuujian)
        {
            $query = "SELECT
                        *
                    FROM
                        ruangan_seminar rs
                    JOIN t_jadwal js ON js.ruangan = rs.id_slot
                    WHERE js.tanggal = '$waktuujian' ";
            $sql  = $this->db->query($query);
            $dataJadwal = $sql->result_array();
            $list_ruangan = $id_slot =  [];
            if (!empty($dataJadwal)) {
                foreach ($dataJadwal as $key => $value) {
                    $id_slot[] = $value['id_slot'];
                }
                $list_id = implode(',', $id_slot);
                $query_ruangan = "SELECT
                            *
                        FROM
                            ruangan_seminar WHERE id_slot NOT IN($list_id)";
                $sql_ruangan = $this->db->query($query_ruangan);
                $data_ruangan = $sql_ruangan->result_array();
            } else {
                $query_ruangan = "SELECT
                            *
                        FROM
                            ruangan_seminar";
                $sql_ruangan = $this->db->query($query_ruangan);
                $data_ruangan = $sql_ruangan->result_array();
            }
           
            return $data_ruangan;
        }




}