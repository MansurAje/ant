<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class vertifikasi extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_umum');
		$this->load->model('M_vertifikasi');
		$this->load->model('M_permohonan');
	}

	public function permohonan(){  
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_vertifikasi->getListPermohonan();
 		$data['v_content'] 	= 'member/vertifikasi/listPermohonanV';
		$this->load->view('member/layout', $data);
	}
	
	public function detail($id){
		$data['id']			= $id;
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_permohonan->getListJenisFile();
		$data['detailData']	= $this->M_vertifikasi->getPermohonanById($id);
 		$data['v_content'] 	= 'member/vertifikasi/detailVertifikasi';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar(){  
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_vertifikasi->getListData();
 		$data['v_content'] 	= 'member/vertifikasi/listVertifikasi';
		$this->load->view('member/layout', $data);
	}
	
	public function action($id){
		$post = $this->input->post();
		
		if($post['vertifikasi']){
			$action = $this->db->update("permohonan",array("status" => 2), array("id_pemohon" => $id));
		}elseif($post['tolak']){
			$action = $this->db->update("permohonan",array("status" => 99), array("id_pemohon" => $id));
		}
		
		if($action){
				$this->m_umum->generatePesan("Berhasil","berhasil");
				redirect("admin/vertifikasi/daftar");
			}else{ 
				$this->m_umum->generatePesan("Gagal","gagal");
				redirect("admin/vertifikasi/daftar");
		}
	}
}
	