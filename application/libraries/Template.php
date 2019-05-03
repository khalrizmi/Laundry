<?php 

Class template 
{
	function __construct(){
		$this->_ci = &get_instance();
	}

	function menu($content, $data=NULL){
		$data['content'] = $this->_ci->load->view($content,$data,TRUE);
		$this->_ci->load->view('template', $data);
	}
}


 ?>
