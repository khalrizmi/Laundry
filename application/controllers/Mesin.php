<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Mesin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('login_model');
		$this->load->model('m_mesin');
        $is_logged_in = $this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect('login');
		}
	}


	function index(){
		$data['list_data'] = $this->m_mesin->list_null();
		$this->template->menu('mesin/v_mesin', $data);
	}

	function tanggal(){
		$nomesin = $this->input->post('no_mesin');
		$tanggal = $this->input->post('tanggal');
		if($tanggal==NULL AND $nomesin==0){
			redirect('mesin');
		}
		else if($tanggal==NULL){
			$data['list_data'] = $this->m_mesin->list_mesin();
		}
		else if($nomesin==0){
			$data['list_data'] = $this->m_mesin->list_tanggal();
		}else{
			$data['list_data'] = $this->m_mesin->list_mesin_and_tangal();
		}
		$data['no_mesin'] = $nomesin;
		$data['tanggal']  = $tanggal;
		$this->template->menu('mesin/v_mesin_tanggal', $data);
	}

}

 ?>
