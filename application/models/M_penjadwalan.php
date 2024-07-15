<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjadwalan extends CI_Model{
    public function __construct()
	{
        return $this->db->get('baru_test')->result_array();
    }

    public function tambahJadwal()
	{
        $data = $this->input->post('arr');

        $jumlah = count($data);
        
        for ($i = 0; $i < $jumlah; $i++){
            $data2 = [
                'tanggal' => $data[$i],
            ];
            $this->db->insert('baru_pekansidang', $data2);
        }
    }

    public function getJadwalKelompok(){
        if($this->session->user_role_id == 2){
            $query = $this->db->query("SELECT * FROM t_topik WHERE nip = " . $this->session->nip);

            $sql = $this->db->query($query);

            if($sql->num_rows() > 0){
                $query2 = $this->db->query("SELECT * FROM t_judul WHERE nip = " . $this->session->nip);

                $sql2 = $this->db->query($query2);

                if($sql->num_rows() > 0){
                    return "success?";
                }
                return false;
            }
            else{
                return false;
            }
        }

    }

    public function getJadwalKelompokAll(){
        $query  = "SELECT
        tj.*, tt.*, rs.*, top.*, 
        tj.nim,
        -- tj.pbb1 as pbb1,
        -- tj.pbb2 as pbb2,
        -- tt.pgj1 as pgj1,
        -- tt.pgj2 as pgj2
        d1.kode_dosen as pbb1,
        d2.kode_dosen as pbb2,
        p1.kode_dosen as pgj1,
        p2.kode_dosen as pgj2ft5
        FROM
            t_judul tj 
        INNER JOIN t_jadwal tt ON tj.idta = tt.idta
        JOIN ruangan_seminar rs ON tt.ruangan = rs.id_slot
        JOIN t_topik top ON top.idta = tj.idta
        JOIN dosen d1 ON d1.nip = tj.pbb1
        JOIN dosen d2 ON d2.nip = tj.pbb2
        JOIN dosen p1 ON p1.nip = tt.pgj1
        JOIN dosen p2 ON p2.nip = tt.pgj2
        WHERE tj.id_status =54";

        $sql    = $this->db->query($query);
        return $sql->result_array();
    }

    //

    public function getJadwalSidang(){
        return $this->db->get('baru_pekansidang')->result_array();
    }

    public function getJadwalDosen(){
        $query = 'SELECT 
        baru_jadwaldosen.kode_jadwaldosen as "kode",
        baru_jadwaldosen.nip,
        baru_jadwaldosen.id_pekansidang,
        baru_jadwaldosen.shift1,
        baru_jadwaldosen.shift2,
        baru_jadwaldosen.shift3,
        baru_jadwaldosen.shift4,
        baru_pekansidang.tanggal

        FROM baru_jadwaldosen
        JOIN baru_pekansidang ON 
        baru_pekansidang.id_pekansidang = baru_jadwaldosen.id_pekansidang';

        $sql = $this->db->query($query);
        return $sql->result_array();
    }


    public function getShift($tgl, $nip){
        $query = 'SELECT 
        baru_jadwaldosen.kode_jadwaldosen as "kode",
        baru_jadwaldosen.nip,
        baru_jadwaldosen.id_pekansidang,
        baru_jadwaldosen.shift1,
        baru_jadwaldosen.shift2,
        baru_jadwaldosen.shift3,
        baru_jadwaldosen.shift4,
        baru_pekansidang.tanggal

        FROM baru_jadwaldosen
        JOIN baru_pekansidang ON 
        baru_pekansidang.id_pekansidang = baru_jadwaldosen.id_pekansidang
        WHERE baru_pekansidang.tanggal ='.$tgl.' AND baru_jadwaldosen.nip = '.$nip;

        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function jadwalDosen_Dosen(){
        $query = 'SELECT 
            baru_pekansidang.tanggal,
            dosen.nip, 
            baru_pekansidang.id_pekansidang, 
            shift1,shift2,shift3, shift4,
            dosen.kode_dosen, dosen.id_bidang, 
            dosen.id_bidang2, dosen.id_jabatan 
            FROM `baru_jadwaldosen` 
            JOIN dosen 
            on dosen.nip = baru_jadwaldosen.nip 
            JOIN baru_pekansidang ON 
            baru_pekansidang.id_pekansidang = baru_jadwaldosen.id_pekansidang
            ORDER by baru_pekansidang.tanggal, dosen.nip';

        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    // public algoritmaLinearProgramming(){
    //     $this->db->transStart();

    //     $query = $this->db->query("SELECT *FROM dosen WHERE id_bidang = " . $this->session->id_bidang)
    //     $a=>['id_bidang == 1'];
    //     $b=>['id_bidang == 2'];
    //     $c=>['id_bidang == 3'];
    //     $d=>['id_bidang == 4'];
    //     $e=>['id_bidang == 5'];
    //     $f=>['id_bidang == 6'];
        
    //     $p=>['id_bidang2 == 1'];
    //     $q=>['id_bidang2 == 2'];
    //     $r=>['id_bidang2 == 3'];
    //     $s=>['id_bidang2 == 4'];
    //     $t=>['id_bidang2 == 5'];
    //     $u=>['id_bidang2 == 6'];

    //     $query = $this->db->query("SELECT *FROM dosen WHERE id_bidang = " . $this->session->id_bidang)
    //     if 3 mahasiswa
    //     ( $a + $b + $c + $d + $e + $f )*$x + ( $p + $q + $r + $s + $t + $u )*$y + ( $p + $q + $r + $s + $t + $u )*$z <= 24;
    //     else 
    //     ( $a + $b + $c + $d + $e + $f )*$x + ( $p + $q + $r + $s + $t + $u )*$y <= 16;
    // }


    public function generate(){
        $result = array();  
        return $result;
    }

    public function getAllRuangTA(){
        return $this->db->get('ruangan_ta')->result_array();
    }

    public function insertDataPenjadwalan(){
        $post = $this->input->post();
        for ($i=0; $i < sizeof($post['idta']); $i++) { 
            $insertData = [
                'idta' => $post['idta'][$i],
                'id_pekansidang' => $post['id_pekansidang'][$i],
                'id_ruangan' => $post['id_ruangan'][$i],
                'penguji1' => $post['penguji1'][$i],
                'penguji2' => $post['penguji2'][$i],
                'penguji3' => $post['penguji3'][$i],
                'shift' => $post['shift'][$i],
            ];
            $this->db->insert('baru_penjadwalan', $insertData);
        }
    }

    // public function getAllDataDosen(){
    //     return $this->db->get('dosen')->result_array();
    // }

    public function load_hasilpenjadwalan(){
        $query  = "SELECT
                    tj.*, bp.*, top.*, rr.*,
                    d1.kode_dosen as pbb1,
                    d2.kode_dosen as pbb2,
                    p1.kode_dosen as penguji1,
                    p2.kode_dosen as penguji2,
                    p3.kode_dosen as penguji3,
                    rr.nama_ruangan as nama_ruangan,
                    baru_pekansidang.tanggal as tanggal
                    FROM t_judul tj 
                    INNER JOIN baru_penjadwalan bp ON tj.idta = bp.idta

                    JOIN t_topik top ON top.idta = tj.idta
                    JOIN dosen d1 ON d1.nip = tj.pbb1
                    JOIN dosen d2 ON d2.nip = tj.pbb2
                    JOIN dosen p1 ON p1.nip = bp.penguji1
                    JOIN dosen p2 ON p2.nip = bp.penguji2
                    LEFT JOIN dosen p3 ON p3.nip = bp.penguji3
                    JOIN ruangan_ta rr ON rr.id_ruangan = bp.id_ruangan
                    JOIN baru_pekansidang ON bp.id_pekansidang=baru_pekansidang.id_pekansidang";


        $sql = $this->db->query($query)->result_array();

        return $sql;

    }

    public function algoritmaLinearProgrammingData($idta){

        $query = ' SELECT
            t_topik.idta,
            t_topik.topik,
            -- t_topik.pbb1,
            -- t_topik.pbb2,
            t_topik.tanggal_sidang,
            t_judul.idta as idta_judul,
            t_judul.judul,
            t_judul.pbb1,
            t_judul.pbb2
            FROM t_topik
            JOIN t_judul ON
                t_judul.idta = t_topik.idta
            WHERE t_judul.idta ='.$idta;

        $datata = $this->db->query($query)->result_array();

        return $datata;


    }

    public function algoritmaLinearProgramming1($idta){
        // $query = 'SELECT 
        //     -- t_topik.id_bidang,
        //     t_topik.id_bidang
        //     FROM t_topik 
        //     WHERE t_topik.idta ='.$idta;
        
        // $sqlall = $this->db->query($query)->result_array();
                
        $sql1 = 'SELECT 
                dosen.nip,
                dosen.id_bidang as bidang_dosen,
                dosen.kode_dosen,
                dosen.id_jabatan,
                baru_value.value_bidang1,
                t_topik.id_bidang,
                t_topik.tanggal_sidang,
                t_topik.id_pekansidang,
                t_topik.pbb1,
                t_topik.pbb2,
                baru_jadwaldosen.nip,
                baru_jadwaldosen.id_pekansidang as id_psidang,
                baru_jadwaldosen.shift1,
                baru_jadwaldosen.shift2,
                baru_jadwaldosen.shift3,
                baru_jadwaldosen.shift4
                FROM dosen
                JOIN baru_value ON
                    baru_value.nip = dosen.nip
                JOIN baru_jadwaldosen ON
                    baru_jadwaldosen.nip = dosen.nip
                JOIN t_topik ON
                    t_topik.id_pekansidang = baru_jadwaldosen.id_pekansidang
                WHERE t_topik.idta ='.$idta;
                

        $qp1 = $this->db->query($sql1)->result_array();

        #Syarat penguji Penguji 1

        $calonpenguji1 = [];
        foreach ($qp1 as $qp1) {
            if (($qp1['bidang_dosen'] == $qp1['id_bidang']) and ($qp1['value_bidang1'] == 1.67)){
                if(($qp1['nip'] != $qp1['pbb1']) and ($qp1['nip'] != $qp1['pbb2'])){
                    $query_add = "INSERT INTO baru_opsipenguji (
                        idta,
                        nip,
                        -- kode_dosen,
                        value_bidang1,
                        id_jabatan,
                        shift1,
                        shift2,
                        shift3,
                        shift4
                    )
                    VALUES
                        (
                        $idta,
                        $qp1[nip],
                        -- $qp1[kode_dosen],
                        $qp1[value_bidang1],
                        $qp1[id_jabatan],
                        $qp1[shift1],
                        $qp1[shift2],
                        $qp1[shift3],
                        $qp1[shift4]
                        )";
                        
                    $sql_add = $this->db->query($query_add);
                    array_push($calonpenguji1, $qp1);
                }
            }
        }
        return $calonpenguji1;
        
    }

    public function algoritmaLinearProgramming2($idta){
        // $query = 'SELECT 
        //     -- t_topik.id_bidang,
        //     t_topik.id_bidang
        //     FROM t_topik 
        //     WHERE t_topik.idta ='.$idta;
        
        // $sqlall = $this->db->query($query)->result_array();

        $sql2 = 'SELECT 
        dosen.nip,
        dosen.id_bidang2,
        dosen.kode_dosen,
        dosen.id_jabatan,
        baru_value.value_bidang2,
        t_topik.id_bidang,
        t_topik.tanggal_sidang,
        t_topik.id_pekansidang,
        t_topik.pbb1,
        t_topik.pbb2,
        baru_jadwaldosen.nip,
        baru_jadwaldosen.id_pekansidang as id_psidang,
        baru_jadwaldosen.shift1,
        baru_jadwaldosen.shift2,
        baru_jadwaldosen.shift3,
        baru_jadwaldosen.shift4
        FROM dosen
        JOIN baru_value ON
            baru_value.nip = dosen.nip
        JOIN baru_jadwaldosen ON
            baru_jadwaldosen.nip = dosen.nip
        JOIN t_topik ON
            t_topik.id_pekansidang = baru_jadwaldosen.id_pekansidang
        WHERE t_topik.idta ='.$idta;

        $qp2 = $this->db->query($sql2)->result_array();

        #Syarat penguji Penguji 2

        $calonpenguji2 = [];
        foreach ($qp2 as $qp2) {
            if (($qp2['id_bidang2'] == $qp2['id_bidang']) and ($qp2['value_bidang2'] >= 1.37 and $qp2['value_bidang2'] < 1.67 )){
                if(($qp2['nip'] != $qp2['pbb1']) and ($qp2['nip'] != $qp2['pbb2'])) {
                    $query_add = "INSERT INTO baru_opsipenguji (
                        idta,
                        nip,
                        value_bidang2,
                        id_jabatan,
                        shift1,
                        shift2,
                        shift3,
                        shift4
                    )
                    VALUES
                        (
                        $idta,
                        $qp2[nip],
                        $qp2[value_bidang2],
                        $qp2[id_jabatan],
                        $qp2[shift1],
                        $qp2[shift2],
                        $qp2[shift3],
                        $qp2[shift4]
                        )";
                        
                    $sql_add = $this->db->query($query_add);
                    array_push($calonpenguji2, $qp2);
                }
            }
        }
        return $calonpenguji2;
    }


    public function algoritmaLinearProgramming3($idta){
        // $query = 'SELECT 
        //     -- t_topik.id_bidang,
        //     t_topik.id_bidang
        //     FROM t_topik 
        //     WHERE t_topik.idta ='.$idta;
        
        // $sqlall = $this->db->query($query)->result_array();

        $sql3 = 'SELECT 
        dosen.nip,
        dosen.id_bidang2,
        dosen.kode_dosen,
        dosen.id_jabatan,
        baru_value.value_bidang2,
        t_topik.id_bidang,
        t_topik.tanggal_sidang,
        t_topik.id_pekansidang,
        t_topik.pbb1,
        t_topik.pbb2,
        t_topik.kuotatopik,
        baru_jadwaldosen.nip,
        baru_jadwaldosen.id_pekansidang as id_psidang,
        baru_jadwaldosen.shift1,
        baru_jadwaldosen.shift2,
        baru_jadwaldosen.shift3,
        baru_jadwaldosen.shift4
        FROM dosen
        JOIN baru_value ON
            baru_value.nip = dosen.nip
        JOIN baru_jadwaldosen ON
            baru_jadwaldosen.nip = dosen.nip
        JOIN t_topik ON
            t_topik.id_pekansidang = baru_jadwaldosen.id_pekansidang
        WHERE t_topik.idta ='.$idta;
    
        $qp3 =$this->db->query($sql3)->result_array();

        $sql3_2 = ' SELECT 
                    t_judul.idta as idta_judul
                    FROM t_judul
                    WHERE t_judul.idta = '.$idta;
        
        $qp3_2 = $this->db->query($sql3_2)->result_array();


        $jmlrow_judul = count($qp3_2);

        $calonpenguji3 = [];
        foreach ($qp3 as $qp3) {
            if (($qp3['id_bidang2'] == $qp3['id_bidang']) and ($qp3['value_bidang2'] < 1.37) and ($jmlrow_judul == 3)){
                if(($qp3['nip'] != $qp3['pbb1']) and ($qp3['nip'] != $qp3['pbb2'])) {
                    $query_add = "INSERT INTO baru_opsipenguji (
                        idta,
                        nip,
                        value_bidang2,
                        id_jabatan,
                        shift1,
                        shift2,
                        shift3,
                        shift4
                    )
                    VALUES
                        (
                        $idta,
                        $qp3[nip],
                        $qp3[value_bidang2],
                        $qp3[id_jabatan],
                        $qp3[shift1],
                        $qp3[shift2],
                        $qp3[shift3],
                        $qp3[shift4]
                        )";
                        
                    $sql_add = $this->db->query($query_add);
                array_push($calonpenguji3, $qp3);
            }
            }
        }
        print_r($jmlrow_judul);
        return $calonpenguji3;
    }

    public function pilihdosen($idta){
        $query ='SELECT
                baru_opsipenguji.idta,
                baru_opsipenguji.nip,
                baru_opsipenguji.value_bidang1,
                baru_opsipenguji.value_bidang2,
                baru_opsipenguji.shift1,
                baru_opsipenguji.shift2,
                baru_opsipenguji.shift3,
                baru_opsipenguji.shift4,
                baru_opsipenguji.id_jabatan,
                t_topik.idta,
                t_topik.id_pekansidang,
                t_topik.kuotatopik,
                dosen.nip as nip_dosen,
                dosen.id_bidang,
                dosen.id_bidang2,
                dosen.kode_dosen
                FROM baru_opsipenguji
                JOIN dosen ON
                    dosen.nip = baru_opsipenguji.nip
                JOIN t_topik ON
                    t_topik.idta = baru_opsipenguji.idta
                WHERE baru_opsipenguji.value_bidang1 IS NOT NULL 
                AND baru_opsipenguji.idta = '. $idta;

        $sql = $this->db->query($query)->result_array();


        $query2 ='SELECT
                baru_opsipenguji.idta,
                baru_opsipenguji.nip,
                baru_opsipenguji.value_bidang1,
                baru_opsipenguji.value_bidang2,
                baru_opsipenguji.shift1,
                baru_opsipenguji.shift2,
                baru_opsipenguji.shift3,
                baru_opsipenguji.shift4,
                baru_opsipenguji.id_jabatan,
                t_topik.idta,
                t_topik.id_pekansidang,
                t_topik.kuotatopik,
                dosen.nip as nip_dosen,
                dosen.id_bidang,
                dosen.id_bidang2,
                dosen.kode_dosen
                FROM baru_opsipenguji
                JOIN dosen ON
                    dosen.nip = baru_opsipenguji.nip
                JOIN t_topik ON
                    t_topik.idta = baru_opsipenguji.idta
                WHERE baru_opsipenguji.value_bidang2 < '. 1.67 .
                'AND baru_opsipenguji.value_bidang2 >= '. 1.37 .
                'AND baru_opsipenguji.idta = '. $idta;

        $sql2 = $this->db->query($query2)->result_array();
        
        $query3 ='SELECT
                baru_opsipenguji.idta,
                baru_opsipenguji.nip,
                baru_opsipenguji.value_bidang1,
                baru_opsipenguji.value_bidang2,
                baru_opsipenguji.shift1,
                baru_opsipenguji.shift2,
                baru_opsipenguji.shift3,
                baru_opsipenguji.shift4,
                baru_opsipenguji.id_jabatan,
                t_topik.idta,
                t_topik.id_pekansidang,
                t_topik.kuotatopik,
                dosen.nip as nip_dosen,
                dosen.id_bidang,
                dosen.id_bidang2,
                dosen.kode_dosen
                FROM baru_opsipenguji
                JOIN dosen ON
                    dosen.nip = baru_opsipenguji.nip
                JOIN t_topik ON
                    t_topik.idta = baru_opsipenguji.idta
                WHERE baru_opsipenguji.value_bidang2 < '. 1.37 .
                ' AND baru_opsipenguji.idta = '. $idta;

        $sql3 = $this->db->query($query3)->result_array();
        
        $jmlrow = count($sql);
        $jmlrow2 = count($sql2);
        $jmlrow_3 = count($sql3);
        
        if($jmlrow_3 == 0 ){
            $sql3 = NULL;
        }
        
        if($jmlrow2 == 0 ){
            $sql2 = $sql;
        }
        
        if($jmlrow == 0 ){
            $sql = NULL;
            // echo ' Tidak Bisa Dijadwalkan !';

            return $sql;
        }
        
        $pengujifix = [];

        $k = 0;

        $sql3_2 = ' SELECT 
                    t_judul.idta as idta_judul
                    FROM t_judul
                    WHERE t_judul.idta = '. $idta;
        
        $qp3_2 = $this->db->query($sql3_2)->result_array();


        $jmlrow_judul = count($qp3_2);

        if($jmlrow_judul == 3){
            for($i = 0 ; $i < $jmlrow; $i++){
                for($j = 0 ; $j < $jmlrow2; $j++){
                    for($l = 0 ; $l < $jmlrow_3 ; $l++){ 
                        
                    $pengujifix[$k] = [
                    'penguji1' => $sql[$i],
                    'penguji2' => $sql2[$j],
                    'penguji3' => $sql3[$l]
                    ];

                    $k++;
                    }
                }
            }
        } else {
            for($i = 0 ; $i < $jmlrow; $i++){
                for($j = 0 ; $j < $jmlrow2; $j++){

                    if($sql2 != NULL){
                        $pengujifix[$k] = [
                            'penguji1' => $sql[$i],
                            'penguji2' => $sql2[$j],
                            'penguji3' => NULL
                        ];

                    $k++;
                    } 
                }
                if($sql == $sql2) {
                    for($i = 0 ; $i < $jmlrow; $i++){
                        for($j = 1 ; $j < $jmlrow; $j++){
                            if($sql[$i] != $sql[$j]){
                                $pengujifix[$k] = [
                                    'penguji1' => $sql[$i],
                                    'penguji2' => $sql2[$j],
                                    'penguji3' => NULL
                                ];

                                $k++;
                            }
                        }
                    }
                }
            }
        }

        $jmlrow3 = count($pengujifix);
        $penguji = [];

        //menentukan penguji berdasar jabatan dosen
        for($k = 0; $k < $jmlrow3; $k++){
            if(($pengujifix[$k]['penguji1']['id_jabatan'] > $pengujifix[$k]['penguji2']['id_jabatan']) or ($pengujifix[$k]['penguji2']['id_jabatan'] > $pengujifix[$k]['penguji3']['id_jabatan'] )){
                $penguji[$k] = [
                    'penguji1' => $pengujifix[$k]['penguji1'],
                    'penguji2' => $pengujifix[$k]['penguji2'],
                    'penguji3' => $pengujifix[$k]['penguji3']
                ];
            } elseif(($pengujifix[$k]['penguji1']['id_jabatan'] == $pengujifix[$k]['penguji2']['id_jabatan']) or ($pengujifix[$k]['penguji2']['id_jabatan'] > $pengujifix[$k]['penguji3']['id_jabatan'] ) ){
                $penguji[$k] = [
                    'penguji1' => $pengujifix[$k]['penguji1'],
                    'penguji2' => $pengujifix[$k]['penguji2'],
                    'penguji3' => $pengujifix[$k]['penguji3']
                ];
            } elseif(($pengujifix[$k]['penguji1']['id_jabatan'] < $pengujifix[$k]['penguji2']['id_jabatan']) or ($pengujifix[$k]['penguji2']['id_jabatan'] == $pengujifix[$k]['penguji3']['id_jabatan'] )){
                $penguji[$k] = [
                    'penguji1' => $pengujifix[$k]['penguji1'],
                    'penguji2' => $pengujifix[$k]['penguji2'],
                    'penguji3' => $pengujifix[$k]['penguji3']
                ];
            } elseif(($pengujifix[$k]['penguji1']['id_jabatan'] == $pengujifix[$k]['penguji2']['id_jabatan']) or ($pengujifix[$k]['penguji2']['id_jabatan'] == $pengujifix[$k]['penguji3']['id_jabatan'] )){
                $penguji[$k] = [
                    'penguji1' => $pengujifix[$k]['penguji1'],
                    'penguji2' => $pengujifix[$k]['penguji2'],
                    'penguji3' => $pengujifix[$k]['penguji3']
                ];
            }
        }

        $penguji = array_values($penguji);


        $jmlrow4 = count($penguji);
        $pengujifinal = [];
        $shift = [];

        // print_r($penguji);

        // menentukan shift
        for($k = 0; $k < $jmlrow4; $k++){
            if(($penguji[$k]['penguji1']['shift1'] == 1) and ($penguji[$k]['penguji2']['shift1'] == 1)){
                $pengujifinal[$k] = [
                    'penguji1' => $penguji[$k]['penguji1'],
                    'penguji2' => $penguji[$k]['penguji2'],
                    'penguji3' => $penguji[$k]['penguji3'],
                    'shift' => 1
                ]; 
            } elseif (($penguji[$k]['penguji1']['shift2'] == 1) and ($penguji[$k]['penguji2']['shift2'] == 1)){
                $pengujifinal[$k] = [
                    'penguji1' => $penguji[$k]['penguji1'],
                    'penguji2' => $penguji[$k]['penguji2'],
                    'penguji3' => $penguji[$k]['penguji3'],
                    'shift' => 2
                ]; 
            } elseif (($penguji[$k]['penguji1']['shift3'] == 1) and ($penguji[$k]['penguji2']['shift3'] == 1)){
                $pengujifinal[$k] = [
                    'penguji1' => $penguji[$k]['penguji1'],
                    'penguji2' => $penguji[$k]['penguji2'],
                    'penguji3' => $penguji[$k]['penguji3'],
                    'shift' => 3
                ]; 
            } elseif (($penguji[$k]['penguji1']['shift4'] == 1) and ($penguji[$k]['penguji2']['shift4'] == 1)){
                $pengujifinal[$k] = [
                    'penguji1' => $penguji[$k]['penguji1'],
                    'penguji2' => $penguji[$k]['penguji2'],
                    'penguji3' => $penguji[$k]['penguji3'],
                    'shift' => 4
                ]; 
            } else {
                $pengujifinal[$k] = [
                    'penguji1' => $penguji[$k]['penguji1'],
                    'penguji2' => $penguji[$k]['penguji2'],
                    'penguji3' => $penguji[$k]['penguji3'],
                    'shift' => 4
                ]; 
            }
        }

        $pengujifinal = array_values($pengujifinal);
        $jmlrow5 = count($pengujifinal);

        // print_r($pengujifinal);

        for($j=0; $j < $jmlrow5; $j++){

            if($pengujifinal[$j]['penguji3']['nip_dosen'] == NULL){
                $pengujifinal[$j]['penguji3']['nip_dosen'] = 0;
            }
        
        if (($pengujifinal[$j]['penguji1'] != NULL) AND ($pengujifinal[$j]['penguji2'] != NULL) or  ($pengujifinal[$j]['penguji3'] != NULL) ){
        $query_add = "INSERT INTO baru_calonpenguji (
            idta,
            id_pekansidang,
            penguji1,
            penguji2,
            penguji3,
            shift
        )
        VALUES
            (
            $idta,
            ".$pengujifinal[$j]['penguji1']['id_pekansidang'].",
            ".$pengujifinal[$j]['penguji1']['nip_dosen'].",
            ".$pengujifinal[$j]['penguji2']['nip_dosen'].",
            ".$pengujifinal[$j]['penguji3']['nip_dosen'].",
            ".$pengujifinal[$j]['shift']."
            )";

            $sql_add = $this->db->query($query_add);
        } else {
            // echo ' Penguji Tidak Tersedia! ';
            return $pengujifinal;
        }
        }

        $query4 = ' SELECT 
                    baru_calonpenguji.idta,
                    baru_calonpenguji.id_pekansidang,
                    baru_calonpenguji.penguji1,
                    baru_calonpenguji.penguji2,
                    baru_calonpenguji.penguji3,
                    baru_calonpenguji.shift
                    FROM baru_calonpenguji
                    WHERE baru_calonpenguji.idta = '. $idta;
        
        $sql4 = $this->db->query($query4)->result_array();

        for($j = 0 ; $j < $jmlrow5; $j++){
            $pengujifinals [0]= [
                'idta' => $idta,
                'id_pekansidang' => $pengujifinal[0]['penguji1']['id_pekansidang'],
                'penguji1' => $pengujifinal[0]['penguji1']['nip_dosen'],
                'penguji2' => $pengujifinal[0]['penguji2']['nip_dosen'],
                'penguji3' => $pengujifinal[0]['penguji3']['nip_dosen'],
                'shift' => $pengujifinal[0]['shift']
            ]; 
        }



        for($j = 0 ; $j < $jmlrow5; $j++){
        $query5 = ' SELECT 
                    baru_penjadwalan.idta,
                    baru_penjadwalan.id_pekansidang,
                    baru_penjadwalan.id_ruangan,
                    baru_penjadwalan.penguji1,
                    baru_penjadwalan.penguji2,
                    baru_penjadwalan.penguji3,
                    baru_penjadwalan.shift
                    FROM baru_penjadwalan
                    WHERE baru_penjadwalan.id_pekansidang = ' . $pengujifinals[0]['id_pekansidang'] .
                    ' AND baru_penjadwalan.penguji1 = '. $pengujifinals[0]['penguji1'] .
                    ' AND baru_penjadwalan.penguji2 = '. $pengujifinals[0]['penguji2'] .
                    ' AND baru_penjadwalan.penguji3 = '. $pengujifinals[0]['penguji3'] .
                    ' AND baru_penjadwalan.shift = '. $pengujifinals[0]['shift'];

        $sql5 = $this->db->query($query5)->result_array();
        }

        $jmlrow_5 = count($sql5);

        $query6 = ' SELECT * FROM ruangan_ta ';

        $sql6 = $this->db->query($query6)->result_array();

        $sql6 = array_values($sql6);

        $ruangan = [];

        for($i=0; $i < 3; $i++){
            $ruangan [0] = [
                'id_ruangan' => $sql6[0]['id_ruangan']
            ];
        }
        
        foreach($sql5 as $sql5){
            for($i=0; $i < $jmlrow_5; $i++){
                if(($pengujifinals[0]['shift'] != $sql5['shift']) or ($pengujifinals[0]['id_pekansidang'] != $sql5['id_pekansidang']) and ($ruangan[0]['id_ruangan'] != $sql5['id_ruangan']) ){
                    $ruangan [0] = [
                        'id_ruangan' => $sql6[0]['id_ruangan']
                    ];
                } else {
                    $ruangan [0] = [
                        'id_ruangan'=> $sql6[$i+1]['id_ruangan']
                    ];
                }
            }
        }

        // print_r($ruangan);


        $pengujiganti = [];
        $pengujiakhir = [];

        if($sql5 == NULL){
            $query_add = "INSERT INTO baru_penjadwalan (
                idta,
                id_pekansidang,
                id_ruangan,
                penguji1,
                penguji2,
                penguji3,
                shift
            )
            VALUES
                (
                $idta,
                ".$pengujifinals[0]['id_pekansidang'].",
                ".$ruangan[0]['id_ruangan'].",
                ".$pengujifinals[0]['penguji1'].",
                ".$pengujifinals[0]['penguji2'].",
                ".$pengujifinals[0]['penguji3'].",
                ".$pengujifinals[0]['shift']."
                )";
    
            $sql_add = $this->db->query($query_add);
            // echo 'Berhasil';

            $pengujiakhir = $pengujifinals;

        } else {
            foreach($sql4 as $sql4){
                if(($sql4['penguji1'] != $pengujifinals[0]['penguji1']) and ($sql4['penguji2'] != $pengujifinal[0]['penguji2']) or ($sql4['penguji3'] != $pengujifinals[0]['penguji3']) ){
                    array_push($pengujiganti,$sql4);
                }
            }

            $pengujiganti = array_values($pengujiganti);
            $jmlrow_ganti = count($pengujiganti);

            for($i=0 ; $i < $jmlrow_ganti; $i ++){
            $query_add = "INSERT INTO baru_penjadwalan (
                idta,
                id_pekansidang,
                id_ruangan,
                penguji1,
                penguji2,
                penguji3,
                shift
            )
            VALUES
                (
                $idta,
                ".$pengujiganti[1]['id_pekansidang'].",
                ".$ruangan[0]['id_ruangan'].",
                ".$pengujiganti[1]['penguji1'].",
                ".$pengujiganti[1]['penguji2'].",
                ".$pengujiganti[1]['penguji3'].",
                ".$pengujiganti[1]['shift']."
                )";
            }
            $sql_add = $this->db->query($query_add);
            
            $pengujiakhir = $pengujiganti[0];
            // echo ' Berhasil Opsi Calon Penguji Lain ';
        }

        return $pengujiakhir;
        
    }

    public function hasilpenjadwalanfinal(){
        $query  = "SELECT
                    tj.*, bp.*, top.*,
                    d1.kode_dosen as pbb1,
                    d2.kode_dosen as pbb2,
                    p1.kode_dosen as penguji1,
                    p2.kode_dosen as penguji2,
                    p3.kode_dosen as penguji3,
                    rr.nama_ruangan as nama_ruangan
                    FROM t_judul tj 
                    INNER JOIN baru_penjadwalan bp ON tj.idta = bp.idta
                    JOIN t_topik top ON top.idta = tj.idta
                    JOIN dosen d1 ON d1.nip = tj.pbb1
                    JOIN dosen d2 ON d2.nip = tj.pbb2
                    JOIN dosen p1 ON p1.nip = bp.penguji1
                    JOIN dosen p2 ON p2.nip = bp.penguji2 
                    LEFT JOIN dosen p3 ON p3.nip = bp.penguji3 
                    JOIN ruangan_ta rr ON rr.id_ruangan = bp.id_ruangan 
                    ";

        $sql = $this->db->query($query)->result_array();

        return $sql;
        
    }

}







?>