<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$data = $this->load->view('mpdf_v');
	}
 
	public function printPDF()
	{
		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('hasilPrint', [], TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
	}

}
