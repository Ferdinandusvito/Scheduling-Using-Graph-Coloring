<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Preferensi_model extends CI_Model
{
    public function __construct()
    {
        return $this->db->get('hari')->result_array();
    }

    //membaca DB hari untuk tampilan DOSEN
    public function bacaJadwal()
    {
        return $this->db->get('hari')->result_array();
    }

    public function tambahPreferensi()
    {
        $query = "SELECT * FROM hari";

        $sql = $this->db->query($query);

        return $sql->result_array();
    }

    public function bacaPreferensi($nip)
    {
        return $this->db->get('preferensi')->result_array($nip);
    }

    //menambahkan kesediaan untuk menguji
    public function masukkanPreferensiDosen()
    {
        $nama_hari = $this->input->post('nama_hari');
        
        $nip = $this->session->nip;

        $query_check = $this->db->query("SELECT * FROM preferensi WHERE nip = $nip");

        if($query_check->num_rows() == 0) {
            $jumlah_nama_hari = count($nama_hari);
            for ($i = 0; $i < $jumlah_nama_hari; $i++) {
                //Cek input jika ada maka 1, jika tidak maka 0
                $jam1Checked = $this->input->post('shift1' . $nama_hari[$i]) == null ? 0 : 1;
                $jam2Checked = $this->input->post('shift2' . $nama_hari[$i]) == null ? 0 : 1;
                $jam3Checked = $this->input->post('shift3' . $nama_hari[$i]) == null ? 0 : 1;
                $jam4Checked = $this->input->post('shift4' . $nama_hari[$i]) == null ? 0 : 1;
                $jam5Checked = $this->input->post('shift5' . $nama_hari[$i]) == null ? 0 : 1;
                $jam6Checked = $this->input->post('shift6' . $nama_hari[$i]) == null ? 0 : 1;
                $jam7Checked = $this->input->post('shift7' . $nama_hari[$i]) == null ? 0 : 1;
                $jam8Checked = $this->input->post('shift8' . $nama_hari[$i]) == null ? 0 : 1;
                $jam9Checked = $this->input->post('shift9' . $nama_hari[$i]) == null ? 0 : 1;
                $jam10Checked = $this->input->post('shift10' . $nama_hari[$i]) == null ? 0 : 1;
                $jam11Checked = $this->input->post('shift11' . $nama_hari[$i]) == null ? 0 : 1;
                $jam12Checked = $this->input->post('shift12' . $nama_hari[$i]) == null ? 0 : 1;
                $jam13Checked = $this->input->post('shift13' . $nama_hari[$i]) == null ? 0 : 1;
    
                $id_hari = $nama_hari[$i];
    
                //siapin variabel buat dikirim
                $data = [
                    'nip' => $this->session->nip,
                    'id_hari' => $nama_hari[$i],
                    'shift1' => $jam1Checked,
                    'shift2' => $jam2Checked,
                    'shift3' => $jam3Checked,
                    'shift4' => $jam4Checked,
                    'shift5' => $jam5Checked,
                    'shift6' => $jam6Checked,
                    'shift7' => $jam7Checked,
                    'shift8' => $jam8Checked,
                    'shift9' => $jam9Checked,
                    'shift10' => $jam10Checked,
                    'shift11' => $jam11Checked,
                    'shift12' => $jam12Checked,
                    'shift13' => $jam13Checked,
                ];
    
                // //jalanin query database
                $this->db->insert('preferensi', $data);
                // $this->db->update_string('preferensi', $data, 'nip = ' . $nip . ' AND id_hari = ' . $nama_hari[$i]);
            }
        } else {
            $jumlah_nama_hari = count($nama_hari);
            for ($i = 0; $i < $jumlah_nama_hari; $i++) {
                //Cek input jika ada maka 1, jika tidak maka 0
                $jam1Checked = $this->input->post('shift1' . $nama_hari[$i]) == null ? 0 : 1;
                $jam2Checked = $this->input->post('shift2' . $nama_hari[$i]) == null ? 0 : 1;
                $jam3Checked = $this->input->post('shift3' . $nama_hari[$i]) == null ? 0 : 1;
                $jam4Checked = $this->input->post('shift4' . $nama_hari[$i]) == null ? 0 : 1;
                $jam5Checked = $this->input->post('shift5' . $nama_hari[$i]) == null ? 0 : 1;
                $jam6Checked = $this->input->post('shift6' . $nama_hari[$i]) == null ? 0 : 1;
                $jam7Checked = $this->input->post('shift7' . $nama_hari[$i]) == null ? 0 : 1;
                $jam8Checked = $this->input->post('shift8' . $nama_hari[$i]) == null ? 0 : 1;
                $jam9Checked = $this->input->post('shift9' . $nama_hari[$i]) == null ? 0 : 1;
                $jam10Checked = $this->input->post('shift10' . $nama_hari[$i]) == null ? 0 : 1;
                $jam11Checked = $this->input->post('shift11' . $nama_hari[$i]) == null ? 0 : 1;
                $jam12Checked = $this->input->post('shift12' . $nama_hari[$i]) == null ? 0 : 1;
                $jam13Checked = $this->input->post('shift13' . $nama_hari[$i]) == null ? 0 : 1;
    
                $id_hari = $nama_hari[$i];
    
                //siapin variabel buat dikirim
                $data = [
                    'nip' => $this->session->nip,
                    'id_hari' => $nama_hari[$i],
                    'shift1' => $jam1Checked,
                    'shift2' => $jam2Checked,
                    'shift3' => $jam3Checked,
                    'shift4' => $jam4Checked,
                    'shift5' => $jam5Checked,
                    'shift6' => $jam6Checked,
                    'shift7' => $jam7Checked,
                    'shift8' => $jam8Checked,
                    'shift9' => $jam9Checked,
                    'shift10' => $jam10Checked,
                    'shift11' => $jam11Checked,
                    'shift12' => $jam12Checked,
                    'shift13' => $jam13Checked,
                ];
    
                // //jalanin query database
                // $this->db->insert('preferensi', $data);
                $this->db->update('preferensi', $data, ['nip' => $nip, 'id_hari' => $id_hari]);
            }
        }
    }

     public function jadwaldosen()
     {
        $nip = $this->session->nip;

        $query_check = $this->db->query("SELECT * FROM preferensi WHERE nip = $nip");

        if($query_check->num_rows() == 0) {
            $query1 = $this->db->query("SELECT * FROM hari");

            $hari = $query1->result_array();
            
            for ($i = 0; $i < count($hari); $i++) {
                //Cek input jika ada maka 1, jika tidak maka 0
                $jam1Checked = 0;
                $jam2Checked = 0;
                $jam3Checked = 0;
                $jam4Checked = 0;
                $jam5Checked = 0;
                $jam6Checked = 0;
                $jam7Checked = 0;
                $jam8Checked = 0;
                $jam9Checked = 0;
                $jam10Checked = 0;
                $jam11Checked = 0;
                $jam12Checked = 0;
                $jam13Checked = 0;
    
                //siapin variabel buat dikirim
                $data = [
                    'nip' => $this->session->nip,
                    'id_hari' => $hari[$i]['id_hari'],
                    'shift1' => $jam1Checked,
                    'shift2' => $jam2Checked,
                    'shift3' => $jam3Checked,
                    'shift4' => $jam4Checked,
                    'shift5' => $jam5Checked,
                    'shift6' => $jam6Checked,
                    'shift7' => $jam7Checked,
                    'shift8' => $jam8Checked,
                    'shift9' => $jam9Checked,
                    'shift10' => $jam10Checked,
                    'shift11' => $jam11Checked,
                    'shift12' => $jam12Checked,
                    'shift13' => $jam13Checked,
                ];
    
                // //jalanin query database
                $this->db->insert('preferensi', $data);
                // $this->db->update('preferensi', $data, ['nip' => $nip, 'id_hari' => $id_hari]);
            }

            $query = $this->db->query("SELECT   preferensi.nip as nip ,
                                            hari.id_hari as id_hari,
                                            hari.nama_hari as nama_hari,
                                            preferensi.shift1 as shift1, 
                                            preferensi.shift2 as shift2, 
                                            preferensi.shift3 as shift3,
                                            preferensi.shift4 as shift4, 
                                            preferensi.shift5 as shift5, 
                                            preferensi.shift6 as shift6, 
                                            preferensi.shift7 as shift7, 
                                            preferensi.shift8 as shift8, 
                                            preferensi.shift9 as shift9, 
                                            preferensi.shift10 as shift10, 
                                            preferensi.shift11 as shift11, 
                                            preferensi.shift12 as shift12,  
                                            preferensi.shift13 as shift13 
                                    FROM preferensi
                                    JOIN hari ON preferensi.id_hari = hari.id_hari
                                    WHERE nip = '$nip'");
                                    

            return $query->result_array();
        } else {
            $query = $this->db->query("SELECT   preferensi.nip as nip ,
                                            hari.id_hari as id_hari,
                                            hari.nama_hari as nama_hari,
                                            preferensi.shift1 as shift1, 
                                            preferensi.shift2 as shift2, 
                                            preferensi.shift3 as shift3,
                                            preferensi.shift4 as shift4, 
                                            preferensi.shift5 as shift5, 
                                            preferensi.shift6 as shift6, 
                                            preferensi.shift7 as shift7, 
                                            preferensi.shift8 as shift8, 
                                            preferensi.shift9 as shift9, 
                                            preferensi.shift10 as shift10, 
                                            preferensi.shift11 as shift11, 
                                            preferensi.shift12 as shift12,  
                                            preferensi.shift13 as shift13 
                                    FROM preferensi
                                    JOIN hari ON preferensi.id_hari = hari.id_hari
                                    WHERE nip = '$nip'");
                                    

            return $query->result_array();
        }
     }

    public function test()
    {
        function fizzBuzz($n)
        {
        }
    }

    public function deleteByNip($nip)
     {
         $this->db->delete('preferensi', array('nip' => $nip));
         return true;
     }

}
