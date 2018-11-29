<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Model {
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
	
	public function add( $log )
	{

		$id = $this->session->userdata('id');

		$data = array(
        'id_riwayat' => '',
        'id_user' => $id,
        'id_log' => $log,
        'ip' => $this->input->ip_address(),
        'tgl_riwayat' => date('Y-m-d H:i:s')
        );

		$this->db->insert('riwayat', $data);
	}

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('riwayat');
		$this->db->join('log', 'log.id_log = riwayat.id_log', 'left');
		$this->db->join('user', 'user.id_user = riwayat.id_user', 'left');
		$this->db->order_by('riwayat.tgl_riwayat', 'desc');
		return $this->db->get();
	}

	public function kosongkan()
	{

		if ( !$this->db->truncate('riwayat') ) 
			{
				$this->no("Gagal mengosongkan");
				$this->add( 'RD0' );
			}
		else
			{
				$this->ok("Berhasil mengosongkan");
				$this->add( 'RD1' );
			}
		
	}
	

	

}

/* End of file log.php */
/* Location: ./application/models/log.php */