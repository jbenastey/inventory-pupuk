<?php


class PupukModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_semua()
	{
		$this->db->from('barang_pupuk');
		$this->db->join('barang_kategori','barang_pupuk.pupuk_kategori_id = barang_kategori.kategori_id');
		$this->db->join('barang_pengguna','barang_pupuk.pupuk_created_by = barang_pengguna.pengguna_id');
		$this->db->join('barang_supplier','barang_supplier.supplier_admin_id = barang_pengguna.pengguna_id');
		$this->db->order_by('pupuk_date_created', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu($id)
	{
		$this->db->from('barang_pupuk');
		$this->db->where('pupuk_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function tambah_pupuk($data)
	{
		$this->db->insert('barang_pupuk', $data);
	}

	public function edit_pupuk($id, $data)
	{
		$this->db->where('pupuk_id', $id);
		$this->db->update('barang_pupuk', $data);
	}

	public function hapus_pupuk($id)
	{
		$this->db->where('pupuk_id', $id);
		$this->db->delete('barang_pupuk');
	}
}
