<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Model {

	public function no($value)
	{
		$this->session->set_flashdata('alert', '<div class="alert alert-danger animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$value.'</strong></div>');
	}

	public function ok($value)
	{
		$this->session->set_flashdata('alert', '<div class="alert alert-success animated bounceIn"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$value.'</strong></div>');
	}

	public function tampil()
	{
		$this->db->order_by('level_user', 'esc');
		return $this->db->get('user');
	}

	public function add()
	{
		$nama      = $this->input->post('nama');
		$email     = $this->input->post('email');
		$level     = $this->input->post('level');

		$data = array(
        'id_user' => '',
        'username' => $nama,
        'password' => $nama,
        'nama_lengkap' => $nama,
        'email' => $email,
        'level_user' => $level
        );

		$sql = $this->db->insert('user', $data);

		if ( !$sql ) 
	        {
	        	$this->no('Gagal menambahkan');
	        } 
        else 
	        {
	        	$this->ok('Berhasil menambahkan');
	        }
	}

	public function hapus( $id )
	{
		$this->db->where('id_user', $id);
		$sql = $this->db->delete('user');

		if ( !$sql ) 
	        {
	        	$this->no('Gagal menghapus');
	        } 
        else 
	        {
	        	$this->ok('Berhasil menghapus');
	        }
	}

}

/* End of file pengguna.php */
/* Location: ./application/models/pengguna.php */