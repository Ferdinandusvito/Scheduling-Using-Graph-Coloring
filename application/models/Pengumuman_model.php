<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pengumuman_model extends CI_Model
    {
        public function load_pengumuman()
        {
            $query = "SELECT * FROM pengumuman ORDER BY tgl_dibuat DESC";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        function load_pengumumanSelect($id_pengumuman)
        {
            $query = "SELECT * FROM pengumuman WHERE id_pengumuman = ".intval($id_pengumuman);
            $sql = $this->db->query($query);
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }

        public function hapusPengumuman($id_pengumuman)
        {
            $sql_delete = $this->db->query("DELETE from pengumuman WHERE id_pengumuman = ".intval($id_pengumuman));
        }



    }
    
?>