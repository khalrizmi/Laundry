<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_notifikasi');
		$this->load->library('template');
		$this->load->model('m_order');
		 $this->load->model('login_model');
        $is_logged_in = $this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect('login');
		}
	}

	function index(){
		$cek = $this->m_order->cek_data();
		$data['item_satuan'] = $this->m_order->list_satuan();
		$data['item_koin']   = $this->m_order->list_koin();
		$data['data'] = $this->m_order->data_satuan()->row_array();
		if($cek->num_rows() > 0){
			$jenis = $cek->row_array();
			if($jenis['jenis_cuci'] == 1){
				$data['tabel'] = $this->m_order->tabel_satuan($jenis['no_urut']);
				$data['pay']   = $this->m_order->pay_satuan($jenis['no_urut'])->row_array();
				$this->template->menu('v_transaksi', $data);
			}
			else if ($jenis['jenis_cuci'] == 2){
				$data['tabel'] = $this->m_order->tabel_koin($jenis['no_urut']);
				$data['pay']   = $this->m_order->pay_koin($jenis['no_urut'])->row_array();
				$this->template->menu('v_transaksi_koin', $data);
			}
		}
		else {
			$data['member'] = $this->m_order->list_member();
			$this->template->menu('v_order', $data);
		}
	}

	function satuan(){
		$data['bon']   = $this->m_order->no_bon();
		$data['jenis'] = $this->m_order->jenis_satuan();
		$this->template->menu('v_ordersatuan', $data);
	}
	function harga_satuan($id){
		$harga = $this->m_order->harga_satuan($id);
		echo json_encode($harga);
	}
	function delivered_satuan($nobon){
		$this->m_order->delivered_satuan($nobon);
		echo "berhasil";
	}


	function koin(){
		$data['invoice']   = $this->m_order->invoice_no();
		$data['jenis'] = $this->m_order->jenis_koin();
		$this->template->menu('v_orderkoin', $data);
	}
	//Fix
	function input_person($n){
		//cek jenis cuci
		if($n == 1){
				$no = $this->m_order->cek_bon();
				$urut = $no + 1;
			}
		else if($n == 2){
				$no = $this->m_order->cek_invoice();
				$substr = substr($no, -5);
				$fil = $substr + 1;
				if($fil < 10) $urut = "0000".$fil;
				  else if($fil < 100) $urut = "000".$fil;
				  else if($fil < 1000) $urut = "00".$fil;
				  else if($fil < 10000) $urut = "0".$fil;
				  else if($fil < 100000) $urut =    $fil;
				  else  $urut = $fil;
			}
		
		//masukan ke database
		$data = $this->m_order->input_person($n, $urut);
		
		if($data) echo "sukses";
		else      echo "gagal";
	}
	function row_member($id){
		$data = $this->m_order->row_member($id)->row_array();
		echo json_encode($data);
	}

	function input_satuan(){
		$cek = $this->m_order->input_detail_cucisatuan();
		if ($cek) echo "sukses";
		else echo "Please Try Again";
	}

	function input_koin(){
		$cek = $this->m_order->input_detail_cucikoin();
		if ($cek) echo "sukses";
		else echo "Please Try Again";
	}

	function input_all_satuan(){
		$cek = $this->m_order->input_all_satuan();
		if($cek){
			for($i=1; $i<=$this->input->post('jumlah_semua'); $i++){
				if($this->input->post('qty'.$i) != "0"){
					$cek = $this->m_order->input_detail_cucisatuan($i);
				}
			}
			$this->m_order->all_finish();
			echo "sukses";
		}
		else echo "gagal";
	}
	function input_all_koin(){
		 $cek = $this->m_order->input_all_koin();
		 if($cek){
		 	$this->m_order->input_koin();
		 	for($i=2;$i<=$this->input->post('jumlah_item');$i++){
		 		if($this->input->post("jumlah".$i) != 0){
		 			$this->m_order->input_detail_cucikoin($i);
		 		}
		 	}
		 	$this->m_order->mesin_washer();
		 	$this->m_order->mesin_drayer();
		 	$this->m_order->all_finish();
		 	echo "sukses";
		}
		else echo "gagal";
	}
	function hapus_row(){
		$id = $this->input->post("id");
		$nobon = $this->input->post("nobon");
		$cek = $this->m_order->hapus_row($id, $nobon);
		if($cek) echo "sukses";
		else     echo "gagal";
	}

	
}

 ?>
