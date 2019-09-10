<?php

class M_node extends CI_Model {
	
	public function getData(){
		$this->db->select("*");
		$this->db->from("node");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getDataById($id){
		$this->db->select("*");
		$this->db->from("node");
		$this->db->where("node_id",$id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
}