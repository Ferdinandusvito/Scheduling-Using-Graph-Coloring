<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penjadwalan_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("perkuliahan_model");
        $this->load->model("fakultas_model");
        $this->load->model("dosen_model");
        $this->load->model('penjadwalan_model');
    }

    public function generate_old()
    {
        try{
            $nip = $this->session->userdata("nip");
            $data['my_profile'] = $this->dosen_model->exploredosenByNip($nip);

            $data['data_class_requirement'] = $this->penjadwalan_model->getClassRequirements();
            $data['data_preferensi_dosen'] = $this->penjadwalan_model->getDataDosen();

            foreach ($data['data_preferensi_dosen'] as $key => $value) {
                $data['data_preferensi_dosen'][$key]['no'] = $key;
            }

            $this->load->view("penjadwalan/generate_jadwal", $data);
        } catch (Exception $e){
            show_error("Internal Server Error",500);
        }
    }

    public function generate(){
        try{
            $this->load->model('m_mengajar');
            $this->load->model('m_preferensi');
            $nip = $this->session->userdata("nip");
            $data['my_profile'] = $this->dosen_model->exploredosenByNip($nip);

            $data['vertex_list'] = [];
            $data['edges'] = [];
            $data['ruangan_fakultas'] = [];
            $data['id_jurusan'] = null;
            $data['all_mengajar'] = null;

            $post = $this->input->post();
            
            if($post){
                $data['id_jurusan'] = $post['jurusan'];
                $data['id_fakultas'] = $post['fakultas'];
                
                // prepare data
                // data Dosen(Mengajar) + Hari + (Shift = 1)
    
                // get all data from table : mengajar 
                //TODO fixing data mengajar + kelas
                $all_mengajar_db = $this->m_mengajar->getAllMengajar($data['id_jurusan']);

                foreach ($all_mengajar_db as $mengajar) {
                    $data['all_mengajar'][$mengajar['id_mengajar']] = $mengajar;
                }

                // Including kelas ;;;;
                // $this->load->model('Kelas_model');
                // $daftar_kelas = $this->Kelas_model->daftar_kelass($data['id_jurusan']);

                // foreach ($daftar_kelas as $kelas) {
                //     foreach ($data['all_mengajar'] as $index => $mengajar) {
                //         $data['all_mengajar'][$index]['nama_kelas'] = $kelas['nama_kelas'];
                //     }
                // }
                // var_dump($data['all_mengajar']); die;


                // generate calon Vertex
                foreach ($data['all_mengajar'] as $mengajar) {
                    $pref_table = $this->m_preferensi->getPrefDataByNip($mengajar['nip']);
                    // $shifts = ['shift1', 'shift2', 'shift3', 'shift4'];
    
                    foreach ($pref_table as $pref) {
                        for ($i=1; $i <= 13; $i++) { 
                            $shift = 'shift'.$i;
                            if($pref[$shift] == '1'){
                                $vertex_data['id_mengajar'] = $mengajar['id_mengajar'];
                                $vertex_data['id_hari'] = $pref['id_hari'];
                                $vertex_data['shift'] = $i;
                                $vertex_data['sks'] = $mengajar['sks'];
                                $i += $mengajar['sks'] - 1;
                            }
                        }
                        // foreach ($shifts as $key2 => $shift) {
                        //     if($pref[$shift] == '1'){
                        //         $vertex_data['id_mengajar'] = $mengajar['id_mengajar'];
                        //         $vertex_data['id_hari'] = $pref['id_hari'];
                        //         $vertex_data['shift'] = $key2 + 1;
                        //     }
                        // }
                        array_push($data['vertex_list'], $vertex_data);
                    }
                }
                // menambah adj setiap vertex
                

                
                for ($i=0; $i < sizeof($data['vertex_list']); $i++) { 
                    for ($j= $i+1; $j < sizeof($data['vertex_list'])-1 ; $j++) { 
                        $id_hari_i = $data['vertex_list'][$i]['id_hari'];
                        $id_hari_j = $data['vertex_list'][$j]['id_hari'];
                        $shift_i = $data['vertex_list'][$i]['shift'];
                        $shift_j = $data['vertex_list'][$j]['shift'];
                        $end_i =  $data['vertex_list'][$i]['shift'] + $data['vertex_list'][$i]['sks'] - 1;
                        $end_j =  $data['vertex_list'][$j]['shift'] + $data['vertex_list'][$j]['sks'] - 1;
                        
                        if($id_hari_i == $id_hari_j){
                            if($shift_i >=  $shift_j && $shift_i <= $end_j){
                                
                                array_push($data['edges'], [$i,$j]);
                                continue;
                            }
                            if($end_i >=  $shift_j && $end_i <= $end_j){
                                array_push($data['edges'], [$i,$j]);
                                continue;
                            }
                        } 
                    }
                }
                
                // prepare ruangan Fakultas
                $this->load->model('Ruangan_model');
                $data['ruangan_fakultas'] = $this->Ruangan_model->getRuanganFakultas($data['id_jurusan']);
            }            
            // var_dump($data['vertex_list']);  die();

            // prepare data Fakultas dan Jurusan
            $this->load->model('Fakultas_model');
            $data['fakultas_jurusan'] = $this->Fakultas_model->daftar_jurusan();
            $data['fakultas_list'] = $this->Fakultas_model->daftar_fakultas();

            $this->load->view("penjadwalan/generate_graph_coloring", $data);
        } catch (Exception $e){
            show_error("Internal Server Error",500);
        }
    }

    public function hasil_generate()
    {
        try{
            $nip = $this->session->userdata("nip");
            $data['my_profile'] = $this->dosen_model->exploredosenByNip($nip);
            
            $this->load->view("penjadwalan/hasil_jadwal", $data);
        } catch (Exception $e){
            show_error("Internal Server Error",500);
        }
    }

    public function cetak()
    {
            $this->load->view("penjadwalan/cetak_jadwal");
    }

    public function cetak_jadwal()
        {
            $this->load->view('penjadwalan/cetak_jadwal');
        }
}
