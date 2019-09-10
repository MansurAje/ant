<?php

class M_saran extends CI_Model {
	
	public function getSaran(){
		$this->db->select("*");
		$this->db->from("saran");
		$query	= $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getSaranById($id){
		$this->db->select("*");
		$this->db->from("saran");
		$this->db->where("id_saran",$id);
		$query	= $this->db->get();
		$result = $query->row();
		return $result;
	}
}