<?php

class M_profile extends CI_Model {
	
	public function checkData(){
		$this->db->select("*");
		$this->db->from("profile");
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}
}