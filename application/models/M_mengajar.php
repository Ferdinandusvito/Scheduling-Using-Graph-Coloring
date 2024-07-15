<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_mengajar extends CI_Model{
    
    public function getAllMengajar($jurusan){

        $sql = 'SELECT mengajar.id_mengajar, dosen.nip, dosen.kode_dosen, kode_matkul, nama_matkul, jurusan.id_jurusan, jurusan.nama_jurusan, matkul.sks  FROM `mengajar` 
        JOIN matkul ON matkul.id_matkul = mengajar.id_matkul
        JOIN dosen ON dosen.nip = mengajar.nip
        JOIN perkuliahan ON perkuliahan.id_matkul = matkul.id_matkul
        JOIN jurusan ON perkuliahan.id_jurusan = jurusan.id_jurusan
        WHERE jurusan.id_jurusan = "'.$jurusan.'"';

        return $this->db->query($sql)->result_array();
    }
}