<?php 
    class m_publikasi extends CI_Model
    {
        function getDataAll()
        {
            $query = "SELECT
                        p.*, d.nama_awal AS nama_awal,
                        d.nama_akhir AS nama_akhir,
                        d.kode_dosen AS kode_dosen
                    FROM
                        publikasi p
                    LEFT JOIN dosen d ON d.nip = p.nip
                    ";
            $sql = $this->db->query($query);
            return $sql->result_array();
        }

        function getDataSession(){
            $nip    = $this->session->userdata("nip");
            $query  =   "SELECT
                            *
                        FROM
                            publikasi
                        WHERE
                            nip = '$nip'
                        ";
            $sql    = $this->db->query($query);
            return $sql->result_array();
        }

        function getDataSelected($id_publikasi)
        {
            $query  =   "SELECT
                            *
                        FROM
                            publikasi
                        WHERE
                            id_publikasi = ".intval($id_publikasi)
                        ;
            $sql    = $this->db->query($query);
            if($sql->num_rows() > 0)
                return $sql->row_array();
            return false;
        }

        function insert($data)
        {
            $this->db->insert_batch('publikasi', $data);
        }

        public function simpanPublikasi($post)
        {
            $nip            = $this->session->userdata("nip");
            $affiliation    = $this->db->escape($post['affiliation']);
            $city           = $this->db->escape($post['city']);
            $document_title = $this->db->escape($post['document_title']);
            $authors        = $this->db->escape($post['authors']);
            $year           = $this->db->escape($post['year']);
            $source         = $this->db->escape($post['source']);
            $query  = "INSERT INTO publikasi (
                        nip,
                        affiliation,
                        city,
                        document_title,
                        authors,
                        year,
                        source
                    )
                    VALUES
                        (
                            $nip,
                            $affiliation,
                            $city,
                            $document_title,
                            $authors,
                            $year,
                            $source
                        )";
            $sql = $this->db->query($query);
            
            if($sql)
                return true;
            return false;
        }

        function filterPublikasi($nip, $year){

            $query = "SELECT
                        p.*, d.nama_awal AS nama_awal,
                        d.nama_akhir AS nama_akhir,
                        d.kode_dosen AS kode_dosen
                    FROM
                        publikasi p
                    LEFT JOIN dosen d ON d.nip = p.nip	
                    WHERE (p.nip = $nip) AND (p.year = $year) ";
            $sql   = $this->db->query($query);

            return $sql->result_array();
        }



    }
    
?>