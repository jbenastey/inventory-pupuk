<?php

class AuthModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function cek($data)
	{
		$query = $this->db->get_where('barang_pengguna',$data);
		return $query->row_array();
	}

	public function lihat_semua()
	{
		$this->db->from('barang_pengguna');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_supplier_kepala()
	{
		$this->db->from('barang_pengguna');
		$this->db->like('pengguna_level','kepala supplier');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_supplier_admin()
	{
		$this->db->from('barang_pengguna');
		$this->db->like('pengguna_level','admin supplier');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_supplier_sekretaris()
	{
		$this->db->from('barang_pengguna');
		$this->db->like('pengguna_level','sekretaris');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_pengguna($data)
	{
		$this->db->insert('barang_pengguna', $data);
	}

	public function hapus_pengguna($id)
	{
		$this->db->where('pengguna_id', $id);
		$this->db->delete('barang_pengguna');
	}
}
