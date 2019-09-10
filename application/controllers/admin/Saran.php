<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Saran extends CI_Controller {
		
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_umum','M_saran'));
		$this->load->library("ckeditor");
    }
	
	function index(){
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_saran->getSaran();
 		$data['v_content'] 	= 'member/saran/listSaran';
		$this->load->view('member/layout', $data);
	}
	
	function detail($id){
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['dataSaran']	= $this->M_saran->getSaranById($id);
 		$data['v_content'] 	= 'member/saran/detailSaran';
		$this->load->view('member/layout', $data);
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("saran",array("id_saran" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil delete data","berhasil");
			redirect('admin/saran');
		}else{
			$this->m_umum->generatePesan("Gagal delete data","gagal");
			redirect('admin/saran');
		}
	}
}