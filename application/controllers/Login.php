<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
        parent::__construct();  
        $this->load->model('login_model');
        $is_logged_in = $this->session->userdata('is_logged_in');
		
    }
    
    function index()
	{
		$this->form_validation->set_rules('user', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$this->load->model('login_model');
            $verify = $this->login_model->verify();
            if($verify){	
                redirect('dashboard');
            }else{
                redirect('login?login=error'); 
            }                 
		}
        
	}

	function cek_pw($pw){
		$row = $this->login_model->cek_pw($pw);
		if($row->num_rows() > 0){
			echo "sukses";
		}else{
			echo "gagal";
		}
	}
	function ubah_pw($pw){
		$ubah_pw = $this->login_model->ubah_pw($pw);
			if($ubah_pw) echo "sukses";
			else         echo "Password belum diubah";
	}

    
    
}
