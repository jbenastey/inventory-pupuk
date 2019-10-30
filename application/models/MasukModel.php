<?php


class MasukModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_semua()
	{
		$this->db->from('barang_masuk');
		$this->db->join('barang_pupuk','barang_masuk.masuk_pupuk_id = barang_pupuk.pupuk_id');
		$this->db->order_by('masuk_date_created', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu($id)
	{
		$this->db->from('barang_masuk');
		$this->db->where('masuk_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function tambah_masuk($data)
	{
		$this->db->insert('barang_masuk', $data);
	}

	public function edit_masuk($id, $data)
	{
		$this->db->where('masuk_id', $id);
		$this->db->update('barang_masuk', $data);
	}

	public function hapus_masuk($id)
	{
		$this->db->where('masuk_id', $id);
		$this->db->delete('barang_masuk');
	}
}
