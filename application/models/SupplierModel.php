<?php


class SupplierModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_semua()
	{
		$this->db->from('barang_supplier');
		$this->db->join('barang_pengguna','barang_pengguna.pengguna_id = barang_supplier.supplier_kepala_id');
		$this->db->order_by('supplier_date_created', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu($id)
	{
		$this->db->from('barang_supplier');
		$this->db->where('supplier_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function lihat_satu_admin($id)
	{
		$this->db->from('barang_supplier');
		$this->db->join('barang_pengguna','barang_pengguna.pengguna_id = barang_supplier.supplier_admin_id');
		$this->db->where('supplier_admin_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function lihat_satu_sekretaris($id)
	{
		$this->db->from('barang_supplier');
		$this->db->join('barang_pengguna','barang_pengguna.pengguna_id = barang_supplier.supplier_sekretaris_id');
		$this->db->where('pengguna_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function tambah_supplier($data)
	{
		$this->db->insert('barang_supplier', $data);
	}

	public function edit_supplier($id, $data)
	{
		$this->db->where('supplier_id', $id);
		$this->db->update('barang_supplier', $data);
	}

	public function hapus_supplier($id)
	{
		$this->db->where('supplier_id', $id);
		$this->db->delete('barang_supplier');
	}
}
