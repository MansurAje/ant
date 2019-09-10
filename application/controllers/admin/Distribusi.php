<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('M_depot');
        $this->load->model('M_pelanggan');
    }
	
	public function index(){
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['customers']	= $this->M_pelanggan->listPelanggan();
		$data['node']	= $this->M_depot->get_list_node();
        $data['v_content'] = 'member/distribusi/add';
        $this->load->view('member/layout', $data);
	}
	
}
