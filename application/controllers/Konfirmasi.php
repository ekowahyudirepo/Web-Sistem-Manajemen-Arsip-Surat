<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

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

	// konformasi ganti akun
	public function akunbaru()
	{ 
		$namaDecry     = base64_decode( $this->input->get('N') );
		$usernameDecry = base64_decode( $this->input->get('U') );
		$passwordDecry = base64_decode( $this->input->get('P') );

		$this->load->model('akun');
		$this->akun->akunbaru( $namaDecry , $usernameDecry , $passwordDecry);

		echo "<h2 style='text-align:center;margin-top:20%'> Sedang diproses ... </h2>";
		redirect( base_url().'lain/akun', 'refresh');
	}

	public function emailbaru()
	{

		$emailDecry = base64_decode( $this->input->get('M') );

		$this->load->model('akun');
		$this->akun->emailbaru($emailDecry);
		echo "<h2 style='text-align:center;margin-top:20%'> Sedang diproses ... </h2>";
		redirect( base_url().'lain/akun' , 'refresh');
	}

	public function lupa()
	{
		$this->load->model('akun');
		$tujuan = $this->input->post('email');
		$query  =  $this->akun->lupa( $tujuan );
		$row    = $query->num_rows();
		$hasil  = $query->result(); 

		if ( $row != 0 ) 
			{
				foreach ($hasil as $d);

				$this->load->model('kirimemail');

				$pesan  = '<html><body>';
				$pesan .= '<h3>Lupa Akun</h3>';
				$pesan .= '<p>Simpan dengan aman data akun anda</p>';
				$pesan .= '<p>Username : '.$d->username.'</p>';
				$pesan .= '<p>Password : '.$d->password.'</p>';
				$pesan .= '</body></html>';

				$kirim = $this->kirimemail->kirim( $tujuan , 'Lupa Akun' , $pesan );

				if ( $kirim ) 
					{
						$this->no('Gagal mengirim email');
					} 
				else 
					{
						$this->ok('Berhasil mengirim email ke : '.$tujuan);
					}
					
			}
		else
			{
				$this->no('Maaf, email tidak terdaftar');
			}
		
		redirect( base_url().'login/lupa');
	}



	public function index()
	{
		$mode = $this->input->get('mode');

		switch ($mode) {
			case 'A':
				$this->akunbaru();
				break;
			case 'M':
				$this->emailbaru();
				break;
			
			default:
				$this->lupa();
				break;
		}
	}

}

/* End of file Konfirmasi.php */
/* Location: ./application/controllers/Konfirmasi.php */