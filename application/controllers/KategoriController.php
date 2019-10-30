<?php


class KategoriController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel', 'kategori');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data = array(
			'kategori' => $this->kategori->lihat_semua()
		);
		$this->load->view('templates/header');
		$this->load->view('kategori/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'kategori_nama' => $this->input->post('kategori'),
				'kategori_created_by' => $this->session->userdata('pengguna_id'),
			);
			$this->kategori->tambah_kategori($data);
			redirect('kategori');
		} else {
			$this->load->view('templates/header');
			$this->load->view('kategori/tambah');
			$this->load->view('templates/footer');
		}
	}

	public function edit($id)
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'kategori_nama' => $this->input->post('kategori'),
			);
			$this->kategori->edit_kategori($id, $data);
			redirect('kategori');
		} else {
			$data = array(
				'kategori' => $this->kategori->lihat_satu($id)
			);
			$this->load->view('templates/header');
			$this->load->view('kategori/edit',$data);
			$this->load->view('templates/footer');
		}
	}

	public function hapus($id){
		$this->kategori->hapus_kategori($id);
		redirect('kategori');
	}
}
