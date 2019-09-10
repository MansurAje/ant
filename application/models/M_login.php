<?php

class M_login extends CI_Model {

    function checkLogin($username,$password){
        $this->db->select('*');
        $this->db->from('user as us');
        $this->db->where('us.user_username', $username);
        $this->db->where('us.user_password', md5($password));
        $query = $this->db->get();
        if($query->num_rows()>0){
			$querycheck = $query->result();
			$dataArr = array(
				'UserID'       => $querycheck[0]->user_id,
				'Username'     => $querycheck[0]->user_fullname,
				'NamaUser'     => $querycheck[0]->user_username,
				/* 'lvlUser'	   => $querycheck[0]->id_lvl */
				);
			$this->session->set_userdata('loginData',$dataArr);
            return true;    
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');    
            return false;
        }  
    }
	
	/* public function checkLoginPemohon($username,$password){
		
        $this->db->select('*');
        $this->db->from('register as rg');
        $this->db->where('rg.username', $username);
        $this->db->where('rg.password', md5($password));
        $query = $this->db->get();
        if($query->num_rows()>0){
			$querycheck = $query->result();
			$dataArr = array(
				'UserID'       => $querycheck[0]->id_reg,
				'Username'     => $querycheck[0]->username,
				'NamaUser'     => $querycheck[0]->nama,
				'lvlUser'	   => "99"
				);
			$this->session->set_userdata('loginData',$dataArr);
            return true;    
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');    
            return false;
        }  
	} */
	
}
