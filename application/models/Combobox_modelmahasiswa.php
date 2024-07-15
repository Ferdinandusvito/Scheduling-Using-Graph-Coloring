<?php

class Combobox_modelmahasiswa extends CI_model{
	function getlab(){
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
		function getstatus(){
		$data = array();
		$query = $this->db->get('cek_pinjam');
		if ($query->num_rows() >0) {
			foreach ($query->result_array() as $row){
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}
}