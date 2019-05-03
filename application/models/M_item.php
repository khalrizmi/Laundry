<?php 

class M_item extends CI_Model
{
	function __construct(){
		$this->load->database();
	}

	function tampil(){
		return $this->db->get('tbl_item')->result();
	}

	function input_data(){
		$data = array(
				'nama_item' => $this->input->post('nama'),
				'tipe_item' => $this->input->post('tipe_item'),
				'harga_normal' => $this->input->post('har_nom'),
				'diskon_promo' => $this->input->post('dis_prom'),
				'hemat_member' => $this->input->post('hem_mem')
			);
		return $this->db->insert('tbl_item', $data);
	}

	function edit($id){
		$this->db->where('id_item', $id);
		return $this->db->get('tbl_item')->row_array();
	}

	function update_data($id){
		$data = array(
				'nama_item' => strtoupper($this->input->post('nama')),
				'harga_normal' => $this->input->post('har_nom'),
				'diskon_promo' => $this->input->post('dis_prom'),
				'hemat_member' => $this->input->post('hem_mem')
			);
		$this->db->where('id_item', $id);
		return $this->db->update('tbl_item', $data);
	}

	function delete_data($id){
		$this->db->where('id_item', $id);
		return $this->db->delete('tbl_item');
	}
}

 ?>
