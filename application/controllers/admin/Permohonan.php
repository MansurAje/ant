<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permohonan extends CI_Controller {
		
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_umum','M_permohonan'));
		$this->load->library("ckeditor");
    }
	
	function add(){
		$data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/permohonan/addPermohonan';
        $this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$UserID 			= $this->session->loginData['UserID'];
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['listData']	= $this->M_permohonan->listPermohonanByUid($UserID); 
        $data['v_content'] 	= 'member/permohonan/listPermohonan';
        $this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['id']			= $id;
		$data['userLogin'] 	= $this->session->userdata('loginData');
		$data['detailData']	= $this->M_permohonan->listPermohonanById($id);
        $data['v_content']  = 'member/permohonan/EditPermohonan';
        $this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post 	= $this->input->post();
		$UserID = $this->session->loginData['UserID'];
		
		$dataArray 	= array(
			"id_reg"		=> $UserID,
			"nama_pemilik"	=> $post['nmPemilik'],
			"nama_restoran"	=> $post['nmRestoran'],
			"alamat"		=> $post['alamat'],
			"no_telp"		=> $post['noTelp'],
			"rt_rw"			=> $post['rtrw'],
			"kecamatan"		=> $post['kecamatan'],
			"kelurahan"		=> $post['kelurahan'],
			"luas_tanah"	=> $post['luasTanah'],
			"luas_bangun"	=> $post['luasBangunan'],
			"latlng"		=> $post['latlng']
		);
		
		$insert = $this->db->insert("permohonan",$dataArray);
		if($insert){
			$insert_id = $this->db->insert_id();
			$this->m_umum->generatePesan("Berhasil Mengajukan Permohonan","berhasil");
			redirect('admin/permohonan/uploadfile/'.$insert_id);
		}else{
			$this->m_umum->generatePesan("Gagal Mengajukan Permohonan","gagal");
			redirect('admin/permohonan/add');
		}
	}
	
	public function doUpdate($id){
		$post 	= $this->input->post();
		$UserID = $this->session->loginData['UserID'];
		
		$dataArray 	= array(
			"id_reg"		=> $UserID,
			"nama_pemilik"	=> $post['nmPemilik'],
			"nama_restoran"	=> $post['nmRestoran'],
			"alamat"		=> $post['alamat'],
			"no_telp"		=> $post['noTelp'],
			"rt_rw"			=> $post['rtrw'],
			"kecamatan"		=> $post['kecamatan'],
			"kelurahan"		=> $post['kelurahan'],
			"luas_tanah"	=> $post['luasTanah'],
			"luas_bangun"	=> $post['luasBangunan'],
			"latlng"		=> $post['latlng']
		);
		
		$update = $this->db->update("permohonan",$dataArray,array("id_pemohon" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil Update Permohonan","berhasil");
			redirect('admin/permohonan/daftar/');
		}else{
			$this->m_umum->generatePesan("Gagal Update Permohonan","gagal");
			redirect('admin/permohonan/daftar/');
		}
	}
	
	public function uploadfile($id){
		$data['id']				= $id;
		$data['userLogin'] 		= $this->session->userdata('loginData');
		$data['restoDetail']	= $this->M_permohonan->getRestoDetail($id);
		$data['listData']		= $this->M_permohonan->getListJenisFile();
        $data['v_content'] 		= 'member/permohonan/uploadfile';
        $this->load->view('member/layout', $data);
	}
	
	public function douploadFile($id){
		$post 	= $this->input->post();
		$this->load->library('upload');
		
		$UserID = $this->session->loginData['UserID'];
		$files = $_FILES;
		if($_FILES['userfile']['name'] != ""){
			
			foreach($_FILES['userfile']['name'] AS $key => $value){
				$_FILES['userfile']['name']		= $files['userfile']['name'][$key];
				$_FILES['userfile']['type']		= $files['userfile']['type'][$key];
				$_FILES['userfile']['tmp_name']	= $files['userfile']['tmp_name'][$key];
				$_FILES['userfile']['error']	= $files['userfile']['error'][$key];
				$_FILES['userfile']['size']		= $files['userfile']['size'][$key];

				$ext          					= pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				$newname      					= $post['filename'][$key];
				
				$this->upload->initialize($this->set_upload_options($newname,$id));
				$this->upload->do_upload();
				$dataArray = array(
					"id_jenis"		=> $key,
					"id_pemohon"	=> $id,
					"nama_file"		=> $newname.".".$ext,
					"status"		=> 0
				);
				if($post['idUpload'][$key] != ""){
					$action = $this->db->update("permohonan_file",$dataArray,array("id_file" => $post['idUpload'][$key]));
				}else{
					$action = $this->db->insert("permohonan_file",$dataArray);
				}
			}
			
			if($action){
				$this->m_umum->generatePesan("Berhasil Upload data","berhasil");
				redirect('admin/permohonan/daftar');
			}else{
				$this->m_umum->generatePesan("Gagal Upload data","gagal");
				redirect('admin/permohonan/daftar');
			}
			
		}
	}
	
	private function set_upload_options($newname,$id){   
    	$Folder_name = $id;
		if(!is_dir("./assets/upload/permohonan/".$Folder_name)){
			mkdir("./assets/upload/permohonan/".$Folder_name,0777);
		}
		$config                  = array();
		$config['upload_path'] 	 = './assets/upload/permohonan/'.$Folder_name;
		$config['allowed_types'] = '*';
		$config['file_name']     = $newname;
		$config['overwrite']     = TRUE;

		return $config;
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("permohonan",array("id_pemohon" => $id));
		if($delete){
				$this->db->delete("permohonan_file",array("id_pemohon" => $id));
				$this->m_umum->generatePesan("Berhasil Delete data","berhasil");
				redirect('admin/permohonan/daftar');
			}else{
				$this->m_umum->generatePesan("Gagal Delete data","gagal");
				redirect('admin/permohonan/daftar');
			}
	}
}