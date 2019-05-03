<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
    public function __construct(){
        parent::__construct();    
        $this->load->model('m_notifikasi');
        $this->load->model('login_model'); 
        $this->load->model('dashboard_model');
        $this->load->library('template'); 
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!$is_logged_in){
            redirect('login');
        }
    }
    
    function index(){
    	$this->dashboard_model->update_selesai();    
        $data['order_hariini'] = $this->dashboard_model->order_hariini();
        $data['order_semua']   = $this->dashboard_model->order_semua();
        $data['dikerjakan_hariini'] = $this->dashboard_model->dikerjakan_hariini();
        $data['dikerjakan_semua'] = $this->dashboard_model->dikerjakan_semua();
        $data['selesai_hariini'] = $this->dashboard_model->selesai_hariini();
        $data['selesai_semua'] = $this->dashboard_model->selesai_semua();
        $data['diambil_hariini'] = $this->dashboard_model->diambil_hariini();
        $data['diambil_semua'] = $this->dashboard_model->diambil_semua();
        $this->template->menu('v_dashboard', $data);
	}
    function logout(){
        $this->session->sess_destroy();
		redirect('login');
    }

    function dikerjakan($jenis){
    	$tanggal = $this->input->post('tanggal');
    	if($jenis == "satuan"){
    		if($tanggal != NULL){
    			$data['tanggal'] = $tanggal;
    			$data['list_data'] = $this->dashboard_model->list_satuan_tanggal(0);
    		}else{
    			$data['tanggal'] = NULL;
    			$data['list_data'] = $this->dashboard_model->list_satuan(0);
    		}
	    	$data['jenis'] = 1;
	    }else if($jenis == "koin"){
	    	if($tanggal != NULL){
	    		$data['tanggal'] = $tanggal;
    			$data['list_data'] = $this->dashboard_model->list_koin_tanggal(0);
    		}else{
    			$data['tanggal'] = NULL;
    			$data['list_data'] = $this->dashboard_model->list_koin(0);
    		}
	    	$data['jenis'] = 2;
	    }
	    $data['script'] = 0;
	    $data['filter_tanggal'] = $this->input->post('tanggal');
    	$this->template->menu('Dashboard/v_selesai', $data);
    }

    function selesai($jenis){
    	$tanggal = $this->input->post('tanggal');
    	if($jenis == "satuan"){
    		if($tanggal != NULL){
    			$data['tanggal'] = $tanggal;
    			$data['list_data'] = $this->dashboard_model->list_satuan_tanggal(1);
    		}else{
    			$data['tanggal'] = NULL;
    			$data['list_data'] = $this->dashboard_model->list_satuan(1);
    		}
	    	$data['jenis'] = 1;
	    }else if($jenis == "koin"){
	    	if($tanggal != NULL){
	    		$data['tanggal'] = $tanggal;
    			$data['list_data'] = $this->dashboard_model->list_koin_tanggal(1);
    		}else{
    			$data['tanggal'] = NULL;
    			$data['list_data'] = $this->dashboard_model->list_koin(1);
    		}
	    	$data['jenis'] = 2;
	    }
	    $data['script'] = 1;
	    $data['filter_tanggal'] = $this->input->post('tanggal');
    	$this->template->menu('dashboard/v_selesai', $data);
    } 

    function diambil($jenis){
    	$tanggal = $this->input->post('tanggal');
    	if($jenis == "satuan"){
    		if($tanggal != NULL){
    			$data['tanggal'] = $tanggal;
    			$data['list_data'] = $this->dashboard_model->list_satuan_tanggal(2);
    		}else{
    			$data['tanggal'] = NULL;
    			$data['list_data'] = $this->dashboard_model->list_satuan(2);
    		}
	    	$data['jenis'] = 1;
	    }else if($jenis == "koin"){
	    	if($tanggal != NULL){
	    		$data['tanggal'] = $tanggal;
    			$data['list_data'] = $this->dashboard_model->list_koin_tanggal(2);
    		}else{
    			$data['tanggal'] = NULL;
    			$data['list_data'] = $this->dashboard_model->list_koin(2);
    		}
	    	$data['jenis'] = 2;
	    }
	    $data['script'] = 2;
	    $data['filter_tanggal'] = $this->input->post('tanggal');
    	$this->template->menu('Dashboard/v_selesai', $data);
    }   
    
    
}
