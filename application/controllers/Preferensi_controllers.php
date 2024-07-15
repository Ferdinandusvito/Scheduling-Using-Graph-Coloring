<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Preferensi_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Preferensi_model');
    }

    public function index()
    {
        $this->load->model('Preferensi_model');
		$data['jadwal'] = $this->Preferensi_model->bacaJadwal();
		$data['jadwal2'] = $this->Preferensi_model->bacaJadwal();
		$data['preferensi'] = $this->Preferensi_model->jadwaldosen();
		$data['preferensi2'] = $this->Preferensi_model->jadwaldosen();
        $this->load->view('dosen_view/preferensi_view', $data);
    }

    public function profilPreferensi()
	{
		$this->load->model('Preferensi_model');
		$data_read = $this->Preferensi_model->jadwaldosen();
		$jumlah_data = count($data_read);
		for ($i = 0; $i < $jumlah_data; $i++ ) {
			if($data_read[$i]['6.30'] == "1"){
				$data_read[$i]['6.30'] = 'Ready';
			}
			else{
				$data_read[$i]['6.30'] = 'Not Ready';
			}
			if($data_read[$i]['7.30'] == "1"){
				$data_read[$i]['7.30'] = 'Ready';
			}
			else{
				$data_read[$i]['7.30'] = 'Not Ready';
			}
			if($data_read[$i]['8.30'] == "1"){
				$data_read[$i]['8.30'] = 'Ready';
			}
			else{
				$data_read[$i]['8.30'] = 'Not Ready';
			}
			if($data_read[$i]['9.30'] == "1"){
				$data_read[$i]['9.30'] = 'Ready';
			}
			else{
				$data_read[$i]['9.30'] = 'Not Ready';
			}
			if($data_read[$i]['10.30'] == "1"){
				$data_read[$i]['10.30'] = 'Ready';
			}
			else{
				$data_read[$i]['10.30'] = 'Not Ready';
			}
			if($data_read[$i]['11.30'] == "1"){
				$data_read[$i]['11.30'] = 'Ready';
			}
			else{
				$data_read[$i]['11.30'] = 'Not Ready';
			}
			if($data_read[$i]['12.30'] == "1"){
				$data_read[$i]['12.30'] = 'Ready';
			}
			else{
				$data_read[$i]['12.30'] = 'Not Ready';
			}
			if($data_read[$i]['13.30'] == "1"){
				$data_read[$i]['13.30'] = 'Ready';
			}
			else{
				$data_read[$i]['13.30'] = 'Not Ready';
			}
			if($data_read[$i]['14.30'] == "1"){
				$data_read[$i]['14.30'] = 'Ready';
			}
			else{
				$data_read[$i]['14.30'] = 'Not Ready';
			}
			if($data_read[$i]['15.30'] == "1"){
				$data_read[$i]['15.30'] = 'Ready';
			}
			else{
				$data_read[$i]['15.30'] = 'Not Ready';
            }
            if($data_read[$i]['16.30'] == "1"){
				$data_read[$i]['16.30'] = 'Ready';
			}
			else{
				$data_read[$i]['16.30'] = 'Not Ready';
            }
            if($data_read[$i]['17.30'] == "1"){
				$data_read[$i]['17.30'] = 'Ready';
			}
			else{
				$data_read[$i]['17.30'] = 'Not Ready';
            }
            if($data_read[$i]['18.30'] == "1"){
				$data_read[$i]['18.30'] = 'Ready';
			}
			else{
				$data_read[$i]['18.30'] = 'Not Ready';
			}
        }
        $data['preferensi'] = $data_read;
		$this->load->view('dosen_view/preferensi_view',$data);
    }
    
    public function create()
	{
		$this->load->model('Preferensi_model');
		$this->Preferensi_model->masukkanPreferensiDosen();
		$data_read = $this->Preferensi_model->jadwaldosen();
		$jumlah_data = count($data_read);
		for ($i = 0; $i < $jumlah_data; $i++ ) {
			if($data_read[$i]['shift1'] == "1"){
				$data_read[$i]['shift1'] = 'Ready';
			}
			else{
				$data_read[$i]['shift1'] = 'Not Ready';
			}
			if($data_read[$i]['shift2'] == "1"){
				$data_read[$i]['shift2'] = 'Ready';
			}
			else{
				$data_read[$i]['shift2'] = 'Not Ready';
			}
			if($data_read[$i]['shift3'] == "1"){
				$data_read[$i]['shift3'] = 'Ready';
			}
			else{
				$data_read[$i]['shift3'] = 'Not Ready';
            }
            if($data_read[$i]['shift4'] == "1"){
				$data_read[$i]['shift4'] = 'Ready';
			}
			else{
				$data_read[$i]['shift4'] = 'Not Ready';
			}
			if($data_read[$i]['shift5'] == "1"){
				$data_read[$i]['shift5'] = 'Ready';
			}
			else{
				$data_read[$i]['shift5'] = 'Not Ready';
			}
			if($data_read[$i]['shift6'] == "1"){
				$data_read[$i]['shift6'] = 'Ready';
			}
			else{
				$data_read[$i]['shift6'] = 'Not Ready';
            }
            if($data_read[$i]['shift7'] == "1"){
				$data_read[$i]['shift7'] = 'Ready';
			}
			else{
				$data_read[$i]['shift7'] = 'Not Ready';
			}
			if($data_read[$i]['shift8'] == "1"){
				$data_read[$i]['shift8'] = 'Ready';
			}
			else{
				$data_read[$i]['shift8'] = 'Not Ready';
			}
			if($data_read[$i]['shift9'] == "1"){
				$data_read[$i]['shift9'] = 'Ready';
			}
			else{
				$data_read[$i]['shift9'] = 'Not Ready';
            }
            if($data_read[$i]['shift10'] == "1"){
				$data_read[$i]['shift10'] = 'Ready';
			}
			else{
				$data_read[$i]['shift10'] = 'Not Ready';
			}
			if($data_read[$i]['shift11'] == "1"){
				$data_read[$i]['shift11'] = 'Ready';
			}
			else{
				$data_read[$i]['shift11'] = 'Not Ready';
			}
			if($data_read[$i]['shift12'] == "1"){
				$data_read[$i]['shift12'] = 'Ready';
			}
			else{
				$data_read[$i]['shift12'] = 'Not Ready';
			}
			if($data_read[$i]['shift13'] == "1"){
				$data_read[$i]['shift13'] = 'Ready';
			}
			else{
				$data_read[$i]['shift13'] = 'Not Ready';
			}
		}
		
		redirect("Preferensi_controllers");
	}
        

}
