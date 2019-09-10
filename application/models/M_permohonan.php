<?php

class M_permohonan extends CI_Model {
	
	public function getRestoDetail($id){
		$this->db->select("*");
		$this->db->from("permohonan");
		$this->db->where("id_pemohon",$id);
		$query 	= $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	public function getListJenisFile(){
		$this->db->select("*");
		$this->db->from("jenis_file");
		$query 	= $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function listPermohonanByUid($id){
		$this->db->select("*");
		$this->db->from("permohonan");
		$this->db->where("id_reg",$id);
		$query 	= $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function listPermohonanById($id){
		$this->db->select("*");
		$this->db->from("permohonan");
		$this->db->where("id_pemohon",$id);
		$query 	= $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	public function getDataFileById($id1,$id2){
		$this->db->select("*");
		$this->db->from("permohonan_file");
		$this->db->where("id_pemohon",$id1);
		$this->db->where("id_jenis",$id2);
		$query 	= $this->db->get();
		$result = $query->row();
		return $result;
	}
}