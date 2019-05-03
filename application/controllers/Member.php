<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_member');
		$this->load->library('template');
		 $this->load->model('login_model');
        $is_logged_in = $this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect('login');
		}
	}

	public function index(){
		$data['data'] = $this->m_member->tampil_data();
		$data['kode'] = $this->m_member->auto_kode();
		$this->template->menu('v_member', $data);
	}

	public function input(){
		$data = $this->m_member->auto_kode();
		$nilai = substr($data['kode'], -6);
    	$tambah = $nilai + 1;

    	if($tambah < 10){
    		$auto_kode = "VV00000".$tambah;
    	}else if($tambah < 100){
    		$auto_kode = "VV0000".$tambah;
    	}else if($tambah < 1000){
    		$auto_kode = "VV000".$tambah;
    	}else if($tambah < 10000){
    		$auto_kode = "VV00".$tambah;
    	}else if($tambah < 100000){
    		$auto_kode = "VV0".$tambah;
    	}else if($tambah < 1000000){
    		$auto_kode = "VV".$tambah;
    	}
		$cek = $this->m_member->input_data($auto_kode);
		if($cek){
			echo "sukses";
		}else{
			echo"SQL Doesn't WORK";
		}
	}

	public function edit($id){
		$data = $this->m_member->edit($id);
		echo json_encode($data);
	}

	public function update($id){
		$cek = $this->m_member->update_data($id);
		if($cek){
			echo "sukses";
		}else{
			echo"SQL Doesn't WORK";
		}
	}

	public function delete($id){
		$this->m_member->delete($id);
	}

}

 ?>
