<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Node extends CI_Controller {
	
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_umum','M_node'));
    }
	
	public function add(){
		$data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/node/add';
        $this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_node->getData();
        $data['v_content']  = 'member/node/list';
        $this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_node->getDataById($id);
        $data['v_content']  = 'member/node/edit';
        $this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		
		$dataArray = array(
			"node_name"	    => $post['nama'],
			"node_latlng"	=> $post['latlng'],
			"node_notelp"			=> $post['node_notelp'],
		);
		$insert = $this->db->insert("node",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
		} 
        redirect('admin/node/daftar');
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		
		$dataArray = array(
			"node_name"	    => $post['nama'],
			"node_latlng"	=> $post['latlng'],
			"node_notelp"			=> $post['node_notelp'],
		);
		$update = $this->db->update("node",$dataArray,ARRAY("node_id" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
		} 
        redirect('admin/node/daftar');
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("node",ARRAY("node_id" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil delete data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal delete data","gagal");
		} 
        redirect('admin/node/daftar');
	}
	
	
}