<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak2 extends CI_Model {

	function __construct()
	{	
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

	public function tampil()
	{
		return $this->db->get('kontak2');
	}

	public function totalDisposisiBagian($id = NULL)
	{
		if ( !empty($id) ) {
			$this->db->where('id_kontak2_disposisi', $id);
		}
		
		return $this->db->get('disposisi');
	}

	public function tampilEdit($id)
	{

		$this->db->where('id_kontak2', $id);
		return $this->db->get('kontak2');

	}

	public function add()
	{

		$nama       = $this->input->post('nama');

		$data = array(
        'id_kontak2' => '',
        'kontak2' => $nama
        );

		$sql = $this->db->insert('kontak2', $data);

		if ( !$sql ) 
	        {
	        	$this->riwayat->add( 'KSI0' );
	        	$this->no('Gagal menambahkan');
	        } 
        else 
	        {
	        	$this->riwayat->add( 'KSI1' );
	        	$this->ok('Berhasil menambahkan');
	        }
        
	}

	public function update($id)
	{

		$nama       = $this->input->post('nama');

		$data = array(
        'kontak2' => $nama
        );

        $this->db->where('id_kontak2', $id);

		$sql = $this->db->update('kontak2', $data);

		if ( !$sql ) 
	        {
	        	$this->riwayat->add( 'KSU0' );
	        	$this->no('Gagal mengubah');
	        } 
        else 
	        {
	        	$this->riwayat->add( 'KSU1' );
	        	$this->ok('Berhasil mengubah');
	        }
        
	}
	

}

/* End of file kontak_dalam.php */
/* Location: ./application/models/kontak_dalam.php */