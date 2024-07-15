<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_mahasiswa extends CI_Model
{
    public function index()
    {
        $this->load->model("model_data");
        $data['list_topik'] = $this->m_mahasiswa->load_topik();
        $data['list_judul'] = $this->m_mahasiswa->load_mahasiswaSessionBerjalan();
        $this->load->view("mahasiswa/v_datajudulmahasiswa", $data);
    }

    // Load Data Untuk Statusta bagian judul & status
    public function load_mahasiswaSessionBerjalan()
    {
        $nim = $this->session->userdata("nim");
        $query  = "SELECT a.*, d.*, 
                       tt.kode_dosen AS kode1,
                       ty.kode_dosen AS kode2, 
                       s.status as status 
                       FROM t_judul a 
                       JOIN status s ON a.id_status = s.id_status 
                       JOIN mahasiswa d ON a.nim = d.nim 
                       LEFT JOIN dosen tt ON tt.nip = a.pbb1
                       LEFT JOIN dosen ty ON ty.nip = a.pbb2 /*Harus di or keknya */
                    /*JOIN dosen f ON a.pbb1 = f.nip OR a.pbb2 = f.nip*/
                    WHERE a.nim = '$nim'
                    ";
        $sql    = $this->db->query($query);
        return $sql->result_array();
    }

    public function load_mahasiswaSessionBerjalanXXX()
    {
        $nim = $this->session->userdata("nim");
        $query  = "SELECT
                        a.*, d.*,
                        s.status as status
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN mahasiswa d ON a.nim = d.nim
                    WHERE a.nim = '$nim' 
                    ";
        $sql    = $this->db->query($query);
        return $sql->result_array();
        //var_dump($query);exit;
        $sql    = $this->db->query($query);
        return $sql->result_array();
    }


    // Load Data Bimbingan

    public function load_mahasiswaBimbinganBerjalan()
    {
        $nim = $this->session->userdata("nim");
        $query  = "SELECT
                        a.*, d.*,
                        s.status as status, sa.kode_dosen as dosen
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN dosen sa ON sa.nip = a.nip
                    JOIN mahasiswa d ON a.nim = d.nim
                    WHERE a.nim = '$nim' 
                    ";
        $sql    = $this->db->query($query);
        return $sql->result_array();
    }


    // Load Data Untuk Statusta bagian judul
    public function load_judul()
    {
        $nim = $this->session->userdata("nim");
        $query = "SELECT d.*, b.status as status 
                    FROM t_judul d
                    JOIN status b ON b.id_status = d.id_status";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function load_profile()
    {
        // $nim = $this->session->userdata("nim");
        // $query = "SELECT * FROM mahasiswa WHERE nim=$nim";
        //  $sql = $this->db->query($query);
        //  return $sql->result_array();
        $nim = $this->session->userdata("nim");
        $query  = "SELECT
                        a.*, d.*, s.*,
                        sa.kode_dosen as dosen
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN dosen sa ON sa.nip = a.nip
                    JOIN mahasiswa d ON a.nim = d.nim
                    WHERE a.nim = '$nim' 
                    ";
        $sql    = $this->db->query($query);
        return $sql->result_array();
    }

    public function load_profileY()
    {
        $nim = $this->session->userdata("nim");
        $query = "SELECT d.*, b.status as status 
                    FROM mahasiswa d
                    JOIN status b ON b.id_status = d.id_status";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }


    //Load Data untuk combobox bidang
    public function load_bidang()
    {
        $query = "SELECT * FROM bidang";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function load_jadwal()
    {
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

    public function load_pbb1()
    {
        $query = "SELECT * FROM dosen WHERE pembimbing =1 AND kuota !=0";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function load_pbb2()
    {
        $query = "SELECT * FROM dosen";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    // public function load_pbb2(){
    //         $query = "SELECT * FROM dosen WHERE pembimbing =2";
    //         $sql = $this->db->query($query);
    //         return $sql->result_array();
    // }

    public function load_dosen()
    {
        $query = "SELECT * FROM dosen";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    //Load Detail Topik TA
    public function selectTopik($idta)
    {
        $sql_detail = $this->db->query("SELECT a.*,d.*, 
                    tt.kode_dosen AS kode1,
                    ty.kode_dosen AS kode2, 
                    s.nama_bidang as nama_bidang
                    FROM t_topik a
                    JOIN bidang s ON a.id_bidang = s.id_bidang
                    JOIN dosen d ON d.nip = a.nip
                    LEFT JOIN dosen tt ON tt.nip = a.pbb1
                    LEFT JOIN dosen ty ON ty.nip = a.pbb2
                    WHERE a.idta = " . intval($idta));
        if ($sql_detail->num_rows() > 0)
            return $sql_detail->row_array();
        return false;
    }

    public function selectjudul($id_judul)
    {
        $sql_detail = $this->db->query("SELECT a.*,d.*,
                    s.*,f.nama_bidang as nama_bidang
                    FROM t_judul a
                    JOIN bidang f ON a.id_bidang = f.id_bidang
                    JOIN mahasiswa s ON a.nim = s.nim
                    JOIN dosen d ON d.nip = a.nip
                    WHERE a.id_judul = " . intval($id_judul));
        if ($sql_detail->num_rows() > 0)
            return $sql_detail->row_array();
        return false;
    }

    public function load_topik()
    {
        $nim = ($this->session->userdata('id_status') == 6);
        $query = "SELECT a.*,d.*, 
                    s.nama_bidang as bidang
                    FROM t_topik a
                    JOIN bidang s ON a.id_bidang = s.id_bidang
                   JOIN dosen d ON d.nip = a.nip
                   WHERE kuotatopik != 0";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function AjukanTopik($post)
    {
        $idta               = $this->db->escape($post['idta']);
        $id_bidang          = $this->db->escape($post['id_bidang']);
        $id_status          = $this->db->escape($post['id_status']);
        $nip                = $this->db->escape($post['nip']);
        $pbb1               = $this->db->escape($post['pbb1']);
        $pbb2               = $this->db->escape($post['pbb2']);

        $query_add = "INSERT INTO t_judul (
                    idta,
                    id_bidang,
                    id_status,
                    nip,
                    pbb1,
                    pbb2
                )
                VALUES
                    (
                        $idta,
                        $id_bidang,
                        $id_status,
                        $nip,
                        $pbb1,
                        $pbb2
                    )";
        $sql_add = $this->db->query($query_add);
        if ($sql_add)
            return true;
        return false;
    }

    public function inputbimbingan($post, $idta)
    {
        $idta             = $this->db->escape($post['idta']);
        $nim              = $this->db->escape($post['nim']);
        $tanggal          = $this->db->escape($post['tanggal']);
        $catatan          = $this->db->escape($post['catatan']);
        $nip              = $this->db->escape($post['nip']);

        $query_add = "INSERT INTO bimbingan (
                    idta,
                    nim,
                    tanggal,
                    catatan,
                    nip
                )
                VALUES
                    (
                    $idta,
                    $nim,
                    $tanggal,
                    $catatan,
                    $nip
                    )";
        $sql_add = $this->db->query($query_add);
        if ($sql_add)
            return true;
        return false;
    }


    public function get_default($idta)
    {
        $sql = $this->db->query("SELECT * FROM t_topik WHERE idta = " . intval($idta));
        if ($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function get_defaultt($id_judul)
    {
        $sql = $this->db->query("SELECT * FROM t_judul WHERE id_judul = " . intval($id_judul));
        if ($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function inputjudulta($post)
    {
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $judul = $this->db->escape($post['judul']);
        $pbb1 = $this->db->escape($post['pbb1']);
        $pbb2 = $this->db->escape($post['pbb2']);
        //$query = "UPDATE t_judul SET id_status = 8, pbb1 = $pbb1, pbb2 = $pbb2, judul = $judul WHERE idta = ".intval($idta);
        // $sql   = $this->db->query($query);
    }


    public function updatejudul($post, $id_judul)
    {
        //UPDATE JUDUL AGAR ID STATUS DI TABEL MAHASISWA DAN JUDUL BERUBAH MENJADI 8 SERTA MENGISI FIELD PADA TABEL t_judul.
        //UPDATE SQL AGAR KUOTA PBB1 & PBB2 -1.
        $judul = $this->db->escape($post['judul']);
        $pbb1 = $this->db->escape($post['pbb1']);
        $pbb2 = $this->db->escape($post['pbb2']);

        $sql  = $this->db->query("UPDATE t_judul, mahasiswa SET t_judul.id_status = 8, mahasiswa.id_status =8, t_judul.judul = $judul, t_judul.pbb1 = $pbb1, t_judul.pbb2 = $pbb2 WHERE mahasiswa.nim = t_judul.nim AND t_judul.id_judul = " . intval($id_judul));
        $sql2  = $this->db->query("UPDATE dosen, t_judul SET dosen.kuota = dosen.kuota -1 WHERE t_judul.pbb1 = dosen.nip AND t_judul.id_judul = " . intval($id_judul));
        $sql3  = $this->db->query("UPDATE dosen, t_judul SET dosen.kuota = dosen.kuota -1 WHERE t_judul.pbb2 = dosen.nip AND t_judul.id_judul = " . intval($id_judul));
        return true;
    }

    public function updatejudulXXX($post, $idta)
    {
        //UPDATE JUDUL AGAR ID STATUS DI TABEL MAHASISWA DAN JUDUL BERUBAH MENJADI 8 SERTA MENGISI FIELD PADA TABEL t_judul.
        //UPDATE SQL AGAR KUOTA PBB1 & PBB2 -1.
        $judul = $this->db->escape($post['judul']);
        $pbb1 = $this->db->escape($post['pbb1']);
        $pbb2 = $this->db->escape($post['pbb2']);

        $sql  = $this->db->query("UPDATE t_judul, mahasiswa SET t_judul.id_status = 8, mahasiswa.id_status =8, t_judul.judul = $judul, t_judul.pbb1 = $pbb1, t_judul.pbb2 = $pbb2 WHERE mahasiswa.nim = t_judul.nim AND t_judul.idta = " . intval($idta));
        $sql2  = $this->db->query("UPDATE dosen, t_judul SET dosen.kuota = dosen.kuota -1 WHERE t_judul.pbb1 = dosen.nip AND t_judul.idta = " . intval($idta));
        $sql3  = $this->db->query("UPDATE dosen, t_judul SET dosen.kuota = dosen.kuota -1 WHERE t_judul.pbb2 = dosen.nip AND t_judul.idta = " . intval($idta));
        return true;
    }


    public function inputproposal($post, $id_judul)
    {

        $proposal = $this->db->escape($post['proposal']);
        $sql  = $this->db->query("UPDATE t_judul, mahasiswa SET t_judul.proposal = $proposal WHERE mahasiswa.nim = t_judul.nim AND t_judul.id_judul = " . intval($id_judul));
        return true;
    }


    public function simpan($post)
    {
        $idta               = $this->db->escape($post['idta']);
        $id_bidang          = $this->db->escape($post['id_bidang']);
        $id_status          = $this->db->escape($post['id_status']);
        $topik               = $this->db->escape($post['topik']);
        $nip               = $this->db->escape($post['nip']);
        $pbb1               = $this->db->escape($post['pbb1']);
        $pbb2               = $this->db->escape($post['pbb2']);
        $nim               = $this->db->escape($post['nim']);
        $nama_awal           = $this->db->escape($post['nama_awal']);
        $nama_akhir           = $this->db->escape($post['nama_akhir']);
        $email               = $this->db->escape($post['email']);

        $sql = $this->db->query("INSERT INTO t_judul (
                    idta,
                    id_bidang,
                    id_status,
                    topik,
                    nim,
                    nama_awal,
                    nama_akhir,
                    email,
                    nip,
                    pbb1,
                    pbb2
                )
                VALUES
                    (
                        $idta,
                        $id_bidang,
                        $id_status,
                        $topik,
                        $nim,
                        $nama_awal,
                        $nama_akhir,
                        $email,
                        $nip,
                        $pbb1,
                        $pbb2
                    )");
        $sql2  = $this->db->query("UPDATE t_topik SET kuotatopik = kuotatopik -1 WHERE idta = $idta");
        $sql3  = $this->db->query("UPDATE mahasiswa SET id_status = 6 WHERE nim = $nim");
        return true;
    }

    public function myjadwal()
    {
        return $this->db->get('baru_penjadwalan')->result_array();
    }

    public function ta_mahasiswabyNIM()
    {
        $nim = $this->session->userdata("nim");
        $query  = "SELECT
                        a.*, d.*,
                        s.status as status, sa.kode_dosen as dosen
                    FROM
                        t_judul a
                    JOIN status s ON a.id_status = s.id_status
                    JOIN dosen sa ON sa.nip = a.nip
                    JOIN mahasiswa d ON a.nim = d.nim
                    WHERE a.nim = '$nim' 
                    ";
        $sql    = $this->db->query($query);
        return $sql->result_array();
    }

    public function pilihTanggalSidang()
    {
        $nim = $this->session->userdata("nim");
        // $tanggal_dipilih = $this->input->post('tanggal_sidang',true);
        $id_dipilih = $this->input->post('id_pekansidang', true);

        $query = ' SELECT * FROM baru_pekansidang WHERE id_pekansidang = ' . $id_dipilih;

        $sql = $this->db->query($query)->result_array();

        $id_sidang = [];
        foreach ($sql as $sql) {
            $tanggal_dipilih = $sql['tanggal'];
        }

        print_r($sql);
        // $this->db->join('t_judul','t_judul.idta = t_topik.idta');
        // $this->db->set($data);
        // $this->db->where('t_judul.nim',$nim);
        // $this->db->update('t_topik');

        $sql3  = $this->db->query("UPDATE t_topik 
                                    JOIN t_judul 
                                    ON t_judul.idta = t_topik.idta 
                                    SET id_pekansidang = '$id_dipilih' WHERE t_judul.nim = $nim");

        $sql4  = $this->db->query("UPDATE t_topik 
                                    JOIN t_judul 
                                    ON t_judul.idta = t_topik.idta 
                                    SET tanggal_sidang = '$tanggal_dipilih' WHERE t_judul.nim = $nim");

        // $this->db->where('id_pekansidang', $id_pekansidang);
        // $query = $this->db->get('t_topik')->join('t_judul','t_judul.nip = t_topik.nip')->where('t_judul.nim',$nim)->result_array();
        return true;
    }
}
