<?php 

class M_tampil_order extends CI_Model
{
	function __construct(){
		$this->load->database();
	}

	function id_operator($id_operator){
		$this->db->where('user_id', $id_operator);
		return $this->db->get('tbl_user')->row_array();
	}
	function tbl_satuan(){
		$query = "SELECT * FROM `tbl_cucisatuan` ORDER BY id DESC";
		return $this->db->query($query)->result();
	}
	function tbl_satuan_operator($operator){
		$this->db->where('operator', $operator);
		return $this->db->get('tbl_cucisatuan')->result();
	}
	function nobon($nobon){
		$this->db->where('no_bon', $nobon);
		return $this->db->get('tbl_cucisatuan')->row_array();
	}
	function item_satuan($nobon){
		$query = "SELECT * FROM tbl_item LEFT JOIN tbl_detail_cucisatuan ON tbl_item.id_item = tbl_detail_cucisatuan.id_item AND tbl_detail_cucisatuan.no_bon='$nobon' WHERE tbl_item.tipe_item=2 ORDER BY tbl_item.id_item ASC";
		return $this->db->query($query)->result();
	}

	function tbl_koin(){
		return $this->db->get('tbl_cucikoin')->result();
	}
	function tbl_koin_operator($operator){
		$this->db->where('operator', $operator);
		return $this->db->get('tbl_cucikoin')->result();
	}
	function invoice_no($invoice){
		$this->db->where('invoice_no', $invoice);
		return $this->db->get('tbl_cucikoin')->row_array();
	}
	function item_koin($invoice){
		$query = "SELECT * FROM tbl_item LEFT JOIN tbl_detail_cucikoin ON tbl_item.id_item = tbl_detail_cucikoin.id_item AND tbl_detail_cucikoin.invoice_no='$invoice' WHERE tbl_item.tipe_item=1 ORDER BY tbl_item.id_item ASC";
		return $this->db->query($query)->result();
	}

	function print_person_satuan($id){
		$query = "SELECT * FROM tbl_item INNER JOIN tbl_detail_cucisatuan ON tbl_item.id_item = tbl_detail_cucisatuan.id_item AND tbl_detail_cucisatuan.no_bon='$id'";
		return $this->db->query($query)->result();
	}

	function data_person_satuan($id){
		$this->db->where('no_bon', $id);
		return $this->db->get('tbl_cucisatuan')->row_array();
	}

	function print_person_koin($id){
		$query = "SELECT * FROM tbl_item INNER JOIN tbl_detail_cucikoin ON tbl_detail_cucikoin.id_item = tbl_item.id_item AND tbl_detail_cucikoin.invoice_no ='$id'";
		return $this->db->query($query)->result();
	}

	function data_person($id){
		$this->db->where('invoice_no', $id);
		return $this->db->get('tbl_cucikoin')->row_array();
	}
}

 ?>
