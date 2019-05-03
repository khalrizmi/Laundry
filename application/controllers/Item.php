<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_item');
		 $this->load->model('login_model');
        $is_logged_in = $this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect('login');
		}
	}

	function index(){
		$data['data'] = $this->m_item->tampil();
		$this->template->menu('v_item', $data);
	}

	public function input(){
		$cek = $this->m_item->input_data();
		if($cek){
			echo "sukses";
		}else{
			echo"SQL Doesn't WORK";
		}
	}

	public function edit($id){
		$data = $this->m_item->edit($id);
		echo json_encode($data);
	}

	public function update($id){
		$cek = $this->m_item->update_data($id);
		if($cek){
			echo "sukses";
		}else{
			echo"SQL Doesn't WORK";
		}
	}

	function delete($id){
		$this->m_item->delete_data($id);
	}
}

 ?>
