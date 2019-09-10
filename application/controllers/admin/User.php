<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	// protected $view = "petugas";
	
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_umum','M_user'));
    }

    public function daftar(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->M_user->getAllUser();
        $data['v_content'] = 'member/user/list';
        $this->load->view('member/layout', $data);

    }

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/user/add';
        $this->load->view('member/layout', $data);
    }
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_user->getUserById($id);
		$data['v_content']  = 'member/user/edit';
		$this->load->view('member/layout', $data);
    }

    public function doAdd(){
        $post = $this->input->post();
		$dataArray = array(
			"user_fullname"		=> $post['nama'],
			"user_alamat"	    => $post['alamat'],
			"user_tlp"	        => $post['ntlp'],
			"user_email"		=> $post['email'],
			"user_username"	    => $post['username'],
			"user_password"	    => md5($post['password']),
			"level"	    		=> $post['level']
		);
		$insert = $this->db->insert("user",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
		}
        redirect('admin/user/daftar');
    }
	
	public function doUpdate($id){
        $post = $this->input->post();
		if($post['password'] != ""){
			$dataArray = array(
				"user_fullname"		=> $post['nama'],
				"user_alamat"	    => $post['alamat'],
				"user_tlp"	        => $post['ntlp'],
				"user_email"		=> $post['email'],
				"user_username"	    => $post['username'],
				"user_password"	    => md5($post['password']),
				"level"	    		=> $post['level']
			);
		}else{
			$dataArray = array(
				"user_fullname"		=> $post['nama'],
				"user_alamat"	    => $post['alamat'],
				"user_tlp"	        => $post['ntlp'],
				"user_email"		=> $post['email'],
				"user_username"	    => $post['username'],
				"level"	    		=> $post['level']
			);
		}
		
		$update = $this->db->update("user",$dataArray,array("user_id" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
		}
        redirect('admin/user/daftar');
    }

    public function doDelete($id){
        $hapus = $this->db->delete('user',array('user_id' => $id));
        if($hapus){
          $this->m_umum->generatePesan("Berhasil menghapus data","berhasil");  
        }else{
           $this->m_umum->generatePesan("Gagal menghapus data","gagal");   
        }
        redirect('admin/user/daftar');
    }

}