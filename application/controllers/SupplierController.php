<?php


class SupplierController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SupplierModel', 'supplier');
		$this->load->model('AuthModel', 'pengguna');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data = array(
			'supplier' => $this->supplier->lihat_semua(),
			'model' => $this->supplier
		);
		$this->load->view('templates/header');
		$this->load->view('supplier/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'supplier_nama' => $this->input->post('supplier'),
				'supplier_alamat' => $this->input->post('alamat'),
				'supplier_kepala_id' => $this->input->post('hak_akses_kepala'),
				'supplier_admin_id' => $this->input->post('hak_akses_admin'),
				'supplier_sekretaris_id' => $this->input->post('hak_akses_sekretaris'),
				'supplier_created_by' => $this->session->userdata('pengguna_id'),
			);
			$this->supplier->tambah_supplier($data);
			redirect('supplier');
		} else {
			$data = array(
				'kepala' => $this->pengguna->lihat_supplier_kepala(),
				'admin' => $this->pengguna->lihat_supplier_admin(),
				'sekretaris' => $this->pengguna->lihat_supplier_sekretaris(),
			);
			$this->load->view('templates/header');
			$this->load->view('supplier/tambah',$data);
			$this->load->view('templates/footer');
		}
	}

	public function edit($id)
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'supplier_nama' => $this->input->post('supplier'),
				'supplier_alamat' => $this->input->post('alamat'),
				'supplier_kepala_id' => $this->input->post('hak_akses_kepala'),
				'supplier_admin_id' => $this->input->post('hak_akses_admin'),
				'supplier_sekretaris_id' => $this->input->post('hak_akses_sekretaris'),
			);
			$this->supplier->edit_supplier($id, $data);
			redirect('supplier');
		} else {
			$data = array(
				'supplier' => $this->supplier->lihat_satu($id),
				'kepala' => $this->pengguna->lihat_supplier_kepala(),
				'admin' => $this->pengguna->lihat_supplier_admin(),
				'sekretaris' => $this->pengguna->lihat_supplier_sekretaris(),
			);
			$this->load->view('templates/header');
			$this->load->view('supplier/edit',$data);
			$this->load->view('templates/footer');
		}
	}

	public function hapus($id){
		$this->supplier->hapus_supplier($id);
		redirect('supplier');
	}
}
