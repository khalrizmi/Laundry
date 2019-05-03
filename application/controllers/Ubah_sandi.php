<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_sandi extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('m_ubah_sandi');
	}
}

 ?>
