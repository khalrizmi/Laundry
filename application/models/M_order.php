<?php 

class M_order extends CI_Model
{
	function __construct(){
		$this->load->database();
	}

	function no_bon(){
		$this->db->select_max('no_bon', 'bon');
		return $this->db->get('tbl_cucisatuan')->row_array();
	}


	function input_cucisatuan($bon){
		$waktu = $this->input->post('waktu');
		$tgl_keluar = date('Y-m-d');
		$field = array(
				'tgl_masuk' => date('Y-m-d H:i:s'),
				'tgl_keluar' => date('Y-m-d H:i:s'),
				'no_bon' => $bon['bon']+1,
				'operator' => $this->session->userdata('nama_user'),
				'nama' => $this->input->post('nama'),
				'no_hp' => $this->input->post('no_hp'),
				'alamat' => $this->input->post('alamat'),
				'area' => $this->input->post('area'),
				'total_bon' => $this->input->post('grand_total'),
				'uang_tunai' => $this->input->post('tunai'),
				'kembalian' => $this->input->post('kembalian')
			);
		return $this->db->insert('tbl_cucisatuan', $field);
	}
	
	function jenis_satuan(){
		$this->db->where('tipe_item', 2);
		return $this->db->get('tbl_item')->result();
	}
	function harga_satuan($id){
		$this->db->where('id_item', $id);
		return $this->db->get('tbl_item', array('id_item'))->row_array();
	}
	function delivered_satuan($nobon){
		$field = array('ket'=>1);
		$this->db->where('no_bon', $nobon);
		return $this->db->update('tbl_cucisatuan', $field);
	}

	function jenis_koin(){
		$this->db->where('tipe_item', 1);
		return $this->db->get('tbl_item')->result();
	}
	function invoice_no(){
		$this->db->select_max('invoice_no', 'no');
		return $this->db->get('tbl_cucikoin')->row_array();
	}

	// Fix
	function cek_data(){
		$this->db->where('operator_id', $this->session->userdata('operator_id'));
		return $this->db->get('tbl_bantu');
	}
	function list_member(){
		return $this->db->get('tbl_member');
	}
	function row_member($id){
		$this->db->where('no_member', $id);
		return $this->db->get('tbl_member');
	}
	function cek_bon(){
		$sql = "SELECT max(no_urut) as urut FROM tbl_bantu WHERE jenis_cuci = 1";
		$cek = $this->db->query($sql)->row_array();
		if($cek['urut'] != NULL){
			$no_urut = $cek['urut'];
		}else{
			$sql = "SELECT max(no_bon) as bon FROM tbl_cucisatuan";
			$cek = $this->db->query($sql)->row_array();
			$no_urut = $cek['bon'];
		}
		return $no_urut;
	}
	function cek_invoice(){
		$sql = "SELECT max(no_urut) as urut FROM tbl_bantu WHERE jenis_cuci = 2";
		$cek = $this->db->query($sql)->row_array();
		if($cek['urut'] != NULL){
			$no_urut = $cek['urut'];
		}else{
			$sql = "SELECT max(invoice_no) as invoice FROM tbl_cucikoin";
			$cek = $this->db->query($sql)->row_array();
			$no_urut = $cek['invoice'];
		}
		return $no_urut;
	}
	function input_person($n, $urut){
			$field = array(
					'operator_id' => $this->session->userdata('operator_id'),
					'no_urut'     => $urut,
					'nama'        => $this->input->post('nama'),
					'telepon'     => $this->input->post('telepon'),
					'alamat'      => $this->input->post('alamat'),
					'jenis_cuci'  => $this->input->post('jenis_cuci'),
					'tgl_masuk'   => date('Y-m-d')
				);
		return $this->db->insert('tbl_bantu', $field);
	}

	//DATA
	function data_satuan(){
		$operator_id = $this->session->userdata('operator_id');
		$query = "SELECT * FROM tbl_bantu WHERE operator_id='$operator_id'";
		return $this->db->query($query);
	}

