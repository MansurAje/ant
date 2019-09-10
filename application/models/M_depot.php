<?php

class M_depot extends CI_Model {
	
	public function listDepot(){
		$this->db->select("*");
		$this->db->from("depot");
		$query	= $this->db->get();
		$result = $query->result();
		return $result; 
	}
	
	public function getDepotById($id){
		$this->db->select("*");
		$this->db->from("depot");
		$this->db->where("depot_id",$id);
		$query	= $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	function get_list_node(){
		$this->db->select("*");
		$this->db->from("node");
		$query 	= $this->db->get();
		$result = $query->result();
		return $result;
	}
	
}