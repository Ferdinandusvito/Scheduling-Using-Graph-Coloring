<?php 
    class M_akun extends CI_Model
    {
        public function load_dosen(){
            $query = "SELECT
                        d.*, b.nama_bidang AS bidang
                    FROM
                        dosen d
                    JOIN bidang b ON b.id_bidang = d.id_bidang
                    ORDER BY d.kode_dosen ASC
                    ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        function dataDosenSession(){
            $nip = $this->session->userdata("nip");
            $sql = "SELECT d.*,
                        b.nama_bidang as bidang, 
                        jb.jabatan AS jabatan_fungsional
                    FROM dosen d
                    JOIN bidang b ON b.id_bidang = d.id_bidang
                    JOIN jabatan jb ON jb.id_jabatan = d.id_jabatan
                    WHERE nip = $nip ";
            $query = $this->db->query($sql);
            if($query->num_rows() > 0)
                return $query->row_array();
            return false;
        }

        function dataMhsSession(){
            $nim    = $this->session->userdata("nim");
            $query  = "SELECT * FROM mahasiswa WHERE nim = $nim ";
            $sql    = $this->db->query($query);
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }

        function dataLabSession(){
            $id_laboratorium    = $this->session->userdata("id_laboratorium");
            $query = "SELECT * FROM laboratorium WHERE id_laboratorium = $id_laboratorium";
            $sql = $this->db->query($query);
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }

        function load_mahasiswa(){
            $query  = "SELECT * FROM mahasiswa";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        function load_laboratorium(){
            $query  = "SELECT * FROM laboratorium";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        function load_labSelected($id_laboratorium){
            $query  = "SELECT * FROM laboratorium WHERE id_laboratorium = $id_laboratorium ";
            $sql    = $this->db->query($query);
            return $sql->row_array();
        }

        function load_mahasiswaSelect($nim){
            $query  = "SELECT * FROM mahasiswa WHERE nim = $nim ";
            $sql    = $this->db->query($query);
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }

        function getUserRole(){
            $role = $this->session->userdata("user_role");
            // var_dump($this->session->userdata("user_role"));exit;
            if ($role == 3) {
                $nim = $this->session->userdata("nim");
                $query = "SELECT
                        r.*,
                        ur.role_name
                    FROM
                        roles r
                    JOIN user_roles ur ON r.user_role_id = ur.user_role_id
                    WHERE r.nim = $nim
                    ";
                $sql = $this->db->query($query);
                return $sql->result_array();
            }elseif($role == 1 || $role == 2 || $role == 4 || $role == 5 || $role == 6 || $role == 7 || $role == 51 || $role == 80) {
                $nip = $this->session->userdata("nip");
                $query1 = "SELECT
                        r.*,
                        ur.role_name
                    FROM
                        roles r
                    JOIN user_roles ur ON r.user_role_id = ur.user_role_id
                    WHERE r.nip = $nip
                    ";
                $sql1 = $this->db->query($query1);
                return $sql1->result_array();
            }elseif ($role == 8) {
                $id_laboratorium = $this->session->userdata("id_laboratorium");
                $query2 = "SELECT
                        r.*,
                        ur.role_name
                    FROM
                        roles r
                    JOIN user_roles ur ON r.user_role_id = ur.user_role_id
                    WHERE r.id_laboratorium = $id_laboratorium
                    ";
                $sql2 = $this->db->query($query2);
                return $sql2->result_array();
            }
            
            
        }
        



    }
    
?>