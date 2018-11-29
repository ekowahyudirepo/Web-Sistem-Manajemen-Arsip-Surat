<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirimemail extends CI_Model {

	public function kirim( $tujuan , $subject , $pesan )
	{
		$this->load->library('email');

		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('admin@stainked_arsip.com', 'Admin SIMAS');
		$this->email->to( $tujuan );
		$this->email->subject( $subject );
		$this->email->message( $pesan );
		$this->email->send();
		
	}

}

/* End of file kirimemail.php */
/* Location: ./application/models/kirimemail.php */