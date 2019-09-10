<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_umum','M_pelanggan'));
    }
	
	public function add(){
		$data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/pelanggan/add';
        $this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_pelanggan->getData();
        $data['v_content']  = 'member/pelanggan/list';
        $this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_pelanggan->getDataById($id);
        $data['v_content']  = 'member/pelanggan/edit';
        $this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		
		$dataArray = array(
			"pelanggan_name"	    => $post['nama'],
			"pelanggan_latlng"	=> $post['latlng'],
			"pelanggan_notelp"			=> $post['pelanggan_notelp'],
		);
		$insert = $this->db->insert("pelanggan",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
		} 
        redirect('admin/pelanggan/daftar');
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		
		$dataArray = array(
			"pelanggan_name"	    => $post['nama'],
			"pelanggan_latlng"	=> $post['latlng'],
			"pelanggan_notelp"			=> $post['pelanggan_notelp'],
		);
		$update = $this->db->update("pelanggan",$dataArray,ARRAY("pelanggan_id" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
		} 
        redirect('admin/pelanggan/daftar');
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("pelanggan",ARRAY("pelanggan_id" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil delete data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal delete data","gagal");
		} 
        redirect('admin/pelanggan/daftar');
	}
	
	
}