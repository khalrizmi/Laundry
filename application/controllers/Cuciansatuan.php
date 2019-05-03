<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuciansatuan extends CI_Controller {
	
	public function __construct(){
		parent::__construct();    
		$this->load->model('m_notifikasi');
		$this->load->model('login_model'); 
		$this->load->model('dashboard_model');
		$this->load->model('m_cucian');
		$this->load->library('template'); 
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect('login');
		}
	}

	function selesai_satuan($id){
		$cek = $this->m_cucian->selesai_satuan($id);
		if($cek){
			echo "sukses";
		}else
			echo "gagal";
	}
	function ambil_satuan($id){
		$cek = $this->m_cucian->ambil_satuan($id);
		if($cek){
			echo "sukses";
		}else
			echo "gagal";
	}
	
	function index(){
		$status = $this->input->post('status');
		$tanggal =$this->input->post('tanggal');;
		if($status=='1'){
			$data['jenis'] = 1;
			if($tanggal==NULL) $data['list_data'] = $this->m_cucian->list_satuan_dikerjakan();
			else               $data['list_data'] = $this->m_cucian->list_satuan_dikerjakan_tanggal();
		}else if($status=='2'){
			$data['jenis'] = 2;
			if($tanggal==NULL) $data['list_data'] = $this->m_cucian->list_satuan_selesai();
			else               $data['list_data'] = $this->m_cucian->list_satuan_selesai_tanggal();
		}else if($status=='3'){
			$data['jenis'] = 3;
			if($tanggal==NULL) $data['list_data'] = $this->m_cucian->list_satuan_diambil();
			else               $data['list_data'] = $this->m_cucian->list_satuan_diambil_tanggal();
		}else{
			 $data['jenis'] = 0;
			 if($tanggal==NULL) $data['list_data'] = $this->m_cucian->list_satuan();
			 else               $data['list_data'] = $this->m_cucian->list_satuan_tanggal();
		}
		if($tanggal==NULL) $data['tanggal'] = NULL;
		else $data['tanggal'] = $tanggal;
		$data['list_recent'] = $this->m_cucian->list_recent_satuan();

		$this->template->menu('v_cuciansatuan', $data);
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	function dikerjakan(){
		$tanggal = $this->input->post('tanggal');
		$data['jenis'] = 1;
		$data['tanggal'] = "2017-10-01";
		if($tanggal == NULL){
			$data['list_data'] = $this->m_cucian->list_koin_dikerjakan()->result();
		}
		$this->template->menu('v_cuciankoin', $data);
	}

	function selesai(){
		$tanggal = $this->input->post('tanggal');
		$data['jenis'] = 2;
		$data['tanggal'] = $tanggal;
		if($tanggal == NULL){
			$data['list_data'] = $this->m_cucian->list_koin_selesai()->result();
		}
		$this->template->menu('v_cuciankoin', $data);
	}

	function diambil(){
		$tanggal = $this->input->post('tanggal');
		$data['jenis'] = 3;
		$data['tanggal'] = $tanggal;
		if($tanggal == NULL){
			$data['list_data'] = $this->m_cucian->list_koin_diambil()->result();
		}
		$this->template->menu('v_cuciankoin', $data);
	}
	
	
}
