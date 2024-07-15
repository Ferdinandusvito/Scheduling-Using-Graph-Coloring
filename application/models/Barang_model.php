<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    private $_table = "barang";

    public $id_inventaris;
    public $nomor_inventaris;
    public $nama_barang;
    public $merk;
    public $seri;
    public $tanggal_cek;
    public $tanggal_pembelian;
    public $jumlah_barang;
    public $id_laboratorium;
    public $id_kondisi;
    public $id_status;
    public $keterangan;

    public function rules()
    {
        return [

        	['field' => 'nomor_inventaris',
            'label' => 'Nomor',
            'rules' => 'required'],

            ['field' => 'nama_barang',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'merk',
            'label' => 'Merk',
            'rules' => 'required'],

            ['field' => 'seri',
            'label' => 'Seri',
            'rules' => 'required'],

            ['field' => 'tanggal_pembelian',
            'label' => 'Tanggal Pembelian',
            'rules' => 'required'],

            ['field' => 'jumlah_barang',
            'label' => 'Price',
            'rules' => 'numeric'],

             ['field' => 'id_laboratorium',
            'label' => 'Laboratorium',
            'rules' => 'optional'],
            
            ['field' => 'id_kondisi',
            'label' => 'Kondisi',
            'rules' => 'optional'],

            ['field' => 'id_status',
            'label' => 'Status',
            'rules' => 'optional']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_inventaris" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nomor_inventaris = $post["nomor_inventaris"];
        $this->nama_barang = $post["nama_barang"];
        $this->merk = $post["merk"];
        $this->seri = $post["seri"];
        $this->tanggal_cek = $post["tanggal_cek"];
        $this->tanggal_pembelian = $post["tanggal_pembelian"];
        $this->jumlah_barang = $post["jumlah_barang"];
        $this->id_laboratorium = $post["id_laboratorium"];
        $this->id_kondisi = $post["id_kondisi"];
        $this->id_status = $post["id_status"];
        $this->keterangan = $post["keterangan"];
        $this->db->insert($this->_table, $this);
    }
    
        public function load_lab()
    {
     $query  = "SELECT * FROM laboratorium";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }

    public function load_status()
    {
     $query  = "SELECT * FROM status_barang";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }

    public function load_kondisi()
    {
     $query  = "SELECT * FROM kondisi_barang";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }


    public function update()
    {
        $post = $this->input->post();
        $this->id_inventaris = $post["id"];
        $this->nomor_inventaris = $post["nomor_inventaris"];
        $this->nama_barang = $post["nama_barang"];
        $this->merk = $post["merk"];
        $this->seri = $post["seri"];
        $this->tanggal_pembelian = $post["tanggal_pembelian"];
        $this->jumlah_barang = $post["jumlah_barang"];
        $this->id_laboratorium = $post["id_laboratorium"];
        $this->id_kondisi = $post["id_kondisi"];
        $this->id_status = $post["id_status"];
        $this->tanggal_cek = $post["tanggal_cek"];
        $this->keterangan = $post["keterangan"];
        $this->db->update($this->_table, $this, array('id_inventaris' => $post['id']));
    }


    public function delete($id_inventaris)
    {
        return $this->db->delete($this->_table, array("id_inventaris" => $id));
    }
    public function get_by_role()
  {
      $this->db->select('
          barang.*, kondisi_barang.id_kondisi AS id_kondisi, kondisi_barang.nama_kondisi
          ');
      $this->db->select('
        barang.*, status_barang.id_status AS id_status, status_barang.nama_status
        ');
      $this->db->select('
        barang.*, laboratorium.id_laboratorium AS id_laboratorium, laboratorium.nama_laboratorium
        ');

      $this->db->join('kondisi_barang', 'barang.id_kondisi = kondisi_barang.id_kondisi');
      $this->db->join('status_barang', 'barang.id_status = status_barang.id_status');
      $this->db->join('laboratorium', 'barang.id_laboratorium = laboratorium.id_laboratorium');
      $this->db->from('barang');
      $query = $this->db->get();
      return $query->result();
  }
     public function get_by_roles()
  {
      $this->db->select('
          barang.*, kondisi_barang.id_kondisi AS id_kondisi, kondisi_barang.nama_kondisi
          ');
      $this->db->select('
        barang.*, status_barang.id_status AS id_status, status_barang.nama_status
        ');
      $this->db->select('
        barang.*, laboratorium.id_laboratorium AS id_laboratorium, laboratorium.nama_laboratorium
        ');

      $this->db->join('kondisi_barang', 'barang.id_kondisi = kondisi_barang.id_kondisi');
      $this->db->join('status_barang', 'barang.id_status = status_barang.id_status');
      $this->db->join('laboratorium', 'barang.id_laboratorium = laboratorium.id_laboratorium');
      $this->db->from('barang');
      $this->db->where('barang.id_laboratorium', $this->session->userdata('id_laboratorium'));
      $query = $this->db->get();
      return $query->result();
  }
}