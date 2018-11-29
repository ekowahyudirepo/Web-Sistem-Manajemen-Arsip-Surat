<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

	public function login( $username , $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		return $this->db->get('user');
		
	}

}

/* End of file login.php */
/* Location: ./application/models/login.php */