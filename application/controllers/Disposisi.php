<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if ( empty( $this->session->userdata('level')) || ( $this->session->userdata('level') == 'user1' ) ) {
			$this->riwayat->add( 4 );
			$this->session->set_flashdata('alert', '<div class="alert alert-danger animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Session dilanggar</strong></div>');
			redirect( base_url() );
		}
	}

	public function index()
	{
		$this->load->model('surat_disposisi');
		$data['kontak2'] = $this->surat_disposisi->tampilKontak2();
		$data['dis']	 = $this->surat_disposisi->tampilSuratDisposisi();

		$this->load->view('header');
		$this->load->view('disposisi/home', $data);
		$this->load->view('footer');
	}

	public function edit()
	{

		$this->load->view('header');
		$this->load->view('disposisi/edit');
		$this->load->view('footer');
	}

	public function upload()
	{
		$this->load->model('surat_disposisi');

		$this->load->view('header');
		$this->load->view('disposisi/upload');
		$this->load->view('footer');
	}


	public function update()
	{
		$id     = $this->uri->segment(3);

		$this->load->model('surat_disposisi');
		$this->surat_disposisi->update($id);

		redirect( base_url().'disposisi' );
	}

	public function hapusfile()
	{
		$this->load->model('surat_disposisi');

		$id   = $this->uri->segment(3);
		$file = $this->uri->segment(4);

		$this->surat_disposisi->hapusfile($id, $file);

		redirect( base_url().'disposisi' );
	}

	public function hapus()
	{
		$this->load->model('surat_disposisi');

		$id   = $this->uri->segment(3);
		$file = $this->uri->segment(4);

		$this->surat_disposisi->hapusfile($id, $file);
		$this->surat_disposisi->hapusdata($id);

		redirect( base_url().'disposisi' );
	}

	public function up()
	{
		$this->load->model('surat_disposisi');

		$id = $this->input->post('id');
		$this->surat_disposisi->up($id);
		
		redirect( base_url().'disposisi' );
	}

	public function cari()
	{
		$this->load->model('surat_disposisi');
		$data['kontak2'] = $this->surat_disposisi->tampilKontak2();
		$data['cdis'] = $this->surat_disposisi->cariSuratDisposisi($this->input->get('i'), $this->input->get('k'), $this->input->get('m'), $this->input->get('s'));

		$this->load->view('header');
		$this->load->view('disposisi/cari', $data );
		$this->load->view('footer');
	}

}

/* End of file Disposisi.php */
/* Location: ./application/controllers/Disposisi.php */