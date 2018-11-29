<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if ( empty( $this->session->userdata('level')) ) {
			$this->riwayat->add( 4 );
			$this->session->set_flashdata('alert', '<div class="alert alert-danger animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Session dilanggar</strong></div>');
			redirect( base_url() );
		}
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('utama');
		$this->load->view('footer');

	}

	public function not_found()
	{
		$this->load->view('header');
		$this->load->view('404');
		$this->load->view('footer');
	}

	




}
