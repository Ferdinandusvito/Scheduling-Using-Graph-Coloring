<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('excel_import_model');
        $this->load->library('excel');
    }

    public function index()
    {
        $this->load->view('excel_import');
    }

    public function import_kelas()
    {
        $id_jurusan = 6;
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            // file path
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $tempData = [];
            foreach ($allDataInSheet as $key => $value) {
                if ($key >= 2) {
                    $tempData[] = [
                        'id_jurusan' => $id_jurusan,
                        'nama_kelas'    => $value['A'],
                        'dosen_wali'    => $value['B']
                    ];
                }
            }
            $this->db->insert_batch('kelas', $tempData);
        }
        $this->session->set_flashdata('alert_success', 'Upload Berhasil');
        redirect('Fakultas_controllers');
    }

    public function import_gedung()
    {
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            // file path
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $tempData = [];
            foreach ($allDataInSheet as $key => $value) {
                if ($key >= 2) {
                    $tempData[] = [
                        'nama_gedung'    => $value['A']
                    ];
                }
            }
            $this->db->insert_batch('gedung', $tempData);
        }
        $this->session->set_flashdata('alert_success', 'Upload Berhasil');
        redirect('Data_controllers/ruangan');
    }

    public function import_ruangan()
    {
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            // file path
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $tempData = [];
            foreach ($allDataInSheet as $key => $value) {
                if ($key >= 2) {
                    $tempData[] = [
                        'nama_ruangan'    => $value['A'],
                        'id_gedung'    => $value['B'],
                        'kapasitas'    => $value['C']
                    ];
                }
            }
            $this->db->insert_batch('ruangan', $tempData);
        }
        $this->session->set_flashdata('alert_success', 'Upload Berhasil');
        redirect('Data_controllers/ruangan');
    }
}
