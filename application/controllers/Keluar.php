<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if ( empty( $this->session->userdata('level')) || ( $this->session->userdata('level') == 'user2' ) ) {
			$this->riwayat->add( 4 );
			$this->session->set_flashdata('alert', '<div class="alert alert-danger animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Session dilanggar</strong></div>');
			redirect( base_url() );
		}
	}

	public function index()
	{

		$this->load->model('surat_keluar');
		$data['kontak'] = $this->surat_keluar->tampilKontak();
		$data['sk'] = $this->surat_keluar->tampilSuratKeluar();

		$this->load->view('header');
		$this->load->view('keluar/home', $data );
		$this->load->view('footer');
	}

	public function tambah()
	{

		$this->load->model('surat_keluar');
		$data['kontak'] = $this->surat_keluar->tampilKontak();

		$this->load->view('header');
		$this->load->view('keluar/tambah', $data);
		$this->load->view('footer');
	}

	public function edit()
	{
		$id             = $this->uri->segment(3);

		$this->load->model('surat_keluar');
		$data['kontak'] = $this->surat_keluar->tampilKontak();
		$data['edit']   = $this->surat_keluar->tampilEdit($id);

		$this->load->view('header');
		$this->load->view('keluar/edit', $data);
		$this->load->view('footer');
	}

	public function add()
	{
		$this->load->model('surat_keluar');
		$this->surat_keluar->add();

		redirect( base_url().'keluar/tambah' );
	}

	public function update()
	{
		$id     = $this->uri->segment(3);

		$this->load->model('surat_keluar');
		$this->surat_keluar->update($id);

		redirect( base_url().'keluar' );
	}

	public function upload()
	{
		$this->load->model('surat_keluar');

		$this->load->view('header');
		$this->load->view('keluar/upload');
		$this->load->view('footer');
	}

	public function hapusfile()
	{
		$this->load->model('surat_keluar');

		$id   = $this->uri->segment(3);
		$file = $this->uri->segment(4);

		$this->surat_keluar->hapusfile($id, $file);

		redirect( base_url().'keluar' );
	}

	public function hapus()
	{
		$this->load->model('surat_keluar');

		$id   = $this->uri->segment(3);
		$file = $this->uri->segment(4);

		$this->surat_keluar->hapusfile($id, $file);
		$this->surat_keluar->hapusdata($id);

		redirect( base_url().'keluar' );
	}

	public function up()
	{
		$this->load->model('surat_keluar');

		$id = $this->input->post('id');
		$this->surat_keluar->up($id);
		
		redirect( base_url().'keluar' );
	}

	public function cari()
	{
		$this->load->model('surat_keluar');
		$data['kontak'] = $this->surat_keluar->tampilKontak();
		$data['csk'] = $this->surat_keluar->cariSuratKeluar($this->input->get('i'), $this->input->get('k'), $this->input->get('m'), $this->input->get('s'));

		$this->load->view('header');
		$this->load->view('keluar/cari', $data );
		$this->load->view('footer');
	}
	

}

/* End of file Surat_keluar.php */
/* Location: ./application/controllers/Surat_keluar.php */