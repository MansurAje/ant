<?php

class M_user extends CI_Model {
	
	function getAllUser(){
		$this->db->select("*");
		$this->db->from("user as usr");
		
		$query 	= $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function getDataLevel(){
		$this->db->select("*");
		$this->db->from("level_akses");
		$query 	= $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function getUserById($id){
		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("user_id",$id);
		$query 	= $this->db->get();
		$result = $query->row();
		return $result;
	}
}

