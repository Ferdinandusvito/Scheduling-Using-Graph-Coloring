<?php
class pengaturan_model extends CI_Model
{
    function dataDosen()
    {
        $sql = "SELECT * FROM dosen
                    JOIN roles ON roles.nip = dosen.nip
                    WHERE roles.user_role_id = 2";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function loadUserRole()
    {
        $query  = "SELECT * FROM user_role";
        $sql    = $this->db_query($query);

        return $sql->result_array();
    }
}
