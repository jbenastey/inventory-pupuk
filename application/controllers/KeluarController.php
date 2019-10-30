<?php

class KeluarController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PupukModel', 'pupuk');
		$this->load->model('KeluarModel', 'keluar');
		$this->load->model('SupplierModel', 'supplier');

		$this->load->helper('nominal');
		$this->load->helper('tgl_indo');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data = array(
			'keluar' => $this->keluar->lihat_semua()
		);
		$this->load->view('templates/header');
		$this->load->view('keluar/index', $data);
		$this->load->view('templates/footer');
	}

	public function supplier()
	{
		if (isset($_POST['selanjutnya'])) {
			$supplier = $this->input->post('supplier');
			redirect('keluar/tambah/'.$supplier);
		} else {
			$data = array(
				'supplier' => $this->supplier->lihat_semua()
			);
			$this->load->view('templates/header');
			$this->load->view('keluar/supplier', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambah($id)
	{
		if (isset($_POST['tambah'])) {
			$pupukId = $this->input->post('pupuk');
			$jumlah = $this->input->post('jumlah');

			$pupuk = $this->pupuk->lihat_satu($pupukId);

			$total = $jumlah * $pupuk['pupuk_harga'];
//			var_dump($total);die;
			$data = array(
				'detail_faktur_id' => null,
				'detail_pupuk_id' => $pupukId,
				'detail_jumlah' => $jumlah,
				'detail_total' => $total,
			);
			$stokSekarang = $pupuk['pupuk_stok'] - $data['detail_jumlah'];
			if ($stokSekarang > 0) {
				$dataPupuk = array(
					'pupuk_stok' => $stokSekarang
				);
				$this->keluar->tambah_detail($data);
				$this->pupuk->edit_pupuk($pupukId, $dataPupuk);
				redirect('keluar/tambah/'.$id);
			} else {
				$this->session->set_flashdata('alert', 'stok_kurang');
				redirect('keluar/tambah/'.$id);
			}
			// var_dump($stokSekarang);die;
		} else {
			$data = array(
				'keluar' => $this->keluar->lihat_detail(),
				'pupuk' => $this->keluar->lihat_barang($id),
				'supplier' => $this->supplier->lihat_satu_admin($id)
			);
			$this->load->view('templates/header');
			$this->load->view('keluar/tambah', $data);
			$this->load->view('templates/footer');
		}
	}

	public function selesai()
	{
		if (isset($_POST['selesai'])) {
			$fakturId = 'INV-' . substr(time(), 5);
			$dataFaktur = array(
				'faktur_id' => $fakturId,
				'faktur_tanggal' => date('Y-m-d'),
				'faktur_total' => $this->input->post('total'),
				'faktur_supplier' => $this->input->post('supplier'),
				'faktur_created_by' => $this->session->userdata('pengguna_id'),
			);
			$dataDetail = array(
				'detail_faktur_id' => $fakturId
			);
			$this->keluar->tambah_faktur($dataFaktur);
			$this->keluar->edit_detail($dataDetail);
			redirect('keluar');
		}
	}

	public function lihat($id)
	{
		$data = array(
			'faktur' => $this->keluar->lihat_satu($id),
			'detail' => $this->keluar->lihat_satu_detail($id),
		);
		$this->load->view('templates/header');
		$this->load->view('keluar/lihat', $data);
		$this->load->view('templates/footer');
	}

	public function validKepala($id)
	{
		$data = array(
			'faktur_status' => 'valid_kepala',
		);
		$this->keluar->edit_faktur($id, $data);
		redirect('keluar/lihat/' . $id);
	}

	public function validSekretaris($id)
	{
		$data = array(
			'faktur_status' => 'valid_sekretaris',
		);
		$this->keluar->edit_faktur($id, $data);
		redirect('keluar/lihat/' . $id);
	}

	public function validSupplier($id)
	{
		$data = array(
			'faktur_status' => 'valid_supplier',
		);
		$this->keluar->edit_faktur($id, $data);
		redirect('keluar/lihat/' . $id);
	}

}
