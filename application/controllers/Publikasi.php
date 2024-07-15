<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Reader\Csv;
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    
    class publikasi extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('m_publikasi');
        }

        public function index(){
            $user_role    = $this->session->userdata("user_role");
            if ($user_role == 2 || $user_role == 51 || $user_role == 80) {
                $data['dataPublikasi'] = $this->m_publikasi->getDataSession();
            }else {
                $data['dataPublikasi'] = $this->m_publikasi->getDataAll();
            }
            $this->load->model('m_akun');
            $data['load_dosen'] = $this->m_akun->load_dosen();
            
            $this->load->view('v_penelitian/v_publikasi', $data);
        }

        function flt() {
            $this->load->model('m_akun');
            $data['load_dosen'] = $this->m_akun->load_dosen();
            $year   = (!empty($_POST['year'])) ? $_POST['year'] : '' ;
            $nip    = (!empty($_POST['nip'])) ? $_POST['nip'] : '' ;
            $query  = "SELECT
                        p.*, d.nama_awal AS nama_awal,
                        d.nama_akhir AS nama_akhir,
                        d.kode_dosen AS kode_dosen
                    FROM
                        publikasi p
                    LEFT JOIN dosen d ON d.nip = p.nip
                    WHERE p.id_publikasi is not NULL
                    ";
            // var_dump($nip, $year);exit;
            if (!empty($year)) {
                $query .= " AND (p.year = '$year')";
            }
            if (!empty($nip)) {
                $query .= " AND (p.nip = '$nip')";
            }
            
            $sql    = $this->db->query($query);
            $row	= $sql->result_array();
            $data['dataPublikasi'] = $row;
            // var_dump($data);exit;
            // $this->$data['dataPublikasi'] = $row;
            $this->load->view('v_penelitian/v_publikasiFlt', $data);

        }

        function import()
        {
            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
            
                $arr_file = explode('.', $_FILES['file']['name']);
                $extension = end($arr_file);
            
               if($extension == 'csv'){
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} elseif($extension == 'xlsx') {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
				}
				// file path
				$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                $nip    = $this->session->userdata("nip");
                $tempData = [];
                foreach ($allDataInSheet as $key => $value) {
                    if ($key >= 2) {
                        $tempData[] = [
                            'nip' => $nip,
                            'affiliation' => $value['A'],
                            'city' => $value['B'],
                            'document_title' => $value['C'],
                            'authors' => $value['D'],
                            'year' => $value['E'],
                            'source' => $value['F']
                        ];
                    }
                }
                $this->db->insert_batch('publikasi', $tempData);
            }
            $this->session->set_flashdata('alert_success', 'Upload Berhasil');
            redirect('Publikasi');
        }
        
        function inputPublikasi()
        {   
            if(isset($_POST['btnSubmit'])){
                $this->session->set_flashdata('alert_success', 'Input Berhasil');
            	$this->m_publikasi->simpanPublikasi($_POST);
            	redirect("Publikasi");
            }
        }

        function hapusPublikasi($id_publikasi){
            $sql_delete = $this->db->query("DELETE FROM publikasi WHERE id_publikasi = ".intval($id_publikasi));

            $this->session->set_flashdata('alert_success', 'Data Publikasi Telah Dihapus');
            redirect (base_url("publikasi"));
        }
        
        function ubahPublikasi($id_publikasi)
        {
            $data['dataPublikasi'] = $this->m_publikasi->getDataSelected($id_publikasi);
            if (isset($_POST['btnUpdate'])) {
                $affiliation     = $this->db->escape($_POST['affiliation']);
                $city            = $this->db->escape($_POST['city']);
                $document_title  = $this->db->escape($_POST['document_title']);
                $authors         = $this->db->escape($_POST['authors']);
                $year            = $this->db->escape($_POST['year']);
                $source          = $this->db->escape($_POST['source']);
                $sql             = "UPDATE publikasi
                                    SET affiliation     = $affiliation,
                                        city            = $city,
                                        document_title  = $document_title,
                                        authors         = $authors,
                                        year            = $year,
                                        source          = $source
                                    WHERE
                                        id_publikasi = ".intval($id_publikasi)
                                    ;
                $query           = $this->db->query($sql);
                $this->session->set_flashdata('alert_success', 'Data Publikasi Berhasil Diubah');
                redirect (base_url("/Publikasi"));
            }
            $this->load->view('v_penelitian/v_publikasiUbah', $data);
        }



    }
    
?>