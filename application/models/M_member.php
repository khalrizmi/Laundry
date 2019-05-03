<?php 

class M_member extends CI_Model
{
	function __construct(){
		$this->load->database();
	}

	function tampil_data(){
		return $this->db->get('tbl_member')->result();
	}

	function auto_kode(){
		$this->db->select_max('no_member', 'kode');
		return $this->db->get('tbl_member')->row_array();
	}

	function input_data($no_member){
		$data = array(
				'no_member' => $no_member,
				'nama' => $this->input->post('nama'),
				'telepon' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat'),
				'tgl_aktivitas' => $this->input->post('aktivitas'),
				'tgl_no_aktivitas' => $this->input->post('noaktivitas'),
				'jumlah_stam' => $this->input->post('jumlah_stam')
			);
		return $this->db->insert('tbl_member', $data);
	}

	function edit($id){
		$this->db->where('no_member', $id);
		return $this->db->get('tbl_member')->row_array();
	}

	function update_data($id){
		$data = array(
				'nama' => $this->input->post('nama'),
				'telepon' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat'),
				'tgl_aktivitas' => $this->input->post('aktivitas'),
				'tgl_no_aktivitas' => $this->input->post('noaktivitas'),
				'jumlah_stam' => $this->input->post('jumlah_stam')
			);
		$this->db->where('no_member', $id);
		return $this->db->update('tbl_member', $data);
	}

	function delete($id){
		$this->db->where('no_member', $id);
		return $this->db->delete('tbl_member');
	}
}

 ?>