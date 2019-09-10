<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Depot extends CI_Controller {
	
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_umum','M_depot'));
    }
	
	public function add(){
		$data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/depot/add';
        $this->load->view('member/layout', $data);
	}
	 
	public function daftar(){ 
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_depot->listDepot();
        $data['v_content']  = 'member/depot/daftar';
        $this->load->view('member/layout', $data);
	}
	
	public function edit($id){ 
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_depot->getDepotById($id);
        $data['v_content']  = 'member/depot/edit';
        $this->load->view('member/layout', $data);
	}
	
	
	public function doAdd(){
		$post = $this->input->post();
		/* debugCode($post); */
		$dataArray = array(
			"depot_nama"	=> $post['depot'],
			"depot_alamat"	=> $post['alamat'],
			"depot_pic"	    => $post['pic'],
			"depot_notlp"	=> $post['noTelp'],
			"depot_latlng"	=> $post['latlng']
		);
		$insert = $this->db->insert("depot",$dataArray);
		if($insert){ 
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
		} 
        redirect('admin/depot/daftar');
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		/* debugCode($post); */
		$dataArray = array(
			"depot_nama"	=> $post['depot'],
			"depot_alamat"	=> $post['alamat'],
			"depot_pic"	    => $post['pic'],
			"depot_notlp"	=> $post['noTelp'],
			"depot_latlng"	=> $post['latlng']
		);
		$update = $this->db->update("depot",$dataArray,array("depot_id" => $id));
		if($update){ 
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
		} 
        redirect('admin/depot/daftar');
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("depot",array("depot_id" => $id));
		if($delete){ 
			$this->m_umum->generatePesan("Berhasil delete data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal delete data","gagal");
		} 
        redirect('admin/depot/daftar');
	}
}