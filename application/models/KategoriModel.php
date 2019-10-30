<?php

class KategoriModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_semua()
	{
		$this->db->from('barang_kategori');
		$this->db->order_by('kategori_date_created', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu($id)
	{
		$this->db->from('barang_kategori');
		$this->db->where('kategori_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function tambah_kategori($data)
	{
		$this->db->insert('barang_kategori', $data);
	}

	public function edit_kategori($id, $data)
	{
		$this->db->where('kategori_id', $id);
		$this->db->update('barang_kategori', $data);
	}

	public function hapus_kategori($id)
	{
		$this->db->where('kategori_id', $id);
		$this->db->delete('barang_kategori');
	}
}
