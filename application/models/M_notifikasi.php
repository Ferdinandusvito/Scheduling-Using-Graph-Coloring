<?php 
    class m_notifikasi extends CI_Model
    {
        function getNotif($nip){
            $query  =    "SELECT
                            a.id_status as id_status_abdimas,
                            p.id_status as id_status_penelitian,
                            n.id_abdimas as id_abdimas,
                            n.id_penelitian as id_penelitian,
                            n.created_date as created_date,
                            n.nip as nip,
                            n.status as status,
                            n.id_notification
                        FROM
                            notification n
                        LEFT JOIN abdimas a ON a.id_abdimas = n.id_abdimas
                        LEFT JOIN penelitian p ON p.id_penelitian = n.id_penelitian
                        WHERE (a.id_status != 1 OR p.id_status != 1)
                        AND n.nip = $nip
                        ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }
        function countNotif($nip){
            $query  =    "SELECT
                            count(*) as total_notif
                        FROM
                            notification n
                        LEFT JOIN abdimas a ON a.id_abdimas = n.id_abdimas
                        LEFT JOIN penelitian p ON p.id_penelitian = n.id_penelitian
                        WHERE (a.id_status != 1 OR p.id_status != 1)
                        AND n.nip = $nip
                        AND n.status = 0
                        ";
            $sql    = $this->db->query($query);
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }
    }
    
?>