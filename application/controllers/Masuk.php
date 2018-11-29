<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		date_default_timezone_set('Asia/Jakarta');

		if ( empty( $this->session->userdata('level')) || ( $this->session->userdata('level') == 'user2'  ) ) {
			$this->riwayat->add( 4 );
			$this->session->set_flashdata('alert', '<div class="alert alert-danger animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Session dilanggar</strong></div>');
			redirect( base_url() );
		}
	}

	public function index()
	{
		$this->load->model('surat_masuk');
		$data['kontak'] = $this->surat_masuk->tampilKontak();
		$data['sm'] = $this->surat_masuk->tampilSuratMasuk();

		$this->load->view('header');
		$this->load->view('masuk/home', $data );
		$this->load->view('footer');
	}

	public function lembar_disposisi()
	{
		$id = $this->uri->segment(3);

		$this->load->model('surat_masuk');
		$data['lem']	 = $this->surat_masuk->dataCetakLembarDisposisi($id);

		$this->load->view('masuk/lembar_disposisi', $data);


	}

	public function tambah()
	{

		$this->load->model('surat_masuk');
		$data['kontak'] = $this->surat_masuk->tampilKontak();

		$this->load->view('header');
		$this->load->view('masuk/tambah', $data);
		$this->load->view('footer');
	}

	public function disposisi()
	{

		$this->load->model('surat_disposisi');
		$data['kontak2'] = $this->surat_disposisi->tampilKontak2();

		$this->load->view('header');
		$this->load->view('disposisi/tambah', $data);
		$this->load->view('footer');
	}

	public function edit()
	{
		$id             = $this->uri->segment(3);

		$this->load->model('surat_masuk');
		$data['kontak'] = $this->surat_masuk->tampilKontak();
		$data['edit']   = $this->surat_masuk->tampilEdit($id);

		$this->load->view('header');
		$this->load->view('masuk/edit', $data);
		$this->load->view('footer');
	}

	public function upload()
	{
		$this->load->model('surat_masuk');

		$this->load->view('header');
		$this->load->view('masuk/upload');
		$this->load->view('footer');
	}


	public function add()
	{
		$this->load->model('surat_masuk');
		$this->surat_masuk->add();

		redirect( base_url().'masuk/tambah' );
	}


	public function addDisposisi()
	{
		$this->load->model('surat_disposisi');
		$this->surat_disposisi->add();

		redirect( base_url().'masuk' );
	}

	public function update()
	{
		$id     = $this->uri->segment(3);

		$this->load->model('surat_masuk');
		$this->surat_masuk->update($id);

		redirect( base_url().'masuk' );
	}

	public function hapusfile()
	{
		$this->load->model('surat_masuk');

		$id   = $this->uri->segment(3);
		$file = $this->uri->segment(4);

		$this->surat_masuk->hapusfile($id, $file);

		redirect( base_url().'masuk' );
	}

	public function hapus()
	{
		$this->load->model('surat_masuk');

		$id   = $this->uri->segment(3);
		$file = $this->uri->segment(4);

		$this->surat_masuk->hapusfile($id, $file);
		$this->surat_masuk->hapusdata($id);

		redirect( base_url().'masuk' );
	}

	public function up()
	{
		$this->load->model('surat_masuk');

		$id = $this->input->post('id');
		$this->surat_masuk->up($id);
		
		redirect( base_url().'masuk' );
	}

	public function cari()
	{
		$this->load->model('surat_masuk');
		$data['kontak'] = $this->surat_masuk->tampilKontak();
		$data['csm'] = $this->surat_masuk->cariSuratMasuk($this->input->post('i'), $this->input->post('k'), $this->input->post('m'), $this->input->post('s'));

		$this->load->view('header');
		$this->load->view('masuk/cari', $data );
		$this->load->view('footer');
	}
	

}

/* End of file Surat_Masuk.php */
/* Location: ./application/controllers/Surat_Masuk.php */