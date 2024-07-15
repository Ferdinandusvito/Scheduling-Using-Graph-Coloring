<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penjadwalan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penjadwalan');
    }

    public function pekan_sidang()
    {
        $this->load->view('v_penjadwalan/v_pekan_sidang');
    }
    // linear programming
    public function linear_programming()
    {
        $this->load->model("m_penjadwalan");
        $data = $this->m_penjadwalan->getJadwalKelompokAll();
        $temp_data = $temp_data_group = [];
        foreach ($data as $key => $value) {
            $temp_data_group[$value['idta']] = [
                'idta' => $value['idta'],
                'topik' => $value['topik'],
                'judul' => $value['judul'],
                'pbb1' => $value['pbb1'],
                'pbb2' => $value['pbb2'],
                'pgj1' => $value['pgj1'],
                'pgj2' => $value['pgj2'],
            ];
            $temp_data[$value['idta']][] = $value;
        }
        $data['data_list'] = $temp_data;
        $data['data_list_group'] = $temp_data_group;



        $jadwal = $this->m_penjadwalan->getJadwalDosen();

        $date = array();
        $dosen = array();


        foreach ($jadwal as $row) {
            if (!in_array($row['tanggal'], $date)) {
                array_push($date, $row['tanggal']);
            }
            if (!in_array($row['nip'], $dosen)) {
                array_push($dosen, $row['nip']);
            }
        }

        $variables = array();
        foreach ($date as $tanggal) {
            foreach ($dosen as $dos) {
                array_push($variables, $dos);
            }
        }

        $data['variables'] = [
            'variables' => $variables
        ];

        //var_dump(json_encode($variables));
        //die();



        $this->load->view("v_penjadwalan/v_linearprogramming", $data);
    }

    // evolutionarry
    public function evolutionarry()
    {
        $this->load->model("m_penjadwalan");
        $data = $this->m_penjadwalan->getJadwalKelompokAll();

        $temp_data = $temp_data_group = [];
        foreach ($data as $key => $value) {
            $temp_data_group[$value['idta']] = [
                'idta' => $value['idta'],
                'nim' => $value['nim'],
                'id_bidang' => $value['id_bidang'],
                'topik' => $value['topik'],
                'judul' => $value['judul'],
                'pbb1' => $value['pbb1'],
                'pbb2' => $value['pbb2'],
                'pgj1' => $value['pgj1'],
                'pgj2' => $value['pgj2'],

            ];
            $temp_data[$value['idta']][] = $value;
        }
        $data['data_list'] = $temp_data;
        $data['data_list_group'] = $temp_data_group;

        //$data['dataDosen'] = $this->m_penjadwalan->getAllDataDosen();
        $data['calon_penguji'] = $this->m_penjadwalan->jadwalDosen_Dosen();
        $data['listRuangTA'] = $this->m_penjadwalan->getAllRuangTA();
        $this->load->view("v_penjadwalan/v_evolutionarry", $data);
    }

    public function create()
    {
        try {
            if (!$this->validate([
                'jadwal' => 'required',
                'shift' => 'required',
            ], [
                'jadwal' => [
                    'required' => 'Semua harus diisi'
                ],
                'shift' => [
                    'required' => 'Shift harus diisi'
                ]
            ])) {
                return view('jadwal\new', [
                    'validation' => $this->validator
                ]);
            } else {
                $jadwal = $this->request->getVar('jadwal');
                $shift = $this->request->getVar('shift');

                $jumlah = count($jadwal);

                $model = new JadwalModel();

                try {
                    for ($i = 0; $i < $jumlah; $i++) {
                        $items = array(
                            'jadwal' => $jadwal[$i],
                            'shift' => $shift[$i],
                        );
                        $save = $model->insert($items);
                    }
                } catch (\Exception $e) {
                    die($e->getMessage());
                }

                return redirect()->to('/jadwal');
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function checkJadwal()
    {
        // $data = 'hello';

        // $data  = $this->input->post('arr');
        $this->load->model("M_penjadwalan");

        $this->M_penjadwalan->tambahJadwal();

        $data = 'sukses?';

        echo json_encode($data);
    }

    public function penjadwalan()
    {
        //Cek jika yg login ada dosen

        $this->load->model('M_preferensi');

        $data = $this->M_preferensi->getJadwalKelompok();

        var_dump($data);
    }

    public function penjadwalanAdmin()
    {

        $this->load->model('M_penjadwalan');

        $data['gotit'] = $this->M_penjadwalan->getJadwalKelompokAll();

        $this->load->view('v_penjadwalan/v_linearprogramming', $data);
    }

    public function tambahPengumuman()
    {
        $judul =  $this->input->post('judul');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $nama_pembimbing = $this->input->post('nama_pembimbing');
        $tanggal = $this->input->post('tanggal');

        $jumlah_data = count($judul);

        $judul_peng = "Daftar Sidang";

        $tgl_now = date('Y-m-d H:i:s');

        $peng_content = '<table class="table">
			<thead>
			  <tr>
				<th scope="col">No.</th>
				<th scope="col">Judul</th>
				<th scope="col">Nama Mahasiswa</th>
				<th scope="col">Nama Pembimbing</th>
				<th scope="col">Tanggal</th>
			  </tr>
			</thead>
			<tbody>';

        for ($i = 0; $i < $jumlah_data; $i++) {
            $no = $i + 1;
            $peng_content .= '<tr>
			<th scope="row">' . $no . '</th>
			<td>' . $judul[$i] . '</td>
			<td>' . $nama_mahasiswa[$i] . '</td>
			<td>' . $nama_pembimbing[$i] . '</td>
			<td>' . $tanggal[$i] . '</td>
		  </tr>';
        }

        $peng_content .= '</tbody>
		</table>';

        $data = [
            'judul' => $judul_peng,
            'pengumuman' => $peng_content,
            'tgl_dibuat' => $tgl_now,
            'nip' => $this->session->nip,
        ];

        $this->db->insert('pengumuman', $data);


        $data_sucess = "success";

        echo json_encode($data_sucess);
    }

    public function daftarpenguji()
    {
        $this->load->model("m_penjadwalan");

        $data['daftarpenguji'] = $this->M_penjadwalan->daftarpenguji();
        // $temp_data = $temp_data_group = [];
        // $data['daftarpenguji'] = $temp_data;
        // $data['daftarpengujiall'] = $temp_data_group;



        $this->load->view("v_penjadwalan/v_daftarpenguji", $data);
    }

    public function insertDataScheduled()
    {
        $post = $this->input->post();
        //var_dump($post); die();
        $this->load->model('m_penjadwalan');
        $this->m_penjadwalan->insertDataPenjadwalan();
        redirect(base_url());
    }

    // public algoritma_linearprogramming(){
    // 	$this->load->model("m_penjadwalan");
    // 	$this->M_penjadwalan->algoritmaLinearProgramming();
    // }

    public function algoritma_linearprogramming($idta)
    {
        $this->load->model("m_penjadwalan");
        $this->load->library('session');

        $_SESSION['idta'] = $idta;


        $data['datata'] = $this->M_penjadwalan->algoritmaLinearProgrammingData($idta);
        $data['calonpenguji1'] = $this->M_penjadwalan->algoritmaLinearProgramming1($idta);
        $data['calonpenguji2'] = $this->M_penjadwalan->algoritmaLinearProgramming2($idta);
        $data['calonpenguji3'] = $this->M_penjadwalan->algoritmaLinearProgramming3($idta);


        $this->load->view("v_penjadwalan/v_opsipenguji", $data);
    }


    public function linear_programmingfinal()
    {

        $idta = $this->session->idta;

        $this->load->model("m_penjadwalan");

        $data['penguji'] = $this->M_penjadwalan->pilihdosen($idta);
        $hasil = $this->M_penjadwalan->hasilpenjadwalanfinal();
        $temp_data = $temp_data_group = [];
        foreach ($hasil as $key => $value) {
            $temp_data_group[$value['idta']] = [
                'idta' => $value['idta'],
                'topik' => $value['topik'],
                'judul' => $value['judul'],
                'pbb1' => $value['pbb1'],
                'pbb2' => $value['pbb2'],
                'pgj1' => $value['penguji1'],
                'pgj2' => $value['penguji2'],
                'pgj3' => $value['penguji3'],
                'ruangan' => $value['nama_ruangan'],
            ];
            $temp_data[$value['idta']][] = $value;
        }
        $data['data_list'] = $temp_data;
        $data['data_list_group'] = $temp_data_group;

        if ($data['penguji'] == NULL) {
            $this->session->set_flashdata('flash', 'Tidak Dapat Dijadwalkan');
        } else {
            $this->session->set_flashdata('flashy', 'Berhasil Dijadwalkan');
        }

        $this->load->view("v_penjadwalan/v_hasilpenjadwalan", $data);
    }
}
