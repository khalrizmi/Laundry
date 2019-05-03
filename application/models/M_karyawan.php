<?php 

class M_karyawan extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function tampil_data(){
		return $this->db->get('tbl_user');
	}

	public function input_data(){
		$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => md5(strtolower($this->input->post('password'))),
					'alamat' => $this->input->post('alamat'),
					'telepon' => $this->input->post('telepon'),
					'level' => $this->input->post('level'),
					'status' => $this->input->post('status'),
					'tgl_buat' => date('Y-m-d H:i:s')
				);
		$this->db->insert('tbl_user', $data);
		return TRUE;
	}

	public function edit($id){
		$this->db->where('user_id', $id);
		return $this->db->get('tbl_user')->row_array();
	}

	public function delete($id){
		$this->db->where('user_id', $id);
		return $this->db->delete('tbl_user');
	}

	public function update($id){
		$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => md5(strtolower($this->input->post('password'))),
					'alamat' => $this->input->post('alamat'),
					'telepon' => $this->input->post('telepon'),
					'level' => $this->input->post('level'),
					'status' => $this->input->post('status')
				);
		$this->db->where('user_id', $id);
		return $this->db->update('tbl_user', $data);
	}
}

 ?>
