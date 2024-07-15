<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class preferensi extends MY_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('M_preferensi');
		// if (empty($this->session->userdata('username'))) {
		// 	redirect(site_url("login"));
		}
	public function index()
	{
		$this->load->model('M_preferensi');

		$data['jadwal'] = $this->M_preferensi->bacaJadwal();
		
		$this->load->view('v_preferensi/preferensi_jadwal',$data);
	}

	public function profilPreferensi()
	{
		$this->load->model('M_preferensi');

		// $data['baru_jadwaldosen'] = $this->M_preferensi->jadwaldosen();

		$data_read = $this->M_preferensi->jadwaldosen();

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
			// $data['shift1'] = [
			// 	'shift1' => 'READY',
			// 	'shift2' => 'READY',
			// 	'shift3' => 'READY',
			// 	'shift4' => 'READY',
			// ];
		}

		$data['baru_jadwaldosen'] = $data_read;

		// for ($i = 0; $i < $jumlah_data; $i++ ) {
		// 	$data['baru_jadwaldosen'] = [
		// 		'shift1' => 'NOT READY',
		// 		'shift2' => 'NOT READY',
		// 		'shift3' => 'NOT READY',
		// 		'shift4' => 'NOT READY',
		// 	];
		// }

		$this->load->view('v_preferensi/profil_preferensi',$data);
		// var_dump($data);

	}

	public function create()
	{
		
		$this->load->model('M_preferensi');

		$this->M_preferensi->masukkanPreferensiDosen();

		$data_read = $this->M_preferensi->jadwaldosen();

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
			// $data['shift1'] = [
			// 	'shift1' => 'READY',
			// 	'shift2' => 'READY',
			// 	'shift3' => 'READY',
			// 	'shift4' => 'READY',
			// ];
		}

		$data['baru_jadwaldosen'] = $data_read;

		// for ($i = 0; $i < $jumlah_data; $i++ ) {
		// 	$data['baru_jadwaldosen'] = [
		// 		'shift1' => 'NOT READY',
		// 		'shift2' => 'NOT READY',
		// 		'shift3' => 'NOT READY',
		// 		'shift4' => 'NOT READY',
		// 	];
		// }

		$this->load->view('v_preferensi/profil_preferensi',$data);

		// $test = 'success?';

		// var_dump($test);
	}

	// //menambahkan kesediaan untuk menguji
	// public function masukkanPreferensi()
	// {
	// 	$data['baru_pekansidang'] = $this->M_preferensi->bacaJadwal();
		
	// }

	// public function index()
    // {
    //     $data['information'] = $this->front_model->jadwaldosen();
    //     $this->load->view('home',$data);
	// }

	// public function penjadwalan(){
	// 	//Cek jika yg login ada dosen
		
	// 	$this->load->model('M_preferensi');

	// 	$data = $this->M_preferensi->getJadwalKelompok();

	// 	var_dump($data);
	// }

	// public function penjadwalanAdmin(){
		
	// 	$this->load->model('M_preferensi');

	// 	$data['gotit'] = $this->M_preferensi->getJadwalKelompokAll();

	// 	$this->load->view('v_penjadwalan/v_test_jadwaladmin',$data);
	// }

	// public function tambahPengumuman(){
	// 	$judul =  $this->input->post('judul');
	// 	$nama_mahasiswa = $this->input->post('nama_mahasiswa');
	// 	$nama_pembimbing = $this->input->post('nama_pembimbing');
	// 	$tanggal = $this->input->post('tanggal');

	// 	$jumlah_data = count($judul);

	// 	$judul_peng = "Daftar Sidang";

	// 	$tgl_now = date('Y-m-d H:i:s');

	// 	$peng_content = '<table class="table">
	// 		<thead>
	// 		  <tr>
	// 			<th scope="col">No.</th>
	// 			<th scope="col">Judul</th>
	// 			<th scope="col">Nama Mahasiswa</th>
	// 			<th scope="col">Nama Pembimbing</th>
	// 			<th scope="col">Tanggal</th>
	// 		  </tr>
	// 		</thead>
	// 		<tbody>';

	// 	for ($i = 0; $i < $jumlah_data; $i++ ) {
	// 		$no = $i + 1;
	// 		$peng_content .= '<tr>
	// 		<th scope="row">' . $no . '</th>
	// 		<td>' . $judul[$i] . '</td>
	// 		<td>' . $nama_mahasiswa[$i] . '</td>
	// 		<td>' . $nama_pembimbing[$i] . '</td>
	// 		<td>' . $tanggal[$i] . '</td>
	// 	  </tr>';
	// 	}

	// 	$peng_content .= '</tbody>
	// 	</table>';

	// 	$data = [
	// 		'judul' => $judul_peng,
	// 		'pengumuman' => $peng_content,
	// 		'tgl_dibuat' => $tgl_now,
	// 		'nip' => $this->session->nip,
	// 	];

	// 	$this->db->insert('pengumuman', $data);
	// 	// $query = "INSERT INTO pengumuman (
	// 	// 	judul,
	// 	// 	pengumuman,
	// 	// 	tgl_dibuat,
	// 	// 	nip
	// 	// ) 
	// 	// VALUES (
	// 	// 	$judul_peng,
	// 	// 	$peng_content,
	// 	// 	'$tgl_now',
	// 	// 	$peng_nip,
	// 	// ) ";

	// 	// $sql = $this->db->query($query);

	// 	$data_sucess = "success";

	// 	echo json_encode($data_sucess);
	// }

	public function keahlian(){

		$this->load->model('M_preferensi');

		$data['dataDosen'] = $this->M_preferensi->bidangkeahlian();
		$data['dataValue'] = $this->M_preferensi->bidangkeahlianvalue();

		if(isset($_POST['updateDosen'])){
			$this->M_preferensi->updateDosenKeahlian($_POST);
			$this->session->set_flashdata('alert', 'Data dosen berhasil diperbarui');
			redirect("Home");
		}

		$this->load->view('v_preferensi/v_bidangkeahlian',$data);
	}
	
}
