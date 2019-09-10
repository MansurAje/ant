<?php

class M_berita extends CI_Model {
	
	public function listBerita(){
		$this->db->select("*");
		$this->db->from("berita");
		$query 	= $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function beritaById($id){
		$this->db->select("*");
		$this->db->from("berita");
		$this->db->where("id_berita",$id);
		$query 	= $this->db->get();
		$result = $query->row();
		return $result;
	}
}