<?php
class Jam_model extends CI_Model {
    
    protected $table = 'tb_jam';
    protected $kode = 'kode_jam';
    
    public function tampil()
    {   

        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function get_jam( $ID = null )
    {
        $query = $this->db->get_where($this->table, array ( $this->kode => $ID ));                
        return $query->row();
    }
            
    public function tambah($fields)
    {
        $this->db->insert($this->table, $fields);        
    }
    
    public function ubah($fields, $ID)
    {                          
        $this->db->update($this->table, $fields, array($this->kode => $ID));                  
    }
    
    public function hapus( $ID )
    {
        $this->db->delete($this->table, array($this->kode=> $ID));
    }
     public function hapus_relasi( $ID )
    {
        $this->db->delete('tb_waktu', array($this->kode=> $ID));
    }
}