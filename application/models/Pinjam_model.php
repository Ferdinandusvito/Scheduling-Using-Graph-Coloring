<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_model extends CI_Model
{
    private $_table = "peminjaman";

    public $pinjam_id;
    public $nama_mahasiswa;
    public $nim;
    public $id_laboratorium;
    public $nama_barang;
    public $spek;
    public $vol;
    public $tanggal_peminjaman;
    public $tanggal_kembali;
    public $tanggal_update;
    public $id_pinjam;
    public $file_peminjaman;

    public function rules()
    {
        return [
            ['field' => 'nama_mahasiswa',
            'label' => 'Nama mahasiswa',
            'rules' => 'required'],

            ['field' => 'nim',
            'label' => 'NIM',
            'rules' => 'required'],

            ['field' => 'id_laboratorium',
            'label' => 'id_inventaris',
            'rules' => 'required'],


             ['field' => 'tanggal_peminjaman',
            'label' => 'Tanggal Peminjaman',
            'rules' => 'required'],

            ['field' => 'tanggal_kembali',
            'label' => 'Tanggal Pengembalian',
            'rules' => 'required'],

            ['field' => 'tanggal_update',
            'label' => 'Tanggal Pengembalian Update',
            'rules' => 'required'],

            ['field' => 'file_peminjaman',
            'label' => 'File Peminjaman',
            'rules' => 'numeric'],

            ['field' => 'id_status',
            'label' => 'Status',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pinjam_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $nim = $this->nim = $post["nim"];
        $this->id_laboratorium = $post["id_laboratorium"];
        $this->tanggal_peminjaman = $post["tanggal_peminjaman"];
        $this->tanggal_kembali = $post["tanggal_kembali"];
        $this->tanggal_update = $post["tanggal_update"];
        $this->file_peminjaman = $post["file_peminjaman"];
        $this->id_pinjam = $post ["id_pinjam"];
        $nim            = $this->session->userdata("nim");
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
     $query  = "SELECT * FROM cek_pinjam";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }
 public function load_tanggalpinjam()
    {
     $query  = "SELECT tanggal_peminjaman FROM peminjaman GROUP BY tanggal_peminjaman";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }
public function load_tanggaldatang()
    {
     $query  = "SELECT tanggal_kembali FROM peminjaman GROUP BY tanggal_kembali";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }

 public function load_tanggalupdate()
    {
     $query  = "SELECT tanggal_update FROM peminjaman GROUP BY tanggal_update";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->pinjam_id = $id;
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $this->nim = $post["nim"];
        $this->id_laboratorium = $post["id_laboratorium"];
        $this->nama_barang = $post["nama_barang"];
        $this->spek = $post["spek"];
        $this->vol = $post["vol"];
        $this->tanggal_peminjaman = $post["tanggal_peminjaman"];
        $this->tanggal_kembali = $post["tanggal_kembali"];
        $this->tanggal_update = $post["tanggal_update"];
        $this->file_peminjaman = $post["file_peminjaman"];
        $this->id_pinjam = $post["id_pinjam"];
        $this->db->update($this->_table, $this, array('pinjam_id' =>$id));
    }
    public function delete($id)
    {
        // return $this->db->delete($this->_table, array("pinjam_id" => $id));
        $query  = "DELETE  FROM peminjaman WHERE pinjam_id = '$id'";
            $sql    = $this->db->query($query);
            return $sql->result_array();
    }
     public function get_by_role()
    {
      $this->db->select('
          peminjaman.*, laboratorium.id_laboratorium AS id_laboratorium, laboratorium.nama_laboratorium
          ');
      $this->db->select('
          peminjaman.*, cek_pinjam.id_pinjam AS id_pinjam, cek_pinjam.nama_pinjam
          ');


       $this->db->join('laboratorium', 'peminjaman.id_laboratorium = laboratorium.id_laboratorium');
       $this->db->join('cek_pinjam', 'peminjaman.id_pinjam = cek_pinjam.id_pinjam');
       

       $this->db->from('peminjaman');
        $this->db->where('peminjaman.nim', $this->session->userdata('nim'));
      $query = $this->db->get();
      return $query->result();
    }

    public function get_by_roles()
    {
      $this->db->select('
          peminjaman.*, laboratorium.id_laboratorium AS id_laboratorium, laboratorium.nama_laboratorium
          ');
      $this->db->select('
          peminjaman.*, cek_pinjam.id_pinjam AS id_pinjam, cek_pinjam.nama_pinjam
          ');

       $this->db->join('laboratorium', 'peminjaman.id_laboratorium = laboratorium.id_laboratorium');
       $this->db->join('cek_pinjam', 'peminjaman.id_pinjam = cek_pinjam.id_pinjam');
       $this->db->from('peminjaman');
       $this->db->where('peminjaman.id_laboratorium', $this->session->userdata('id_laboratorium'));
      $query = $this->db->get();
      return $query->result();
    }
        public function getByLab()
    {
        $id_laboratorium = $this->session->userdata('id_laboratorium');
        return $this->db->get_where($this->_table, ["id_laboratorium" => $id_laboratorium])->row();
    }



}
