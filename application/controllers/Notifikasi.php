<?php 

defined('BASEPATH') OR exit('No script direct access allowed');

class Notifikasi extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_notifikasi');
		$this->load->library('template');
	}

	public function index(){
		$data['jlnotifikasi'] = $this->m_notifikasi->get_notifikasi();
		$data['data_satuan']  = $this->m_notifikasi->get_satuan();
		$data['recent_satuan']  = $this->m_notifikasi->get_recent_satuan();
		$this->template->menu('v_notifikasi', $data);
	}


	function load_row(){
		echo $this->m_notifikasi->get_notifikasi();
	}
}

 ?>
