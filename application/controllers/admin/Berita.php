<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller {
		
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_umum','M_berita'));
		$this->load->library("ckeditor");
    }
	
	public function add(){
		$data['userLogin'] = $this->session->userdata('loginData');
		$this->ckeditor->basePath = base_url() . 'assets/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
        );
		$this->ckeditor->config['width'] = '676px';
        $this->ckeditor->config['height'] = '270px';
        $data['v_content'] = 'member/berita/add';
        $this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['listData']	= $this->M_berita->listBerita();
        $data['v_content'] = 'member/berita/list';
        $this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['id']			= $id;
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['detailData']	= $this->M_berita->beritaById($id);
		$this->ckeditor->basePath = base_url() . 'assets/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
        );
		$this->ckeditor->config['width'] = '676px';
        $this->ckeditor->config['height'] = '270px';
        $data['v_content'] = 'member/berita/edit';
        $this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post	   = $this->input->post();
		$idUser	   = $this->session->loginData['UserID'];
		$file_foto = "";
		
		if($_FILES['userfile']['name']!=""){
			$path 	= 'assets/upload/berita/';
			if (!is_dir($path)){
				mkdir($path);
			}
			$uploadfile              = explode(".", $_FILES["userfile"]["name"]);
			/* debugCode($uploadfile); */
			$file_foto               = '01'.round(microtime(true)) .(rand()%9). '.' . end($uploadfile);
			$config['upload_path']   = $path;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name']     = $file_foto; // set the name here
			$this->load->library('upload', $config);
			$this->load->library('image_lib');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('userfile')){
				$error                   = array('error' => $this->upload->display_errors());
				vd($error);
			}else{
				$image_data              =   $this->upload->data();
				$configer                =  array(
					'image_library'          => 'gd2',
					'source_image'           =>  $image_data['full_path'],
					'maintain_ratio'         =>  TRUE,
					'width'                  =>  470,
					'height'                 =>  500,
					);
				$this->image_lib->clear();
				$this->image_lib->initialize($configer);
				$this->image_lib->resize();
			}
		}
		
		$dataArray 	= array(
			"id_user"			=> $idUser,
			"judul_berita"	    => $post['judul'],
			"isi_berita"	    => $post['isiberita'],
			"foto"				=> $file_foto,
			"tanggal_posting"	=> date("Y-m-d",strtotime($post["tglPost"]))
		);
		$insert = $this->db->insert("berita",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/berita/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/berita/add');
		}
        
	}
	
	public function doUpdate($id){
		$post	   = $this->input->post();
		$idUser	   = $this->session->loginData['UserID'];
		$file_foto = "";
		
		if($_FILES['userfile']['name']!=""){
			$path 	= 'assets/upload/berita/';
			if (!is_dir($path)){
				mkdir($path);
			}
			$uploadfile              = explode(".", $_FILES["userfile"]["name"]);
			/* debugCode($uploadfile); */
			$file_foto               = '01'.round(microtime(true)) .(rand()%9). '.' . end($uploadfile);
			$config['upload_path']   = $path;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name']     = $file_foto; // set the name here
			$this->load->library('upload', $config);
			$this->load->library('image_lib');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('userfile')){
				$error                   = array('error' => $this->upload->display_errors());
				vd($error);
			}else{
				$image_data              =   $this->upload->data();
				$configer                =  array(
					'image_library'          => 'gd2',
					'source_image'           =>  $image_data['full_path'],
					'maintain_ratio'         =>  TRUE,
					'width'                  =>  470,
					'height'                 =>  500,
					);
				$this->image_lib->clear();
				$this->image_lib->initialize($configer);
				$this->image_lib->resize();
			}
			
			$dataArray 	= array(
				"id_user"			=> $idUser,
				"judul_berita"	    => $post['judul'],
				"isi_berita"	    => $post['isiberita'],
				"foto"				=> $file_foto,
				"tanggal_posting"	=> date("Y-m-d",strtotime($post["tglPost"]))
			);
		}else{
			$dataArray 	= array(
				"id_user"			=> $idUser,
				"judul_berita"	    => $post['judul'],
				"isi_berita"	    => $post['isiberita'],
				"tanggal_posting"	=> date("Y-m-d",strtotime($post["tglPost"]))
			);
		} 
		
		$update = $this->db->update("berita",$dataArray,array("id_berita" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
			redirect('admin/berita/daftar');
		}else{ 
			$this->m_umum->generatePesan("Gagal update data","gagal");
			redirect('admin/berita/add');
		}
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("berita",array("id_berita" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil hapus data","berhasil");
			redirect('admin/berita/daftar');
		}else{ 
			$this->m_umum->generatePesan("Gagal hapus data","gagal");
			redirect('admin/berita/daftar');
		}
	}
	 
}