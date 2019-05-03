<?php

class Dashboard_model extends CI_Model {
    
    function __construct(){
        $this->load->database();
    }   

    function update_selesai(){
    	$now = date('Y-m-d');
    	$sql = "UPDATE tbl_cucisatuan SET ket = '1' WHERE '$now' >= tgl_keluar AND ket = 0;";
    	return $this->db->query($sql);
    }
    
    function order_hariini(){
    	$now = date('Y-m-d');
    	$this->db->where('tgl_masuk', $now);
    	$jumlah_satuan = $this->db->get('tbl_cucisatuan')->num_rows();
    	$this->db->where('tgl_masuk', $now);
    	$jumlah_koin = $this->db->get('tbl_cucikoin')->num_rows();
    	return ($jumlah_satuan + $jumlah_koin);
    }
    function order_semua(){
    	$jumlah_satuan = $this->db->get('tbl_cucisatuan')->num_rows();
    	$jumlah_koin = $this->db->get('tbl_cucikoin')->num_rows();
    	return ($jumlah_satuan + $jumlah_koin);
    }

    function dikerjakan_hariini(){
    	$now = date('Y-m-d');
    	$this->db->where('tgl_masuk', $now);
    	$this->db->where('ket', 0);
    	$jumlah_satuan = $this->db->get('tbl_cucisatuan')->num_rows();
    	
    	$this->db->where('tgl_masuk', $now);
    	$this->db->where('ket', 0);
    	$jumlah_koin = $this->db->get('tbl_cucikoin')->num_rows();
    	return ($jumlah_satuan + $jumlah_koin);	
    }
    function dikerjakan_semua(){
    	$this->db->where('ket', 0);
    	$jumlah_satuan = $this->db->get('tbl_cucisatuan')->num_rows();
    	
    	$this->db->where('ket', 0);
    	$jumlah_koin = $this->db->get('tbl_cucikoin')->num_rows();
    	return ($jumlah_satuan + $jumlah_koin);	
    }

    function selesai_hariini(){
    	$now = date('Y-m-d');
    	$this->db->where('tgl_keluar', $now);
    	$this->db->where('ket', 1);
    	$jumlah_satuan = $this->db->get('tbl_cucisatuan')->num_rows();
    	
    	$this->db->where('tgl_selesai', $now);
    	$this->db->where('ket', 1);
    	$jumlah_koin = $this->db->get('tbl_cucikoin')->num_rows();
    	return ($jumlah_satuan + $jumlah_koin);	
    }
    function selesai_semua(){
    	$this->db->where('ket', 1);
    	$jumlah_satuan = $this->db->get('tbl_cucisatuan')->num_rows();
    	
    	$this->db->where('ket', 1);
    	$jumlah_koin = $this->db->get('tbl_cucikoin')->num_rows();
    	return ($jumlah_satuan + $jumlah_koin);	
    }

    function diambil_hariini(){
    	$now = date('Y-m-d');
    	$this->db->where('tgl_ambil', $now);
    	$this->db->where('ket', 2);
    	$jumlah_satuan = $this->db->get('tbl_cucisatuan')->num_rows();
    	
    	$sql = "SELECT * FROM tbl_cucikoin WHERE tgl_ambil = '$now' AND ket='2'";
    	$jumlah_koin = $this->db->query($sql)->num_rows();
    	return ($jumlah_satuan + $jumlah_koin);	
    }
    function diambil_semua(){
    	$this->db->where('ket', 2);
    	$jumlah_satuan = $this->db->get('tbl_cucisatuan')->num_rows();
    	
    	$this->db->where('ket', 2);
    	$jumlah_koin = $this->db->get('tbl_cucikoin')->num_rows();
    	return ($jumlah_satuan + $jumlah_koin);	
    }

    function list_satuan($i){
    	$this->db->where('ket', $i);
    	$this->db->order_by('no_bon', 'DESC');
    	return $this->db->get('tbl_cucisatuan');
    }
    function list_satuan_tanggal($i){
    	if($i==0) $this->db->where('tgl_masuk', $this->input->post('tanggal'));
    	else if($i==2)      $this->db->where('tgl_ambil', $this->input->post('tanggal'));
    	else                $this->db->where('tgl_keluar', $this->input->post('tanggal'));
    	$this->db->where('ket', $i);
    	$this->db->order_by('no_bon', 'DESC');
    	return $this->db->get('tbl_cucisatuan');
    }

    function list_koin($i){
    	$this->db->where('ket', $i);
    	$this->db->order_by('invoice_no', 'DESC');
    	return $this->db->get('tbl_cucikoin');
    }
    function list_koin_tanggal($i){
    	if($i==2) $this->db->where('tgl_selesai', $this->input->post('tanggal'));
    	else      $this->db->where('tgl_masuk', $this->input->post('tanggal'));
    	$this->db->where('ket', $i);
    	$this->db->order_by('invoice_no', 'DESC');
    	return $this->db->get('tbl_cucikoin');
    }


}   
?>
