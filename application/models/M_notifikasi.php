<?php 

class M_notifikasi extends CI_Model
{
	function __construct(){
		$this->load->database();
	}

	function get_notifikasi(){
		$date = date('Y-m-d H:i:s');
		$data1 = "SELECT * FROM tbl_cucisatuan WHERE '$date' > tgl_keluar AND ket=0";
		$query1 = $this->db->query($data1)->num_rows();
		$hasil = $query1;
		return $hasil;
	}

	function get_satuan(){
		$date = date('Y-m-d H:i:s');
		$data1 = "SELECT * FROM tbl_cucisatuan WHERE '$date' > tgl_keluar AND ket=0";
		return $this->db->query($data1)->result();
	}

	function get_recent_satuan(){
		$query = "SELECT * FROM tbl_cucisatuan WHERE ket=1 ORDER BY tgl_ambil DESC LIMIT 5";
		return $this->db->query($query)->result();
	}

}

 ?>
