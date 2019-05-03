<?php 	

defined('BASEPATH') Or exit('No direct script access allowed');

class Tampil_order extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tampil_order');
		$this->load->library('template');
		 $this->load->model('login_model');
        $is_logged_in = $this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect('login');
		}
	}

	function satuan($id_operator=NULL){
		if($id_operator==NULL)
			$data['tampil'] = $this->m_tampil_order->tbl_satuan();
		else{
			$operator = $this->m_tampil_order->id_operator($id_operator);
			$data['tampil'] = $this->m_tampil_order->tbl_satuan_operator($operator['nama']);
		}
		$this->template->menu('v_tampilorder_satuan', $data);
	}
	function no_bon($nobon){
		$data['item'] = $this->m_tampil_order->item_satuan($nobon);
		$data['data'] = $this->m_tampil_order->nobon($nobon);
		$this->template->menu('v_tampilorder_nobon', $data);
	}
	function struck($nobon){
		$data['item'] = $this->m_tampil_order->item_satuan($nobon);
		$data['data'] = $this->m_tampil_order->nobon($nobon);
		$this->load->view('struk/struk_satuan', $data);
	}

	function koin($id_operator=NULL){
		if($id_operator==NULL)
			$data['tampil'] = $this->m_tampil_order->tbl_koin();
		else{
			$operator = $this->m_tampil_order->id_operator($id_operator);
			$data['tampil'] = $this->m_tampil_order->tbl_koin_operator($operator['nama']);
		}
		$this->template->menu('v_tampilorder_koin', $data);
	}
	function invoice_no($invoice_no){
		$data['item'] = $this->m_tampil_order->item_koin($invoice_no);
		$data['data'] = $this->m_tampil_order->invoice_no($invoice_no);
		$this->template->menu('v_tampilorder_noinvoice', $data);
	}
	function struck_koin($invoice){
		$data['item'] = $this->m_tampil_order->item_koin($invoice);
		$data['data'] = $this->m_tampil_order->invoice_no($invoice);
		$this->load->view('struk/struk_koin', $data);
	}

	function print_person_satuan($id){
		$data = $this->m_tampil_order->print_person_satuan($id);
		foreach ($data as $row) {
			echo "
				<tr>
	    			<td>$row->nama_item</td>
	    			<td class='text-center'>$row->qty</td>
	    			<td class='text-center'>pcs</td>
	    			<td class='text-center'>$row->harga_normal</td>
					<td class='text-right'>$row->total_harga</td>
	    		</tr>
			";
		}
	}

	function print_person_koin($id){
		$data = $this->m_tampil_order->print_person_koin($id);
		foreach ($data as $row) {
			echo "
				<tr>
	    			<td>$row->nama_item</td>
	    			<td class='text-center'>$row->qty</td>
	    			<td class='text-center'>pcs</td>
	    			<td class='text-center'>$row->harga_normal</td>
					<td class='text-right'>$row->total_harga</td>
	    		</tr>
			";
		}
	}

	function data_person_satuan($id){
		$data = $this->m_tampil_order->data_person_satuan($id);
		echo json_encode($data);
	}

	function data_person($id){
		$data = $this->m_tampil_order->data_person($id);
		echo json_encode($data);
	}
}

 ?>