	function list_satuan(){
		$this->db->where('tipe_item', 2);
		return $this->db->get('tbl_item');
	}
	function list_koin(){
		$this->db->where('tipe_item', 1);
		return $this->db->get('tbl_item');
	}
	function tabel_satuan($nobon){
		$query = "SELECT * FROM tbl_item INNER JOIN tbl_detail_cucisatuan ON tbl_item.id_item = tbl_detail_cucisatuan.id_item WHERE tbl_detail_cucisatuan.no_bon = '$nobon'";
		return $this->db->query($query);
	}
	function tabel_koin($invoice){
		$query = "SELECT * FROM tbl_item INNER JOIN tbl_detail_cucikoin ON tbl_item.id_item = tbl_detail_cucikoin.id_item WHERE tbl_detail_cucikoin.invoice_no = '$invoice'";
		return $this->db->query($query);
	}
	function pay_satuan($nobon){
		$query = "SELECT sum(total_harga) as grand_total, sum(qty) as qty FROM tbl_detail_cucisatuan WHERE no_bon='$nobon'";
		return $this->db->query($query);
	}
	function pay_koin($invoice){
		$query = "SELECT sum(total_harga) as grand_total, sum(qty) as qty FROM tbl_detail_cucikoin WHERE invoice_no='$invoice'";
		return $this->db->query($query);	
	}
	function input_detail_cucisatuan($i){
		$field = array(
				'no_bon'      => $this->input->post('no_bon'),
				'id_item'     => $this->input->post('id_item'.$i),
				'qty'         => $this->input->post('qty'.$i),
				'total_harga' => $this->input->post('jml'.$i)
			);
		return $this->db->insert('tbl_detail_cucisatuan', $field);
	}
	function input_koin(){
		$field = array(
				'invoice_no'  => $this->input->post('no_invoice'),
				'id_item'     => 1,
				'qty'         => $this->input->post('total_koin'),
				'total_harga' => $this->input->post('jumlah_koin')
			);
		return $this->db->insert('tbl_detail_cucikoin', $field);
	}
	function input_detail_cucikoin($i){
		$jumlah = $this->input->post('jumlah'.$i);
		$harga = $this->input->post('harga_item'.$i);
		$diskon = $this->input->post('diskon_item'.$i);
		$total_harga = ($jumlah * $harga) - ($jumlah * $diskon);
		$field = array(
				'invoice_no'  => $this->input->post('no_invoice'),
				'id_item'     => $this->input->post('id_item'.$i),
				'qty'         => $this->input->post('jumlah'.$i),
				'total_harga' => $total_harga
			);
		return $this->db->insert('tbl_detail_cucikoin', $field);
	}
	function input_all_satuan(){
		$field = array(
				'tgl_masuk'  => date('Y-m-d H:i:s'),
				'tgl_keluar' => date('Y-m-d H:i:s', time()+(60*60*24*2)),
				'no_bon'     => $this->input->post('no_bon'),
				'operator'   => $this->session->userdata('nama_user'),
				'nama'       => $this->input->post('nama'),
				'no_hp'      => $this->input->post('telepon'),
				'alamat'     => $this->input->post('alamat'),
				'total_bon'  => $this->input->post('grand_total'),
				'ket'      => 0
			);
		return $this->db->insert('tbl_cucisatuan', $field);
	}
	function input_all_koin(){
		$field = array(
				'operator' => $this->session->userdata('nama_user'),
				'invoice_no' => $this->input->post('no_invoice'),
				'nama' => $this->input->post('nama'),
				'no_hp' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat'),
				'tgl_masuk' => date('Y-m-d'),
				'jam_masuk' => date('H:i:s'),
				'total_bon' => $this->input->post('grand_total'),
				'ket'       => 0
			);
		return $this->db->insert('tbl_cucikoin', $field);
	}
	function all_finish(){
		$this->db->where('operator_id', $this->session->userdata('operator_id'));
		return $this->db->delete('tbl_bantu');
	}
	function hapus_row($id, $nobon){
		return $this->db
						->where('id', $id)
						->where('no_bon', $nobon)
						->delete('tbl_detail_cucisatuan');
	}

	

	function mesin_washer(){
		$data = json_decode(stripslashes($this->input->post('array_washer')));
		$koin = json_decode(stripslashes($this->input->post('koin_washer')));
		for($i=0;$i<count($data);$i++){
			if($data[$i] != 0){
				$field = array(
						'jenis_mesin' => 1,
						'no_invoice'  => $this->input->post('no_invoice'),
						'nomor_mesin' => $data[$i],
						'koin'        => $koin[$i],
						'tgl_pakai'   => date('Y-m-d'),
						'jam'         => date('H:i:s')
				);
				$this->db->insert('tbl_mesin', $field);
			}
		}
		return true;
	}
	function mesin_drayer(){
		$data = json_decode(stripslashes($this->input->post('array_drayer')));
		$koin = json_decode(stripslashes($this->input->post('koin_drayer')));
		for($i=0;$i<count($data);$i++){
			if($data[$i] != 0){
				$field = array(
						'jenis_mesin' => 2,
						'no_invoice'  => $this->input->post('no_invoice'),
						'nomor_mesin' => $data[$i],
						'koin'        => $koin[$i],
						'tgl_pakai'   => date('Y-m-d'),
						'jam'         => date('H:i:s')
				);
				$this->db->insert('tbl_mesin', $field);
			}
		}
		return true;
	}


}

 ?>
