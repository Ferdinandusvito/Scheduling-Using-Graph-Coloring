<?php 
    class Notifikasi extends MY_Controller
    {
        function getNotif($nip){
            $this->load->model('m_notifikasi');
            $data = $this->m_notifikasi->getNotif($nip);
            header('Content-Type: application/json');
            echo json_encode( $data );
        }

        function readNotif($id){
            $query = "UPDATE notification SET status = 1 WHERE id_notification = $id ";
            $sql = $this->db->query($query);
            if($sql)
                return true;
            return false;
        }

        function countNotif($nip){
            $this->load->model('m_notifikasi');
            $data = $this->m_notifikasi->countNotif($nip);
            header('Content-Type: application/json');
            echo json_encode( $data );
        }


    }
    
?>