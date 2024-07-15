<?php
class Penjadwalan_model extends CI_Model {
    
    public function getDataDosen()
    {
        $query = "SELECT dosen.nip, dosen.kode_dosen, 
        preferensi.id_preferensi, preferensi.id_hari, 
        preferensi.shift1, preferensi.shift2, preferensi.shift3, preferensi.shift4, preferensi.shift5,
        preferensi.shift6, preferensi.shift7, preferensi.shift8, preferensi.shift9, preferensi.shift10,
        preferensi.shift11, preferensi.shift12, preferensi.shift13,
        matkul.id_matkul, matkul.nama_matkul, matkul.kode_matkul
        FROM dosen 
        JOIN preferensi ON dosen.nip=preferensi.nip
        JOIN mengajar ON dosen.nip=mengajar.nip
        JOIN matkul ON mengajar.id_matkul=matkul.id_matkul";

        return $this->db->query($query)->result_array();
    }

    public function getClassRequirements()
    {
        $query = "SELECT kelas.id_kelas, kelas.nama_kelas, perkuliahan.id_jurusan,
        perkuliahan.id_perkuliahan,
        kelas.id_jurusan, jurusan.kode_jurusan, jurusan.nama_jurusan,
        matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, matkul.sks
        FROM `kelas`
        JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan
        JOIN perkuliahan ON perkuliahan.id_jurusan = jurusan.id_jurusan
        JOIN matkul ON matkul.id_matkul = perkuliahan.id_matkul
        ORDER BY kelas.id_kelas";

        return $this->db->query($query)->result_array();
    }
    
    // public function tampil()
    // {   

    //     $query = $this->db->get($this->table);
    //     return $query->result();
    // }
    
    
}