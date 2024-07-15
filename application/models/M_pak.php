<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class m_pak extends CI_Model{

	public function load_kreditpak(){
        $query = "SELECT
                    ak.*,
                    kp.kategori AS kategori
                FROM
                    angka_kredit ak
                LEFT JOIN kategori_pak kp ON kp.id_kategori = ak.id_kategori";
		$sql = $this->db->query($query);
		return $sql->result_array();
    }
    
	function load_kreditpakAbdimas(){
        $query = "SELECT
                    ak.*,
                    kp.kategori AS kategori
                FROM
                    angka_kredit ak
                LEFT JOIN kategori_pak kp ON kp.id_kategori = ak.id_kategori
                WHERE ak.id_kategori = 3 ";
		$sql = $this->db->query($query);
		return $sql->result_array();
    }
	function load_kreditpakPenelitian(){
        $query = "SELECT
                    ak.*,
                    kp.kategori AS kategori
                FROM
                    angka_kredit ak
                LEFT JOIN kategori_pak kp ON kp.id_kategori = ak.id_kategori
                WHERE ak.id_kategori = 2 ";
		$sql = $this->db->query($query);
		return $sql->result_array();
    }

    function load_kreditKategori($id_kategori){
        $query = "SELECT id_pedoman_pak, kegiatan FROM angka_kredit WHERE id_kategori = $id_kategori ";
        $sql   = $this->db->query($query);
        return $sql->result_array();
    }

    public function load_kategori(){
        $query_kategori = "SELECT * FROM kategori_pak";
        $sql_kategori   = $this->db->query($query_kategori);
        return $sql_kategori->result_array();
    }

    public function load_kategoriSelect($id_kategori){
        $query = "SELECT * FROM kategori_pak WHERE id_kategori = ".intval($id_kategori);
        $sql   = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function simpan_kredit($post){
		$id_kategori  = $this->db->escape($post['id_kategori']);
		$kegiatan     = $this->db->escape($post['kegiatan']);
		$kode_pak     = $this->db->escape($post['kode_pak']);
		$angka_kredit = $this->db->escape($post['angka_kredit']);
        $query_add = "INSERT INTO angka_kredit (
                    id_kategori,
                    kegiatan,
                    kode_pak,
                    angka_kredit
                )
                VALUES
                    (
                        $id_kategori,
                        $kegiatan,
                        $kode_pak,
                        $angka_kredit
                    )";
		$sql_add = $this->db->query($query_add);
		if($sql_add)
			return true;
		return false;
    }

    

    function simpan_kegiatan($post){
        $nip = $this->session->userdata("nip");
        $id_pedoman_pak = $this->db->escape($_POST['id_pedoman_pak']);
        $nama_kegiatan  = $this->db->escape($_POST['nama_kegiatan']);
        $query =    "INSERT INTO pak (
                        nip,
                        id_pedoman_pak,
                        nama_kegiatan
                    ) 
                    VALUES (
                        $nip,
                        $id_pedoman_pak,
                        $nama_kegiatan
                    ) ";
        $sql = $this->db->query($query);
        if($sql)
			return true;
		return false;
    }

    function hapusDaftarKredit($id_pak){
        $sql_delete = $this->db->query("DELETE from pak WHERE id_pak = ".intval($id_pak));
    }

    public function get_data($id_pedoman_pak)
    {
		$sql_get = $this->db->query("SELECT
                        ak.*, kp.kategori as kategori, kp.id_kategori as id_kategori
                    FROM
                        angka_kredit ak
                    JOIN kategori_pak kp ON kp.id_kategori = ak.id_kategori
                    WHERE ak.id_pedoman_pak = ".intval($id_pedoman_pak));
		if($sql_get->num_rows() > 0)
			return $sql_get->row_array();
		return false;
    }

    public function hapusKredit($id_pedoman_pak)
    {
        $sql_delete = $this->db->query("DELETE from angka_kredit WHERE id_pedoman_pak = ".intval($id_pedoman_pak));
    }

    public function simpanKategori($post){
		$kategori  = $this->db->escape($post['kategori']);
        $query_add = "INSERT INTO kategori_pak (kategori) VALUES ($kategori)";
		$sql_add = $this->db->query($query_add);
		if($sql_add)
            return true;
		return false;
    }
    
    public function hapusKategori($id_kategori)
    {
        $sql_delete = $this->db->query("DELETE from kategori_pak WHERE id_kategori = ".intval($id_kategori));
    }
    
    public function ubahKategori($id_kategori){
        
    }

    function load_pakSession(){
        $nip = $this->session->userdata("nip");
        $sql = "SELECT
                    *
                FROM
                    pak p
                LEFT JOIN angka_kredit a ON p.id_pedoman_pak = a.id_pedoman_pak
                LEFT JOIN kategori_pak k ON k.id_kategori = a.id_kategori
                LEFT JOIN abdimas ab ON ab.id_abdimas = p.id_abdimas
                LEFT JOIN penelitian pl ON p.id_penelitian = pl.id_penelitian
                WHERE p.nip = '$nip' 
                ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function load_pakSessionPendidikan(){
        $nip = $this->session->userdata("nip");
        $sql = "SELECT
                    p.*,
                    k.kategori,
                    a.angka_kredit,
                    a.kegiatan,
                    a.kode_pak,
                    p.nama_kegiatan
                FROM
                    pak p
                LEFT JOIN angka_kredit a ON p.id_pedoman_pak = a.id_pedoman_pak
                LEFT JOIN kategori_pak k ON k.id_kategori = a.id_kategori
                WHERE
                    a.id_kategori = 1 
                AND p.nip = '$nip' 
                ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function load_pakSessionPenelitian(){
        $nip = $this->session->userdata("nip");
        $sql = "SELECT
                    p.*,
                    k.kategori,
                    a.angka_kredit,
                    a.kegiatan,
                    a.kode_pak,
                    pn.judul_penelitian
                FROM
                    pak p
                LEFT JOIN angka_kredit a ON p.id_pedoman_pak = a.id_pedoman_pak
                LEFT JOIN kategori_pak k ON k.id_kategori = a.id_kategori
                LEFT JOIN penelitian pn ON pn.id_penelitian = p.id_penelitian
                WHERE
                    a.id_kategori = 2 
                AND p.nip = '$nip' 
                ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function load_pakSessionAbdimas(){
        $nip = $this->session->userdata("nip");
        $sql = "SELECT
                    p.*,
                    k.kategori,
                    a.angka_kredit,
                    a.kegiatan,
                    a.kode_pak,
                    ab.judul_abdimas
                FROM
                    pak p
                LEFT JOIN angka_kredit a ON p.id_pedoman_pak = a.id_pedoman_pak
                LEFT JOIN kategori_pak k ON k.id_kategori = a.id_kategori
                LEFT JOIN abdimas ab ON ab.id_abdimas = p.id_abdimas
                WHERE
                    a.id_kategori = 3 
                AND p.nip = '$nip' 
                ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function load_pakSessionPenunjang(){
        $nip = $this->session->userdata("nip");
        $sql = "SELECT
                    p.*,
                    k.kategori,
                    a.angka_kredit,
                    a.kegiatan,
                    a.kode_pak
                FROM
                    pak p
                LEFT JOIN angka_kredit a ON p.id_pedoman_pak = a.id_pedoman_pak
                LEFT JOIN kategori_pak k ON k.id_kategori = a.id_kategori
                WHERE
                    a.id_kategori = 4 
                AND p.nip = '$nip' 
                ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function load_pakSelect($id_pak){
        $sql = "SELECT
                    *
                FROM
                    pak p
                LEFT JOIN angka_kredit a ON p.id_pedoman_pak = a.id_pedoman_pak
                LEFT JOIN kategori_pak k ON k.id_kategori = a.id_kategori
                LEFT JOIN abdimas ab ON ab.id_abdimas = p.id_abdimas
                WHERE p.id_pak = '$id_pak' 
                ";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
			return $query->row_array();
		return false;
    }

    function load_pakAbdimas(){
        $nip = $this->session->userdata("nip");
        $query = "SELECT
                    a.judul_abdimas as judul_abdimas,
                    kp.kategori as kategori,
                    ak.kegiatan as kegiatan,
                    ak.angka_kredit as angka_kredit
                FROM
                    abdimas a
                JOIN angka_kredit ak ON a.kode_pak = ak.id_pedoman_pak
                JOIN kategori_pak kp ON kp.id_kategori = ak.id_kategori
                WHERE a.nip = '$nip' 
                ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    function load_pakPenelitian(){
        $nip = $this->session->userdata("nip");
        $query = "SELECT
                    p.judul_penelitian as judul_penelitian,
                    kp.kategori as kategori,
                    ak.kegiatan as kegiatan,
                    ak.angka_kredit as angka_kredit
                FROM
                    penelitian p
                JOIN angka_kredit ak ON p.kode_pak = ak.id_pedoman_pak
                JOIN kategori_pak kp ON kp.id_kategori = ak.id_kategori
                WHERE p.nip = '$nip' 
                ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    // PERHITUNGAN PAK
    function sumPakPendidikan(){
        $nip = $this->session->userdata("nip");
        $sql = "SELECT
                    SUM(ak.angka_kredit) AS angka_kredit_total
                FROM
                    pak p
                JOIN angka_kredit ak ON ak.id_pedoman_pak = p.id_pedoman_pak
                WHERE
                    ak.id_kategori = 1 
                AND nip = $nip
                ";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
			return $query->row_array();
		return false;
    }
    function sumPakPenelitian(){
        $nip = $this->session->userdata("nip");
        $sql = "SELECT
                    SUM(ak.angka_kredit) AS angka_kredit_total
                FROM
                    pak p
                JOIN angka_kredit ak ON ak.id_pedoman_pak = p.id_pedoman_pak
                WHERE
                    ak.id_kategori = 2 
                AND nip = $nip
                ";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
			return $query->row_array();
		return false;
    }
    function sumPakAbdimas(){
        $nip = $this->session->userdata("nip");
        $sql = "SELECT
                    SUM(ak.angka_kredit) AS angka_kredit_total
                FROM
                    pak p
                JOIN angka_kredit ak ON ak.id_pedoman_pak = p.id_pedoman_pak
                WHERE
                    ak.id_kategori = 3 
                AND nip = $nip
                ";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
			return $query->row_array();
		return false;
    }
    function sumPakPenunjang(){
        $nip = $this->session->userdata("nip");
        $sql = "SELECT
                    SUM(ak.angka_kredit) AS angka_kredit_total,
                    p.nip,
                    ak.angka_kredit,
                    ak.id_kategori
                FROM
                    pak p
                JOIN angka_kredit ak ON ak.id_pedoman_pak = p.id_pedoman_pak
                WHERE
                    ak.id_kategori = 4 
                AND nip = $nip
                ";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
			return $query->row_array();
		return false;
    }
    




}
?>