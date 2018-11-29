<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if ( empty( $this->session->userdata('level')) || ( $this->session->userdata('level') == 'user2') || ( $this->session->userdata('level') == 'user1'  ) ) {
			$this->riwayat->add( 4 );
			$this->session->set_flashdata('alert', '<div class="alert alert-danger animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Session dilanggar</strong></div>');
			redirect( base_url() );
		}
	}


	public function index()
	{
		$this->load->view('header');
		$this->load->view('laporan/sesuaikan', $data);
		$this->load->view('footer');
		
	}


	public function harian()
	{
		$this->load->model('harian');
		$data['sm']  = $this->harian->masuk();
		$data['sk']  = $this->harian->keluar();
		$data['dis']  = $this->harian->disposisi();

		$page = $this->uri->segment(3);

		switch ( $page ) {
			case 'masuk':
				$this->load->view('masuk/print', $data);
				break;

			case 'keluar':
				$this->load->view('keluar/print', $data);
				break;

			case 'disposisi':
				$this->load->view('disposisi/print', $data);
				break;
			
			default:
				$this->load->view('header');
				$this->load->view('laporan/harian', $data);
				$this->load->view('footer');
				break;
		}

		
	}



	public function cetak()
	{
		$arsip  = $this->input->get('a');
		$mulai  = $this->input->get('m');
		$sampai = $this->input->get('s');

		switch ( $arsip ) {
			case 'masuk':

				$this->load->model('surat_masuk');
				$data['sm'] = $this->surat_masuk->cetak( $mulai , $sampai );
				
				$this->load->view('masuk/print', $data);
				
				break;

			case 'keluar':

				$this->load->model('surat_keluar');
				$data['sk'] = $this->surat_keluar->cetak( $mulai , $sampai );

				$this->load->view('keluar/print', $data);
				
				break;
			
			default:
				$this->load->model('surat_disposisi');
				$data['dis'] = $this->surat_disposisi->cetak( $mulai , $sampai );

				$this->load->view('disposisi/print', $data);
				break;
		}
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */