<?php 
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Penelitian_kk extends MY_Controller {
	// pengajuan penelitian
	public function index()
	{
    $this->load->model("m_penelitian");
    $data['list_penelitian'] = $this->m_penelitian->load_penelitianPropose();
		
		$this->load->view('v_penelitian/v_kk/v_pengajuanPropose', $data);
  }

  public function pengajuanSetuju(){
    $this->load->model("m_penelitian");
    $data['list_penelitian'] = $this->m_penelitian->load_penelitianAccepted();
		
		$this->load->view('v_penelitian/v_kk/v_pengajuanAccepted', $data);
  }

  public function pengajuanDitolak(){
    $this->load->model("m_penelitian");
    $data['list_penelitian'] = $this->m_penelitian->load_penelitianRejected();
		
		$this->load->view('v_penelitian/v_kk/v_pengajuanRejected', $data);
  }

  // DETAIL
  public function penelitianDetail($id_penelitian){
		$this->load->model("m_penelitian");
    $data['detailPenelitian'] = $this->m_penelitian->load_penelitianSelect($id_penelitian);
    $data['dataAnggotaDsn'] 	= $this->m_penelitian->getAnggotaPeneliti($id_penelitian);
    $data['dataAnggotaMhs'] 	= $this->m_penelitian->getAnggotaPenelitiMhs($id_penelitian);

		$this->load->view('v_penelitian/v_kk/v_detail', $data);
  }

  // PROGRESS PENELITIAN
  public function Progress(){
    $this->load->model("m_penelitian");
    $data['list_penelitian'] = $this->m_penelitian->load_penelitianBerjalan();
		
		$this->load->view('v_penelitian/v_kk/v_penelitianBerjalan', $data);
  }

  public function verRiwayatPenelitian(){
    $this->load->model("m_penelitian");
    $data['list_penelitian'] = $this->m_penelitian->load_penelitianSelesaiVer();
    
    $this->load->view('v_penelitian/v_kk/v_riwayatPenelitianVer', $data);
  }
  
  public function monitoring(){
    $this->load->model('m_penelitian');
    $this->load->model('m_akun');
    $this->load->model('m_pengaturan');
    $data['load_dosen']       = $this->m_akun->load_dosen();
    $data['load_status']      = $this->m_pengaturan->load_status();
    $data['load_skema']       = $this->m_penelitian->load_skemaPenelitian();
    $skema        = (!empty($_POST['skema'])) ? $_POST['skema'] : '' ;
    $nip          = (!empty($_POST['nip'])) ? $_POST['nip'] : '' ;
    $thn_anggaran = (!empty($_POST['thn_anggaran'])) ? $_POST['thn_anggaran'] : '' ;
    $status       = (!empty($_POST['status'])) ? $_POST['status'] : '' ;
    $query  = "SELECT
                p.*, d.*, s.status AS status,
                s.status_kk AS status_kk,
                sp.skema AS skema,
                bd.nama_bidang AS bidang,
                jb.jabatan AS jab_fungsional
              FROM
                penelitian p
              JOIN dosen d ON d.nip = p.nip
              JOIN status s ON s.id_status = p.id_status
              JOIN bidang bd ON bd.id_bidang = d.id_bidang
              JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
              JOIN jabatan jb ON jb.id_jabatan = d.id_jabatan
              WHERE p.id_penelitian is not NULL
                    ";
    // var_dump($nip, $year);exit;
    if (!empty($skema)) {
        $query .= " AND (p.id_skema = '$skema')";
    }
    if (!empty($nip)) {
        $query .= " AND (p.nip = '$nip')";
    }
    if (!empty($thn_anggaran)) {
        $query .= " AND (p.thn_anggaran = '$thn_anggaran')";
    }
    if (!empty($status)) {
        $query .= " AND (p.id_status = '$status')";
    }

    $sql    = $this->db->query($query);
    $row	  = $sql->result_array();
    $data['dataPenelitian'] = $row;

    $this->load->view('v_penelitian/v_kk/v_monitoringPenelitian',$data);
  }

  // RIWAYAT PENELITIAN
  public function Riwayat(){
    $this->load->model("m_penelitian");
    $data['list_penelitian'] = $this->m_penelitian->load_penelitianSelesai();
		
		$this->load->view('v_penelitian/v_kk/v_penelitianSelesai', $data);
  }
  
  // ACCEPT & REJECT & FINISH
  public function accept(){
    $id_penelitian  = $this->db->escape($_POST['id_penelitian']);
    $nip            = $this->db->escape($_POST['nip']);
    $tgl_update     = date('Y-m-d'); 
    $tgl_notif      = date('Y-m-d H:i:s');
    $query          = "UPDATE penelitian SET id_status = 4 , tgl_disetujui = '$tgl_update' WHERE id_penelitian = $id_penelitian ";
    $sql            = $this->db->query($query);
    $query_notif    = "INSERT INTO notification(nip, created_date, id_penelitian) VALUES ($nip, '$tgl_notif', $id_penelitian) ";
    $sql_notif      = $this->db->query($query_notif);
    $this->session->set_flashdata('alert_setuju', 'Anda telah menyetujui pengajuan');
    
    redirect (base_url("/Penelitian_kk/pengajuanSetuju"));
  }
  
  public function reject(){
    $id_penelitian  = $this->db->escape($_POST['id_penelitian']);
    $alasan_tolak   = $this->db->escape($_POST['alasan_tolak']);
    $nip            = $this->db->escape($_POST['nip']);
    $tgl_update     = date('Y-m-d'); 
    $tgl_notif      = date('Y-m-d H:i:s');
    $query          = "UPDATE penelitian SET id_status = 5 , tgl_ditolak = '$tgl_update', alasan_tolak = $alasan_tolak WHERE id_penelitian = $id_penelitian ";
    $sql            = $this->db->query($query) ;
    $query_notif    = "INSERT INTO notification(nip, created_date, id_penelitian) VALUES ($nip, '$tgl_notif', $id_penelitian) ";
    $sql_notif      = $this->db->query($query_notif);
    $this->session->set_flashdata('alert_tolak', 'Anda telah menolak pengajuan');

    redirect (base_url("/Penelitian_kk/pengajuanDitolak"));
  }

  public function finish($id_penelitian){
    $tgl_update   = date('Y-m-d'); 
    $query        = "UPDATE penelitian SET id_status = 3 , tgl_selesai = '$tgl_update' WHERE id_penelitian = ".intval($id_penelitian);
    $sql          = $this->db->query($query) ;
    $this->session->set_flashdata('alert_finish', 'Penelitian telah dinyatakan selesai');
    $query_notif = "UPDATE notification SET status = 0 WHERE id_penelitian = $id_penelitian ";
    $sql_notif = $this->db->query($query_notif);

    redirect (base_url("/Penelitian_kk/Riwayat"));
  }

  public function berjalan($id_penelitian){
    $tgl_update   = date('Y-m-d'); 
    $query        = "UPDATE penelitian SET id_status = 2 , tgl_berjalan = '$tgl_update' WHERE id_penelitian = ".intval($id_penelitian);
    $sql          = $this->db->query($query) ;
    $query_notif  = "UPDATE notification SET status = 0 WHERE id_penelitian = $id_penelitian ";
    $sql_notif    = $this->db->query($query_notif);

    redirect (base_url("/Penelitian_kk/pengajuanSetuju"));
  }

  function countPenelitian()
  {
      $this->load->model("m_penelitian");
      $data = $this->m_penelitian->countPenelitian();
      header('Content-Type: application/json');
      echo json_encode( $data );
  }

  public function exportExcel(){
    $id_skema       = (!empty($_POST['id_skema'])) ? $_POST['id_skema'] : '' ;
    $nip            = (!empty($_POST['nip'])) ? $_POST['nip'] : '' ;
    $thn_anggaran   = (!empty($_POST['thn_anggaran'])) ? $_POST['thn_anggaran'] : '' ;
    $status         = (!empty($_POST['status'])) ? $_POST['status'] : '' ;
    $query  = "SELECT
                p.*, d.*, s.status AS status,
                s.status_kk AS status_kk,
                sp.skema AS skema,
                bd.nama_bidang AS bidang,
                jb.jabatan AS jab_fungsional
              FROM
                penelitian p
              JOIN dosen d ON d.nip = p.nip
              JOIN status s ON s.id_status = p.id_status
              JOIN bidang bd ON bd.id_bidang = d.id_bidang
              JOIN skema_penelitian sp ON sp.id_skema = p.id_skema
              JOIN jabatan jb ON jb.id_jabatan = d.id_jabatan
              WHERE p.id_penelitian is not NULL
                    ";
    if (!empty($id_skema)) {
      $query .= " AND (p.id_skema = '$id_skema')";
    }
    if (!empty($nip)) {
      $query .= " AND (p.nip = '$nip')";
    }
    if (!empty($thn_anggaran)) {
      $query .= " AND (p.thn_anggaran = '$thn_anggaran')";
    }
    if (!empty($status)) {
      $query .= " AND (p.id_status = '$status')";
    }
    
    $sql    = $this->db->query($query);
    $row	  = $sql->result_array();

    $spreadsheet = new Spreadsheet;
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'Judul Penelitian')
                ->setCellValue('C1', 'Skema Penelitian')
                ->setCellValue('D1', 'Tahun Anggaran')
                ->setCellValue('E1', 'Dana Internal')
                ->setCellValue('F1', 'Dana Eksternal')
                ->setCellValue('G1', 'Ketua Peneliti');          
    $kolom = 2;
    $nomor = 1;
    foreach($row as $row) {
      $spreadsheet->setActiveSheetIndex(0)
                  ->setCellValue('A' . $kolom, $nomor)
                  ->setCellValue('B' . $kolom, $row['judul_penelitian'])
                  ->setCellValue('C' . $kolom, $row['skema'])
                  ->setCellValue('D' . $kolom, $row['thn_anggaran'])
                  ->setCellValue('E' . $kolom, number_format($row['dana_internal']))
                  ->setCellValue('F' . $kolom, number_format($row['dana_luar']))
                  ->setCellValue('G' . $kolom, $row['kode_dosen']);
      $kolom++;
      $nomor++;
    }
      $writer = new Xlsx($spreadsheet);
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="Data Penelitian.xlsx"');
      header('Cache-Control: max-age=0');

      $writer->save('php://output');

  }




    
}

?>