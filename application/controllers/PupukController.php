<?php


class PupukController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PupukModel','pupuk');
		$this->load->model('KategoriModel','kategori');

		$this->load->helper('nominal','tgl_indo');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}
	public function index(){
		$data = array(
			'pupuk' => $this->pupuk->lihat_semua()
		);
		$this->load->view('templates/header');
		$this->load->view('pupuk/index',$data);
		$this->load->view('templates/footer');
	}
	
	public function tambah()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'pupuk_nama' => $this->input->post('nama'),
				'pupuk_kategori_id' => $this->input->post('kategori'),
				'pupuk_stok' => $this->input->post('stok'),
				'pupuk_harga' => $this->input->post('harga'),
				'pupuk_created_by' => $this->session->userdata('pengguna_id'),
			);
			$this->pupuk->tambah_pupuk($data);
			redirect('pupuk');
		} else {
			$data = array(
				'kategori' => $this->kategori->lihat_semua()
			);
			$this->load->view('templates/header');
			$this->load->view('pupuk/tambah',$data);
			$this->load->view('templates/footer');
		}
	}

	public function edit($id)
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'pupuk_nama' => $this->input->post('nama'),
				'pupuk_kategori_id' => $this->input->post('kategori'),
				'pupuk_stok' => $this->input->post('stok'),
				'pupuk_harga' => $this->input->post('harga'),
			);
			$this->pupuk->edit_pupuk($id, $data);
			redirect('pupuk');
		} else {
			$data = array(
				'pupuk' => $this->pupuk->lihat_satu($id),
				'kategori' => $this->kategori->lihat_semua()
			);
			$this->load->view('templates/header');
			$this->load->view('pupuk/edit',$data);
			$this->load->view('templates/footer');
		}
	}

	public function hapus($id){
		$this->pupuk->hapus_pupuk($id);
		redirect('pupuk');
	}

	public function lihat_pupuk($id){
		$data = $this->pupuk->lihat_satu($id);
		echo json_encode($data);
	}
}
