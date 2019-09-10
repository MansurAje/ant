<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Evaluasi extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_umum');
		$this->load->model('M_evaluasi');
		$this->load->model('M_permohonan');
	}
	
	public function permohonan(){  
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_evaluasi->getListPermohonan();
 		$data['v_content'] 	= 'member/evaluasi/listPermohonan';
		$this->load->view('member/layout', $data);
	}
	
	public function detail($id){
		$data['id']			= $id;
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_permohonan->getListJenisFile();
		$data['detailData']	= $this->M_evaluasi->getPermohonanById($id);
 		$data['v_content'] 	= 'member/evaluasi/detailEvaluasiPermohonan';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar($id){
		$data['id']			= $id;
		$data['listData']	= $this->M_evaluasi->getListEvaluasi();
		$data['userLogin'] 	= $this->session->userdata('loginData');
 		$data['v_content'] 	= 'member/evaluasi/listEvaluasi';
		$this->load->view('member/layout', $data);
	}
	
	public function action($id){
		$post = $this->input->post();
		
		if($post['evalueasi']){
			$action = $this->db->update("permohonan",array("status" => 1), array("id_pemohon" => $id));
		}elseif($post['tolak']){
			$action = $this->db->update("permohonan",array("status" => 99), array("id_pemohon" => $id));
		}
		
		if($action){
				$this->m_umum->generatePesan("Berhasil","berhasil");
				redirect("admin/evaluasi/daftar");
			}else{ 
				$this->m_umum->generatePesan("Gagal","gagal");
				redirect("admin/evaluasi/daftar");
		}
	}
}