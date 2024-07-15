<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_datadosbing extends CI_Model
{
    public function index(){
        $this->load->model("model_datadosbing");
        $data['list_datadosbing'] = $this->m_datadosbing->load_datadosbing();

        $this->load->view("dosen/v_datadosbing",$data);
    }

    public function load_datadosbing(){
        $query = "SELECT * FROM dosen JOIN roles ON roles.nip = dosen.nip WHERE roles.user_role_id=2";
            $sql = $this->db->query($query);
            return $sql->result_array();
    }


    public function get_default($nip){
        $sql = $this->db->query("SELECT * FROM dosen WHERE nip = ".intval($nip));
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

}