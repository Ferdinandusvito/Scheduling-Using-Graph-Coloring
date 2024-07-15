<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    private $_table = "pengajuan_barang";

    public $id_pengajuan;
    public $nama_dosen;
    public $nip;
    public $id_laboratorium;
    public $tanggal_pengajuan;
    public $file;
    public $nama_barang;
    public $spek;
    public $vol;
    public $vol_datang;
    public $id_status;
    public $id_cek;
    public $keterangan;
    
    public function rules()
    {
        return [
            ['field' => 'nama_dosen',
            'label' => 'Dosen',
            'rules' => 'optional'],

            ['field' => 'nip',
            'label' => 'NIP',
            'rules' => 'optional'],

             ['field' => 'id_laboratorium',
            'label' => 'Laboratorium',
            'rules' => 'optional'],

            ['field' => 'tanggal_pengajuan',
            'label' => 'Tanggal Pengajuan',
            'rules' => 'required'],

            ['field' => 'file',
            'label' => 'File',
            'rules' => 'required'],

            ['field' => 'nama_barang',
            'label' => 'Nama Barang',
            'rules' => 'required'],


            ['field' => 'spek',
            'label' => 'Spesifikasi',
            'rules' => 'required'],

            ['field' => 'vol',
            'label' => 'Vol',
            'rules' => 'required'],


            ['field' => 'id_status',
            'label' => 'Status',
            'rules' => 'required'],

            ['field' => 'id_cek',
            'label' => 'Cek',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pengajuan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $nama_dosen = $this->nama_dosen = $post["nama_dosen"];
        $nip = $this->nip = $post["nip"];
        $id_laboratorium = $this->id_laboratorium = $post["id_laboratorium"];
        $tanggal_pengajuan = $this->tanggal_pengajuan = $post["tanggal_pengajuan"];
        $file = $this->file = $post["file"];
        $nama_barang = $this->nama_barang = $post["nama_barang"];
        // $this->spek = $post["spek"];
        // $this->vol = $post["vol"];
        $id_status = $this->id_status = $post["id_status"];;
        $id_cek = $this->id_cek = $post["id_cek"];;
        $nip            = $this->session->userdata("nip");
        $data = [];
        for ($i=0; $i < count($nama_barang); $i++) { 
            $data[] = [
                'nama_dosen' => $nama_dosen,
                'nip' => $nip,
                'id_laboratorium' => $id_laboratorium,
                'tanggal_pengajuan' => $tanggal_pengajuan,
                'file' => $file,
                'nama_barang' => $nama_barang[$i],
                'spek' => $spek[$i],
                'vol' => $vol[$i],
                'id_status' => $id_status,
                'id_cek' => $id_cek
            ];
        }
        var_dump($data);exit;
        $this->db->insert_batch($this->_table, $data);
    }
    
        public function load_lab()
    {
     $query  = "SELECT * FROM laboratorium";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }

    public function load_status()
    {
     $query  = "SELECT * FROM status_pengajuan";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }

    public function load_cek()
    {
     $query  = "SELECT * FROM cek_barang";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }

    public function load_tanggal()
    {
     $query  = "SELECT tanggal_pengajuan FROM pengajuan_barang GROUP BY tanggal_pengajuan";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }


    public function update($id)
    {
        $post = $this->input->post();
        $this->id_pengajuan = $id;
        $this->nama_dosen = $post["nama_dosen"];
        $this->nip = $post["nip"];
        $this->id_laboratorium = $post["id_laboratorium"];
        $this->tanggal_pengajuan = $post["tanggal_pengajuan"];
        $this->file = $post["file"];
        $this->nama_barang = $post["nama_barang"];
        $this->spek = $post["spek"];
        $this->vol = $post["vol"];
        $this->vol_datang = $post["vol_datang"];
        $this->id_status = $post["id_status"];
        $this->id_cek = $post["id_cek"];
        $this->keterangan = $post["keterangan"];
        $this->db->update($this->_table, $this, array('id_pengajuan' => $id));
    }


    public function delete($id_pengajuan)
    {
        return $this->db->delete($this->_table, array("id_pengajuan" => $id));
    }
    public function get_by_role()
  {
      $this->db->select('
        pengajuan_barang.*, laboratorium.id_laboratorium AS id_laboratorium, laboratorium.nama_laboratorium
        ');

        $this->db->select('
        pengajuan_barang.*, status_pengajuan.id_status AS id_status, status_pengajuan.nama_status
        ');

        $this->db->select('
        pengajuan_barang.*, cek_barang.id_cek AS id_cek, cek_barang.nama_cek
        ');

      $this->db->join('laboratorium', 'pengajuan_barang.id_laboratorium = laboratorium.id_laboratorium');
      $this->db->join('status_pengajuan', 'pengajuan_barang.id_status = status_pengajuan.id_status');
      $this->db->join('cek_barang', 'pengajuan_barang.id_cek = cek_barang.id_cek');
      $this->db->from('pengajuan_barang');
      $query = $this->db->get();
      return $query->result();
  }
    public function get_by_roles()
  {
      $this->db->select('
        pengajuan_barang.*, laboratorium.id_laboratorium AS id_laboratorium, laboratorium.nama_laboratorium
        ');

        $this->db->select('
        pengajuan_barang.*, status_pengajuan.id_status AS id_status, status_pengajuan.nama_status
        ');

        $this->db->select('
        pengajuan_barang.*, cek_barang.id_cek AS id_cek, cek_barang.nama_cek
        ');

        $this->db->select('
        pengajuan_barang.*, dosen.nip AS nip, dosen.nip
        ');

      $this->db->join('laboratorium', 'pengajuan_barang.id_laboratorium = laboratorium.id_laboratorium');
      $this->db->join('status_pengajuan', 'pengajuan_barang.id_status = status_pengajuan.id_status');
      $this->db->join('cek_barang', 'pengajuan_barang.id_cek = cek_barang.id_cek');
      $this->db->join('dosen', 'pengajuan_barang.nip = dosen.nip');
      $this->db->from('pengajuan_barang');
      $this->db->where('pengajuan_barang.nip', $this->session->userdata('nip'));
      $query = $this->db->get();
      return $query->result();
  }
 
}