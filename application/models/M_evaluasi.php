<?php

class M_evaluasi extends CI_Model {
	
	public function getListPermohonan(){
		$this->db->select("*");
		$this->db->from("permohonan");
		$this->db->where("status",0);
		$query 	= $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getPermohonanById($id){
		$this->db->select("*");
		$this->db->from("permohonan");
		$this->db->where("id_pemohon",$id);
		$query 	= $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	public function getListEvaluasi(){
		$this->db->select("*");
		$this->db->from("permohonan");
		$this->db->where("status",1);
		$query 	= $this->db->get();
		$result = $query->result();
		return $result;
	}
}