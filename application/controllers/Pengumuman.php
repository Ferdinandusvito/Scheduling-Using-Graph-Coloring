<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class pengumuman extends MY_Controller
    {
        public function index(){
            $this->load->model("m_pengumuman");
            $data['list_pengumuman'] = $this->m_pengumuman->load_pengumuman();

            $this->load->view('v_pengumuman/v_pengumuman', $data);
        }

        public function inputPengumuman(){
            $this->load->view('v_pengumuman/v_inputPengumuman');
        }

        function simpanPengumuman(){
            $config['upload_path']          = './assets/documents/pengumuman/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 25600000;
    
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('v_upload', $error);
            }else{
                $data = array('upload_data' => $this->upload->data());
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $file_name   = $upload_data['file_name'];
                $nip         = $this->session->userdata("nip");
                $judul       = $this->db->escape($_POST['judul']);
                $pengumuman  = $this->db->escape($_POST['pengumuman']);
                $tgl_dibuat  = date('Y-m-d H:i:s');
                $query =    "INSERT INTO pengumuman (
                                judul,
                                pengumuman,
                                tgl_dibuat,
                                nip,
                                file
                            ) 
                            VALUES (
                                $judul,
                                $pengumuman,
                                '$tgl_dibuat',
                                $nip,
                                '$file_name'
                            ) ";
                $sql = $this->db->query($query);
                redirect('Pengumuman');
            }
        }

        public function delete($id_pengumuman){
            $this->load->model("m_pengumuman");
            $this->m_pengumuman->hapusPengumuman($id_pengumuman);
            $this->session->set_flashdata('alert_hapus', 'Pengumuman telah dihapus');
            
            redirect (base_url("pengumuman"));
        }

        public function edit($id_pengumuman){
            $this->load->model("m_pengumuman");
            $data['list_pengumuman'] = $this->m_pengumuman->load_pengumumanSelect($id_pengumuman);
                if(isset($_POST['ubahPengumuman'])){
                    $judul       = $this->db->escape($_POST['judul']);
                    $pengumuman  = $this->db->escape($_POST['pengumuman']);
                    $tgl_dibuat  = date('Y-m-d H:i:s');
                    $query       = "UPDATE pengumuman SET
                                        judul      = $judul,
                                        pengumuman = $pengumuman,
                                        tgl_dibuat = '$tgl_dibuat'
                                    WHERE id_pengumuman = ".intval($id_pengumuman)
                                    ;
                    $sql = $this->db->query($query);
                    $this->session->set_flashdata('alert_ubah', 'Pengumuman telah diperbarui');
                    redirect("pengumuman");
                }
            $this->load->view('v_pengumuman/v_editPengumuman', $data);
        }

        function detail($id_pengumuman){
            $this->load->model("m_pengumuman");
            $data['list_pengumuman'] = $this->m_pengumuman->load_pengumumanSelect($id_pengumuman);

            $this->load->view('v_pengumuman/v_detailPengumuman', $data);
        }



    }
    
?>