<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("fakultas_model");
        $this->load->model("ruangan_model");
        $this->load->model("kelas_model");
        $this->load->library('excel');
    }

    public function index()
    {
        redirect("Data_controllers/kelas");
    }

    public function exploreKelas($id_kelas)
    {
        $data['kelasByID'] = $this->jurusan_model->kelasByID($id_kelas);
        $data['kelasJurusan'] = $this->fakultas_model->daftar_kelass($id_jurusan);

        $this->load->view("jurusan_view/detail_jurusan", $data);
    }
    
    function fetch()
    {
        $data = $this->fakultas_model->select();
        $output = '
        <h3 align="center">Total Data - ' . $data->num_rows() . '</h3>
        <table class="table table-striped table-bordered">
        <tr>
            <th>Nama Kelas</th>
            <th>Angkatan</th>
            <th>Dosen Wali</th>
        </tr>
        ';
        foreach ($data->result() as $row) {
            $output .= '
        <tr>
            <td>' . $row->nama_kelas . '</td>
            <td>' . $row->angkatan . '</td>
            <td>' . $row->dosen_wali . '</td>
        </tr>
        ';
        }
        $output .= '</table>';
        echo $output;
    }

    function import()
    {
        $id_jurusan = $this->session->id_jurusan;

        // print_r($id_fakultas['id_fakultas']);

        
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $nama_kelas = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $angkatan = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $dosen_wali = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $data[] = array(
                        'id_jurusan'    => $id_jurusan,
                        'nama_kelas'    => $nama_kelas,
                        'angkatan'      => $angkatan,
                        'nama_kelas'  => $nama_kelas,
                        'angkatan'   => $angkatan,
                        'dosen_Wali'    => $dosen_wali
                    );
                }
            }
            $this->fakultas_model->insert($data);
            echo 'Data Imported successfully';
        }
    }

    public function hapusJurusan($id_jurusan)
    {
        $data['list_jurusan'] = $this->fakultas_model->hapus_jurusan($id_jurusan);
        $this->load->view("data/fakultas_view", $data);
        // redirect('Data_controllers/fakultas');
    }
}
