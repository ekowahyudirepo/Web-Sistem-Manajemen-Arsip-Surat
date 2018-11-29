<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_luar extends CI_Controller {
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
		$this->load->model('kontak');
		$data['kontak'] = $this->kontak->tampil();

		$this->load->view('header');
		$this->load->view('kontak/luar', $data);
		$this->load->view('footer');
	}

	public function tambah()
	{
		$this->load->view('header');
		$this->load->view('kontak/tmb_luar');
		$this->load->view('footer');
	}

	public function add()
	{
		$this->load->model('kontak');
		$this->kontak->add();

		redirect( base_url().'kontak_luar/tambah' );
	}

	public function edit()
	{
		$id = $this->uri->segment(3);

		$this->load->model('kontak');
		$data['kontak'] = $this->kontak->tampilEdit($id);

		$this->load->view('header');
		$this->load->view('kontak/edit_luar', $data);
		$this->load->view('footer');
	}
	public function update()
	{
		$id =  $this->uri->segment(3);

		$this->load->model('kontak');
		$this->kontak->update($id);

		redirect( base_url().'kontak_luar' );
	}
}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */