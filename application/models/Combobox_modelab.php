<?php

class Combobox_modelab extends CI_model{
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
	function getkondisi(){
		$data = array();
		$query = $this->db->get('kondisi_barang');
		if ($query->num_rows() >0) {
			foreach ($query->result_array() as $row){
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}
	function getstatus() {
		$data = array();
		$query = $this->db->get('status_barang');
		if ($query->num_rows() >0) {
			foreach ($query->result_array() as $row){
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}
}