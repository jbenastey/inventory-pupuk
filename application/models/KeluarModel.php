<?php


class KeluarModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_semua()
	{
		$this->db->from('barang_faktur');
		$this->db->order_by('faktur_date_created', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_detail()
	{
		$this->db->from('barang_faktur_detail');
		$this->db->join('barang_pupuk','barang_pupuk.pupuk_id = barang_faktur_detail.detail_pupuk_id');
		$this->db->join('barang_pengguna','barang_pengguna.pengguna_id = barang_pupuk.pupuk_created_by');
		$this->db->join('barang_supplier','barang_supplier.supplier_admin_id = barang_pengguna.pengguna_id');
		$this->db->where('detail_faktur_id',null);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu($id)
	{
		$this->db->from('barang_faktur');
		$this->db->join('barang_supplier','barang_supplier.supplier_id = barang_faktur.faktur_supplier');
		$this->db->where('faktur_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function lihat_satu_detail($id)
	{
		$this->db->from('barang_faktur_detail');
		$this->db->join('barang_pupuk','barang_pupuk.pupuk_id = barang_faktur_detail.detail_pupuk_id');
		$this->db->join('barang_pengguna','barang_pengguna.pengguna_id = barang_pupuk.pupuk_created_by');
		$this->db->join('barang_supplier','barang_supplier.supplier_admin_id = barang_pengguna.pengguna_id');
		$this->db->where('detail_faktur_id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_faktur($data)
	{
		$this->db->insert('barang_faktur', $data);
	}

	public function tambah_detail($data)
	{
		$this->db->insert('barang_faktur_detail', $data);
	}

	public function edit_detail($data)
	{
		$this->db->where('detail_faktur_id', null);
		$this->db->update('barang_faktur_detail', $data);
	}

	public function edit_faktur($id,$data)
	{
		$this->db->where('faktur_id', $id);
		$this->db->update('barang_faktur', $data);
	}

	public function hapus_masuk($id)
	{
		$this->db->where('masuk_id', $id);
		$this->db->delete('barang_masuk');
	}

	public function lihat_barang($id)
	{
		$this->db->from('barang_pupuk');
		$this->db->join('barang_pengguna','barang_pengguna.pengguna_id = barang_pupuk.pupuk_created_by');
		$this->db->join('barang_supplier','barang_supplier.supplier_admin_id = barang_pengguna.pengguna_id');
		$this->db->where('supplier_admin_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

}
