<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Model {

	function __construct()
	{	
		date_default_timezone_set('Asia/Jakarta');
	}

	public function no($value)
	{
		$this->session->set_flashdata('alert', '<div class="alert alert-danger animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$value.'</strong></div>');
	}

	public function ok($value)
	{
		$this->session->set_flashdata('alert', '<div class="alert alert-success animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$value.'</strong></div>');
	}

	public function tampil( $id )
	{
		$this->db->where('id_user', $id);
		return $this->db->get('user');
	}

	public function kirimakunbaru( $nama , $username, $password, $tujuan )
	{
		
		$namaEncry     = base64_encode( $nama );
		$usernameEncry = base64_encode( $username );
		$passwordEncry = base64_encode( $password );

		$link = base_url().'konfirmasi/?mode=A&N='.$namaEncry.'&U='.$usernameEncry.'&P='.$passwordEncry.'&token='.md5($tujuan);

		$this->load->model('kirimemail');

		// pesan html
		$pesan = '<html><body>';
		$pesan .= '<h3>Konfirmasi Email anda</h3>';
		$pesan .= '<p>Silahkan "klik" tombol <b>Konfirmasi</b> untuk konfirmasi email anda</p>';
		$pesan .= '<a href="'.$link.'" style="background-color: teal;color: white;padding: 10px"> Konfirmasi </a>';
		$pesan .= '</body></html>';
		// akhir pesan html


		$kirim = $this->kirimemail->kirim( $tujuan , 'konfirmasi ganti akun' , $pesan );


		if ( $kirim ) 
			{
				$this->no('Gagal mengirim');
			}
		else 
			{
				$this->ok('Berhasil mengirim , silahkan konfirmasi email anda <a href="'.$link.'">konfirmasi</a>');
			}

	}

		public function akunbaru($namabaru , $usernamebaru , $passwordbaru)
		{
			$object = array('nama_lengkap' => $namabaru, 'username' => $usernamebaru, 'password' => $passwordbaru );

			$this->db->where('id_user', $this->session->userdata('id') );
			
			$update = $this->db->update('user', $object);
			if ( !$update ) 
				{
					$this->no('Gagal memperbarui');
					$this->riwayat->add( 'A0' );
				}
			else 
				{
					$this->ok('Berhasil memperbarui');
					$this->riwayat->add( 'A1' );
				}

		}

	public function kirimemailbaru( $email, $tujuan )
	{

		$emailEncry = base64_encode($email);

		$link = base_url().'konfirmasi/?mode=M&M='.$emailEncry.'&token='.md5($emailEncry);

		$this->load->model('kirimemail');

		// pesan html
		$pesan  = '<html><body>';
		$pesan .= '<h3>Konfirmasi Email anda</h3>';
		$pesan .= '<p>Silahkan "klik" tombol <b>Konfirmasi</b> untuk konfirmasi email anda</p>';
		$pesan .= '<a href="'.$link.'" style="background-color: teal;color: white;padding: 10px"> Konfirmasi </a>';
		$pesan .= '</body></html>';
		// akhir pesan html

		$kirim = $this->kirimemail->kirim( $tujuan , 'konfirmasi ganti email' , $pesan );

		if ( $kirim ) 
			{
				$this->no('Gagal mengirim');
			}
		else 
			{
				$this->ok('Berhasil mengirim , silahkan konfirmasi email anda <a href="'.$link.'">konfirmasi</a>');
			}


	}

		public function emailbaru($emailbaru)
		{
			$object = array('email' => $emailbaru );

			$this->db->where('id_user', $this->session->userdata('id') );

			$update = $this->db->update('user', $object);

			if ( !$update ) 
				{
					$this->no('Gagal memperbarui');
					$this->riwayat->add( 'AM0' );
				}
			else 
				{
					$this->ok('Berhasil memperbarui');
					$this->riwayat->add( 'AM1' );
				}

		}

	public function lupa( $email )
	{		
		$this->db->where('email', $email);
		return $this->db->get('user');
	}


}

/* End of file akun.php */
/* Location: ./application/models/akun.php */