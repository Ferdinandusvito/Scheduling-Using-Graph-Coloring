<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class M_preferensi extends CI_Model{
    public function __construct()
	{
        return $this->db->get('baru_pekansidang')->result_array();
    }
    
    public function tambahPreferensi()
    {
        $query = "SELECT * FROM baru_pekansidang";

        $sql = $this->db->query($query);

        return $sql->result_array();
    }


    //membaca DB baru_pekansidang untuk tampilan DOSEN
    public function bacaJadwal()
    {
        return $this->db->get('baru_pekansidang')->result_array();
    }

    // public function bacaJadwal($id_tanggal)
    // {
    //     return $this->db->get_where('baru_pekansidang', ['id_tanggal' => $id_tanggal])->row_array();
    // }


    //menambahkan kesediaan untuk menguji
    public function masukkanPreferensiDosen()
    {
        // $shift1 = $this->input->post('shift1');
		// $shift2 = $this->input->post('shift2');
		// $shift3 = $this->input->post('shift3');
		// $shift4 = $this->input->post('shift4');
        $tanggal = $this->input->post('tanggal');
        
        $jumlah_tanggal = count($tanggal);

        // foreach($tanggal as $index => $value){
        //     print_r('value : ' . $value . 'index' . $index);
        //     echo '<br/>';
        //     print_r('value input shift1' . $tanggal[$index] . ' : ' . $this->input->post('shift1' . $tanggal[$index]));
        //     echo '<br/>';
        //     print_r('value input shift2' . $tanggal[$index] . ' : ' . $this->input->post('shift2' . $tanggal[$index]));
        //     echo '<br/>';
        //     print_r('value input shift3' . $tanggal[$index] . ' : ' . $this->input->post('shift3' . $tanggal[$index]));
        //     echo '<br/>';
        //     print_r('value input shift4' . $tanggal[$index] . ' : ' . $this->input->post('shift4' . $tanggal[$index]));
        //     echo '<br/>';
        // }

        // die();

		for($i = 0;$i < $jumlah_tanggal; $i++){
            //Cek input jika ada maka 1, jika tidak maka 0
			$shift1Checked = $this->input->post('shift1' . $tanggal[$i])==null ? 0 : 1;
			$shift2Checked = $this->input->post('shift2' . $tanggal[$i])==null ? 0 : 1;
			$shift3Checked = $this->input->post('shift3' . $tanggal[$i])==null ? 0 : 1;
            $shift4Checked = $this->input->post('shift4' . $tanggal[$i])==null ? 0 : 1;
            
            //siapin variabel buat dikirim
            $data = [
                'nip' => $this->session->nip,
                'id_pekansidang' => $tanggal[$i],
                'shift1' => $shift1Checked,
                'shift2' => $shift2Checked,
                'shift3' => $shift3Checked,
                'shift4' => $shift4Checked,
            ];

            

            //jalanin query database
			$this->db->insert('baru_jadwaldosen', $data);
		}
    }

    public function bacaPreferensi($nip)
    {
        return $this->db->get('baru_jadwaldosen')->result_array($nip);
    }


    public function jadwaldosen()
     {
        $nip = $this->session->nip;

        $query = $this->db->query("SELECT   baru_jadwaldosen.nip as nip , 
                                            baru_pekansidang.tanggal as tanggal,
                                            baru_jadwaldosen.shift1 as shift1, 
                                            baru_jadwaldosen.shift2 as shift2, 
                                            baru_jadwaldosen.shift3 as shift3, 
                                            baru_jadwaldosen.shift4 as shift4 
                                    FROM baru_jadwaldosen
                                    JOIN baru_pekansidang ON baru_jadwaldosen.id_pekansidang = baru_pekansidang.id_pekansidang
                                    WHERE nip = '$nip'");

        return $query->result_array();
     }

     public function bidangkeahlian()
     {
         $nip = $this->session->nip;

         $query = "SELECT dosen.nip as nip,
                        dosen.id_bidang as id_bidang1,
                        dosen.id_bidang2 as id_bidang2,
                        bidang.id_bidang,
                        bidang.nama_bidang as nama_bidang
                        FROM dosen
                        JOIN bidang ON
                            bidang.id_bidang = dosen.id_bidang
                        WHERE nip = '$nip'";

        $sql = $this->db->query($query)->result_array();

        return $sql;
     }

     public function bidangkeahlianvalue()
     {
         $nip = $this->session->nip;

         $query = "SELECT 
                    baru_value.nip,
                    baru_value.value_bidang1,
                    baru_value.value_bidang2
                    FROM baru_value
                    WHERE nip = '$nip'";

        $sql = $this->db->query($query)->result_array();

        return $sql;
     }

     public function updateDosenKeahlian($post){

        $nip = $this->session->nip;
         
        $value_bidang1 = $this->db->escape($post['value_bidang1']);
        $id_bidang2 = $this->db->escape($post['id_bidang2']);
        $value_bidang2 = $this->db->escape($post['value_bidang2']);

        $query = "UPDATE dosen SET 
                                id_bidang2 = $id_bidang2 
                                WHERE nip = $nip";

        $sql = $this->db->query($query);

        $query2 = "UPDATE baru_value SET 
                                value_bidang1 = $value_bidang1, 
                                value_bidang2 = $value_bidang2 
                                WHERE nip = $nip";

        $sql2 = $this->db->query($query2);

        return true;

     }

     public function test(){
        function fizzBuzz($n) {
        }
     }

     public function deleteByNip($nip)
     {
         $this->db->delete('preferensi', array('nip' => $nip));
         return true;
     }

     public function getPrefDataByNip($nip){
         
        $query = "SELECT * FROM `preferensi` where nip = ".$nip." AND (shift1+shift2+shift3+shift4+shift5+shift6+shift7+shift8+shift9+shift10+shift11+shift12+shift13) > 0";
        return $this->db->query($query)->result_array();
    }
     
}
