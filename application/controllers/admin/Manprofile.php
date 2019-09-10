<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manprofile extends CI_Controller {
		
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_umum','M_profile'));
		$this->load->library("ckeditor");
    }
	
	public function index(){
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['detailData']	= $this->M_profile->checkData();
        $data['v_content'] = 'member/manprofile/profile';
        $this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		/* debugCode($_FILES); */
		$file_foto1 = "";
		$file_foto2 = "";
		$check = $this->M_profile->checkData();
		if($_FILES['userfile1']['name']!=""){
			$path 	= 'assets/upload/profile/';
			if (!is_dir($path)){
				mkdir($path);
			}
			$uploadfile               = explode(".", $_FILES["userfile1"]["name"]);
			/* debugCode($uploadfile); */
			$file_foto1               = 'logo.' . end($uploadfile);
			$config['upload_path']    = $path;
			$config['allowed_types']  = 'gif|jpg|png|jpeg';
			$config['file_name']      = $file_foto1; // set the name here
			$config['overwrite']      = TRUE;
			$this->load->library('upload', $config);
			$this->load->library('image_lib');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('userfile1')){
				$error                   = array('error' => $this->upload->display_errors());
				vd($error);
			}else{
				$image_data              =   $this->upload->data();
				$configer                =  array(
					'image_library'          => 'gd2',
					'source_image'           =>  $image_data['full_path'],
					/* 'maintain_ratio'         =>  TRUE,
					'width'                  =>  670,
					'height'                 =>  700, */
					);
				$this->image_lib->clear();
				$this->image_lib->initialize($configer);
				$this->image_lib->resize();
			}
		}else{
			$file_foto1 = $check->logo;
		}
		
		if($_FILES['userfile2']['name']!=""){
			$path 	= 'assets/upload/profile/';
			if (!is_dir($path)){
				mkdir($path);
			}
			$uploadfile               = explode(".", $_FILES["userfile2"]["name"]);
			/* debugCode($uploadfile); */
			$file_foto2               = 'struktur.' . end($uploadfile);
			$config['upload_path']    = $path;
			$config['allowed_types']  = 'gif|jpg|png|jpeg';
			$config['file_name']      = $file_foto2; // set the name here
			$config['overwrite']      = TRUE;
			$this->load->library('upload', $config);
			$this->load->library('image_lib');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('userfile2')){
				$error                   = array('error' => $this->upload->display_errors());
				vd($error);
			}else{
				$image_data              =   $this->upload->data();
				$configer                =  array(
					'image_library'          => 'gd2',
					'source_image'           =>  $image_data['full_path'],
					/* 'maintain_ratio'         =>  TRUE,
					'width'                  =>  670,
					'height'                 =>  700, */
					);
				$this->image_lib->clear();
				$this->image_lib->initialize($configer);
				$this->image_lib->resize();
			}
		}else{
			$file_foto2 = $check->struktur;
		}
		
		$dataArray = array(
			"nama_instansi"	=> $post['namainstansi'],
			"visimis"		=> $post['visimisi'],
			"tentang"		=> $post['tentang'],
			"logo"			=> $file_foto1,
			"struktur"		=> $file_foto2
		);
		if(count($check) < 1){
			$action = $this->db->insert("profile",$dataArray);
		}else{
			$action = $this->db->update("profile",$dataArray,array("id_profile" => $check->id_profile));
		}
		
		if($action){
			$this->m_umum->generatePesan("Berhasil update data profile","berhasil");
			redirect('admin/manprofile');
		}else{
			$this->m_umum->generatePesan("Gagal update data profile","gagal");
			redirect('admin/manprofile');
		}
		
	}
}