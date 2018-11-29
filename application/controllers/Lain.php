<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Lain extends CI_Controller {

	public function hakakses( $value )
	{
		if ( empty( $this->session->userdata('level')) || ( $this->session->userdata('level') == 'user2') || ( $this->session->userdata('level') == 'user1'  ) ) {
			$this->riwayat->add( $value );
			$this->session->set_flashdata('alert', '<div class="alert alert-danger animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong> Akses ditolak </strong></div>');
			redirect( base_url() );
		}
	}


	public function akun()
	{
		$id = $this->session->userdata('id');

		$this->load->model('akun');
		$data['akun'] = $this->akun->tampil( $id );
		$this->load->view('header');
		$this->load->view('lain/akun', $data);
		$this->load->view('footer');
	}

		public function kirimakunbaru()
		{
			$nama     = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$tujuan   = $this->input->post('email');

			$this->load->model('akun');
			$this->akun->kirimakunbaru( $nama , $username , $password , $tujuan );
			redirect( base_url().'lain/akun' );
		}

		public function kirimemailbaru()
		{
			$tujuan   = $this->input->post('email');

			$this->load->model('akun');
			$this->akun->kirimemailbaru($tujuan, $tujuan );
			redirect( base_url().'lain/akun' );
		}

	public function pengguna()
	{
		$this->hakakses( 5 );
		$this->load->model('pengguna');
		$data['peng'] = $this->pengguna->tampil();

		$this->load->view('header');
		$this->load->view('lain/pengguna', $data);
		$this->load->view('footer');
	}

	public function tambahpengguna()
	{
		$this->load->view('header');
		$this->load->view('lain/tmb_pengguna');
		$this->load->view('footer');
	}

	public function addpengguna()
	{
		$this->load->model('pengguna');
		$this->pengguna->add();
		redirect( base_url().'lain/tambahpengguna' );
	}

	public function hapuspengguna()
	{
		$this->hakakses( 5 );
		$id = $this->uri->segment(3);
		$this->load->model('pengguna');
		$this->pengguna->hapus( $id );
		
		redirect(base_url().'lain/pengguna');

	}

	public function panduan()
	{
		$this->load->view('header');
		$this->load->view('lain/panduan');
		$this->load->view('footer');

	}

	public function about()
	{
		$this->load->view('header');
		$this->load->view('lain/about');
		$this->load->view('footer');

	}

	public function riwayat()
	{
		$this->hakakses( 4 );
		$data['riw'] = $this->riwayat->tampil();

		$this->load->view('header');
		$this->load->view('lain/riwayat', $data);
		$this->load->view('footer');
	}

	public function kosongkanriwayat()
	{
		$this->hakakses( 4 );
		$this->riwayat->kosongkan();
		redirect('lain/riwayat');
	}

}

/* End of file Lain.php */
/* Location: ./application/controllers/Lain.php */