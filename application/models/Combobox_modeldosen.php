<?php

class Combobox_modeldosen extends CI_model{
	function getstatus(){
		$data = array();
		$query = $this->db->get('status_pengajuan');
		if ($query->num_rows() >0) {
			foreach ($query->result_array() as $row){
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}
		function getlaboratorium(){
		$data = array();
		$query = $this->db->get('laboratorium');
		if ($query->num_rows() >0) {
			foreach ($query->result_array() as $row){
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}
	function getcek(){
		$data = array();
		$query = $this->db->get('cek_barang');
		if ($query->num_rows() >0) {
			foreach ($query->result_array() as $row){
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}
}