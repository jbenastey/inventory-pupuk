<?php


class MasukController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PupukModel','pupuk');
		$this->load->model('MasukModel','masuk');

		$this->load->helper('nominal');
		$this->load->helper('tgl_indo');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}
	public function index(){
		$data = array(
			'masuk' => $this->masuk->lihat_semua()
		);
		$this->load->view('templates/header');
		$this->load->view('masuk/index',$data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'masuk_pupuk_id' => $this->input->post('pupuk'),
				'masuk_jumlah' => $this->input->post('jumlah'),
				'masuk_tanggal' => $this->input->post('tanggal'),
				'masuk_created_by' => $this->session->userdata('pengguna_id'),
			);
			$pupuk = $this->pupuk->lihat_satu($data['masuk_pupuk_id']);
			$dataPupuk = array(
				'pupuk_stok' => $pupuk['pupuk_stok'] + $data['masuk_jumlah']
			);
			$this->masuk->tambah_masuk($data);
			$this->pupuk->edit_pupuk($data['masuk_pupuk_id'],$dataPupuk);
			redirect('masuk');
		} else {
			$data = array(
				'pupuk' => $this->pupuk->lihat_semua()
			);
			$this->load->view('templates/header');
			$this->load->view('masuk/tambah',$data);
			$this->load->view('templates/footer');
		}
	}

	public function hapus($id){
		$masuk = $this->masuk->lihat_satu($id);
//		var_dump();die;
		$pupuk = $this->pupuk->lihat_satu($masuk['masuk_pupuk_id']);
		$dataPupuk = array(
			'pupuk_stok' => $pupuk['pupuk_stok'] - $masuk['masuk_jumlah']
		);
		$this->pupuk->edit_pupuk($masuk['masuk_pupuk_id'],$dataPupuk);
		$this->masuk->hapus_masuk($id);
		redirect('masuk');
	}
}
