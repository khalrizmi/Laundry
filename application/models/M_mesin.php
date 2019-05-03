<?php 

class M_mesin extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	function list_null(){
		$now = date('Y-m-d');
		$sql = "SELECT * FROM tbl_mesin LEFT JOIN tbl_cucikoin ON tbl_mesin.no_invoice = tbl_cucikoin.invoice_no WHERE tgl_pakai='$now' ORDER BY tbl_mesin.id DESC";
		return $this->db->query($sql)->result();
	}

	function list_mesin(){
		$no_mesin = $this->input->post('no_mesin');
		$now = date('Y-m-d');
		$sql = "SELECT * FROM tbl_mesin LEFT JOIN tbl_cucikoin ON tbl_mesin.no_invoice = tbl_cucikoin.invoice_no WHERE tgl_pakai='$now' AND nomor_mesin='$no_mesin' ORDER BY tbl_mesin.id DESC";
		return $this->db->query($sql)->result();
	}
	function list_tanggal(){
		$tanggal = $this->input->post('tanggal');
		$now = date('Y-m-d');
		$sql = "SELECT * FROM tbl_mesin LEFT JOIN tbl_cucikoin ON tbl_mesin.no_invoice = tbl_cucikoin.invoice_no WHERE tgl_pakai='$tanggal' ORDER BY tbl_mesin.id DESC";
		return $this->db->query($sql)->result();
	}
	function list_mesin_and_tangal(){
		$no_mesin = $this->input->post('no_mesin');
		$tanggal = $this->input->post('tanggal');
		$now = date('Y-m-d');
		$sql = "SELECT * FROM tbl_mesin LEFT JOIN tbl_cucikoin ON tbl_mesin.no_invoice = tbl_cucikoin.invoice_no WHERE tgl_pakai='$tanggal' AND nomor_mesin='$no_mesin' ORDER BY tbl_mesin.id DESC";
		return $this->db->query($sql)->result();	
	}

}

 ?>
