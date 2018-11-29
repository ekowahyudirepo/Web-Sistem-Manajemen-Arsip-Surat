<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		error_reporting(0);
	}

	public function no($value)
	{
		$this->session->set_flashdata('alert', '<div class="alert alert-danger animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$value.'</strong></div>');
	}

	public function ok($value)
	{
		$this->session->set_flashdata('alert', '<div class="alert alert-success animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$value.'</strong></div>');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('login');

		$query = $this->login->login( $username , $password );
		$row   = $query->num_rows();
		$hasil = $query->result();

		if( $row == 1 )
			{
				foreach( $hasil as $user )

				$array = array(
					'id' => $user->id_user,
					'nama' => $user->nama_lengkap,
					'level' => $user->level_user
				);
				
				$this->session->set_userdata( $array );

				$this->riwayat->add( 'L1' );
				echo "sedang memeriksa ...";
				redirect( base_url().'welcome','refresh');
			}
		else
			{
				$this->riwayat->add( 'L0' );
				$this->no('username atau password anda salah');
				redirect( base_url() );
			}
	}

	
	public function logout()
	{
		$this->riwayat->add( 'L2' );
		$this->session->sess_destroy();
		redirect( base_url() );

	}


}

/* End of file autentikasi.php */
/* Location: ./application/controllers/autentikasi.php */