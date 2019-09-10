<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('m_login');
        
    }
	
	public function index()
	{
        $this->load->view('member/Login');
	}
		
	public function doLogin() {
        $dataPost = $this->input->post();
        if ($this->m_login->checkLogin($dataPost['Username'], $dataPost['Password'])) {
            redirect('admin/dashboard');
		/* }elseif($this->m_login->checkLoginPemohon($dataPost['Username'], $dataPost['Password'])){
			redirect('admin/dashboard'); */
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');
            redirect('admin/login');
        }
    }
	
    function logout() {
        $this->session->unset_userdata('loginData');
        redirect('admin/login');
    }
     
	function doRegister(){
		$post 	= $this->input->post();
		//debugCode($post);
		$dataArray = array(
			"nama"		=> $post['nama'],
			"email"		=> $post['email'],
			"username"	=> $post['username'],
			"password"	=> md5($post['password'])
		);
		$insert = $this->db->insert("register",$dataArray);
		if($insert){
			$this->session->set_flashdata("RegisterBerhasil","Ya");
			redirect('admin/login');
		}else{
			$this->session->set_flashdata("RegisterGagal","Ya");
			redirect('admin/login');
		}
	}
}
