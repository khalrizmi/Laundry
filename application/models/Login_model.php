<?php

class Login_model extends CI_Model {


	function verify(){
		$query = $this->db
						->where('username',$this->input->post('user'))
						->where('password',md5(strtolower($this->input->post('pass'))))
						->get('tbl_user');
        
		if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $user_id = $row->user_id;
                $nama_user = $row->nama; 
                $alamat_user = $row->alamat;  
                $telepon_user = $row->telepon;   
                $level = $row->level;
            }
            $data = array(
                'operator_id' => $user_id,
                'nama_user' => $nama_user,
                'alamat_user' => $alamat_user,
                'telepon_user' => $telepon_user,
                'level' => $level,
                'is_logged_in' => true
            );                                       
            $this->session->set_userdata($data); 
            return true;            
		}else{
            return false;   
        }
	}
    
    function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect('login');
		}        
		return true;
	}


	function cek_pw($pw){
		$query = $this->db
						->where('user_id',$this->session->userdata('operator_id'))
						->where('password',md5($pw))
						->get('tbl_user');
        
		return $query;
	}
	function ubah_pw($pw){
		$data = array(
				'password' => md5(strtolower($pw))
			);
		$this->db->where('user_id', $this->session->userdata('operator_id'));
		return $this->db->update('tbl_user', $data);
	}
}
?>
