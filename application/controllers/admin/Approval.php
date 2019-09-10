<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Approval extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_umum');
		$this->load->model('M_approval');
		$this->load->model('M_permohonan');
	}
	
	public function permohonan(){  
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_approval->getListPermohonan();
 		$data['v_content'] 	= 'member/approval/listPermohonanApp';
		$this->load->view('member/layout', $data);
	}
	
	public function detail($id){
		$data['id']			= $id;
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_permohonan->getListJenisFile();
		$data['detailData']	= $this->M_approval->getPermohonanById($id);
 		$data['v_content'] 	= 'member/approval/detailApproval';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar(){  
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_approval->getListData();
 		$data['v_content'] 	= 'member/approval/listApproval';
		$this->load->view('member/layout', $data);
	}
	
	public function action($id){
		$post = $this->input->post();
		
		if($post['approve']){
			$action = $this->db->update("permohonan",array("status" => 3), array("id_pemohon" => $id));
		}elseif($post['tolak']){
			$action = $this->db->update("permohonan",array("status" => 99), array("id_pemohon" => $id));
		}
		
		if($action){
				$this->m_umum->generatePesan("Berhasil","berhasil");
				redirect("admin/approval/daftar");
			}else{ 
				$this->m_umum->generatePesan("Gagal","gagal");
				redirect("admin/approval/daftar");
		}
	}
}