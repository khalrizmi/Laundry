<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_karyawan');
		$this->load->library('template');
		 $this->load->model('login_model');
        $is_logged_in = $this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect('login');
		}
	}

	public function index(){
		$data['data'] = $this->m_karyawan->tampil_data()->result();
		$this->template->menu('v_karyawan', $data);
	}

	public function input(){
		$cek = $this->m_karyawan->input_data();
		if($cek==TRUE){
			echo"sukses";
		}else{
			echo"SQL Doesn't WORK";
		}
	}

	public function edit($id){
		$data = $this->m_karyawan->edit($id);
		echo json_encode($data);
	}

	public function update($id){
		$cek = $this->m_karyawan->update($id);
		if($cek){
			echo "sukses";
		}else{
			echo"SQL Doesn't WORK";
		}
	}

	public function delete($id){
		$cek = $this->m_karyawan->delete($id);
		if($cek){
			echo "sukses";
		}else{
			echo "gagal";
		}
	}
}

 ?>
