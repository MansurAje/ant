<?php

class M_pelanggan extends CI_Model {
	
	public function getData(){
		$this->db->select("*");
		$this->db->from("pelanggan");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getDataById($id){
		$this->db->select("*");
		$this->db->from("pelanggan");
		$this->db->where("pelanggan_id",$id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
}