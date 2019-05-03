<?php 

/**
* 
*/
class M_cucian extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	function list_recent_koin(){
		$now = date('Y-m-d');
		$sql = "SELECT * FROM tbl_cucikoin WHERE tgl_ambil = '$now' ORDER BY jam_ambil DESC LIMIT 6";
		return $this->db->query($sql);
	}

	function list_koin(){
    	$this->db->order_by('id', 'DESC');
    	$this->db->limit('50');
    	return $this->db->get('tbl_cucikoin');
	}

	function list_koin_tanggal(){
    	$this->db->order_by('id', 'DESC');
    	$this->db->where('tgl_masuk', $this->input->post('tanggal'));
    	return $this->db->get('tbl_cucikoin');
	}

	function list_koin_dikerjakan(){
		$this->db->where('ket',0);
		$this->db->order_by('invoice_no', 'DESC');
		return $this->db->get('tbl_cucikoin');
	}

	function list_koin_dikerjakan_tanggal(){
		$this->db->where('ket',0);
		$this->db->where('tgl_masuk', $this->input->post('tanggal'));
		$this->db->order_by('invoice_no', 'DESC');
		return $this->db->get('tbl_cucikoin');
	}

	function list_koin_selesai(){
		$this->db->where('ket',1);
		$this->db->order_by('invoice_no', 'DESC');
		return $this->db->get('tbl_cucikoin');
	}

	function list_koin_selesai_tanggal(){
		$this->db->where('ket',1);
		$this->db->where('tgl_masuk', $this->input->post('tanggal'));
		$this->db->order_by('invoice_no', 'DESC');
		return $this->db->get('tbl_cucikoin');
	}

	function list_koin_diambil(){
		$this->db->where('ket',2);
		$this->db->order_by('invoice_no', 'DESC');
		return $this->db->get('tbl_cucikoin');
	}

	function list_koin_diambil_tanggal(){
		$this->db->where('ket',2);
		$this->db->where('tgl_masuk', $this->input->post('tanggal'));
		$this->db->order_by('invoice_no', 'DESC');
		return $this->db->get('tbl_cucikoin');
	}

	function selesai_koin($id){
		$field = array(
				'ket' => 1,
				'tgl_selesai' => date('Y-m-d')
		);
		$this->db->where('id', $id);
		return $this->db->update('tbl_cucikoin', $field);
	}

	function ambil_koin($id){
		$field = array(
				'ket' => 2,
				'tgl_ambil' => date('Y-m-d'),
				'jam_ambil' => date('H:i:s')
		);
		$this->db->where('id', $id);
		return $this->db->update('tbl_cucikoin', $field);
	}





	function list_recent_satuan(){
		$now = date('Y-m-d');
		$sql = "SELECT * FROM tbl_cucisatuan WHERE tgl_ambil = '$now' ORDER BY jam_ambil DESC LIMIT 6";
		return $this->db->query($sql);
	}

	function list_satuan(){
    	$this->db->order_by('id', 'DESC');
    	$this->db->limit('50');
    	return $this->db->get('tbl_cucisatuan');
	}

	function list_satuan_tanggal(){
    	$this->db->order_by('id', 'DESC');
    	$this->db->where('tgl_masuk', $this->input->post('tanggal'));
    	return $this->db->get('tbl_cucisatuan');
	}

	function list_satuan_dikerjakan(){
		$this->db->where('ket',0);
		$this->db->order_by('no_bon', 'DESC');
		return $this->db->get('tbl_cucisatuan');
	}

	function list_satuan_dikerjakan_tanggal(){
		$this->db->where('ket',0);
		$this->db->where('tgl_masuk', $this->input->post('tanggal'));
		$this->db->order_by('no_bon', 'DESC');
		return $this->db->get('tbl_cucisatuan');
	}

	function list_satuan_selesai(){
		$this->db->where('ket',1);
		$this->db->order_by('no_bon', 'DESC');
		return $this->db->get('tbl_cucisatuan');
	}

	function list_satuan_selesai_tanggal(){
		$this->db->where('ket',1);
		$this->db->where('tgl_masuk', $this->input->post('tanggal'));
		$this->db->order_by('no_bon', 'DESC');
		return $this->db->get('tbl_cucisatuan');
	}

	function list_satuan_diambil(){
		$this->db->where('ket',2);
		$this->db->order_by('no_bon', 'DESC');
		return $this->db->get('tbl_cucisatuan');
	}

	function list_satuan_diambil_tanggal(){
		$this->db->where('ket',2);
		$this->db->where('tgl_masuk', $this->input->post('tanggal'));
		$this->db->order_by('no_bon', 'DESC');
		return $this->db->get('tbl_cucisatuan');
	}

	// function selesai_satuan($id){
	// 	$field = array(
	// 			'ket' => 1,
	// 			'tgl_keluar' => date('Y-m-d')
	// 	);
	// 	$this->db->where('id', $id);
	// 	return $this->db->update('tbl_cucisatuan', $field);
	// }

	function ambil_satuan($id){
		$field = array(
				'ket' => 2,
				'tgl_ambil' => date('Y-m-d'),
				'jam_ambil' => date('H:i:s')
		);
		$this->db->where('id', $id);
		return $this->db->update('tbl_cucisatuan', $field);
	}
}

 ?>
