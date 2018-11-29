<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Model {

	function __construct()
	{	
		date_default_timezone_set('Asia/Jakarta');
		//error_reporting(0);
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
		return $this->db->get('kontak');
	}

	public function totalMasukBagian($id = NULL)
	{
		if ( !empty($id) ) {
			$this->db->where('id_kontak_surat_masuk', $id);
		}
		
		return $this->db->get('surat_masuk');
	}

	public function totalKeluarBagian($id = NULL)
	{
		if ( !empty($id) ) {
			$this->db->where('id_kontak_surat_keluar', $id);
		}
		
		return $this->db->get('surat_keluar');
	}

	public function tampilEdit($id)
	{

		$this->db->where('id_kontak', $id);
		return $this->db->get('kontak');

	}

	public function add()
	{

		$nama       = $this->input->post('nama');
		$alamat     = $this->input->post('alamat');
		$no_telp    = $this->input->post('no_telp');

		$data = array(
        'id_kontak' => '',
        'kontak' => $nama,
        'alamat' => $alamat,
        'no_telp' => $no_telp
        );

        $sql = $this->db->insert('kontak', $data);

        if ( !$sql ) 
	        {
	        	$this->riwayat->add( 'KLI0' );
	        	$this->no('Gagal menambahkan');
	        } 
        else 
	        {
	        	$this->riwayat->add( 'KLI1' );
	        	$this->ok('Berhasil menambahkan');
	        }
        
	}

	public function update($id)
	{

		$nama       = $this->input->post('nama');
		$alamat     = $this->input->post('alamat');
		$no_telp    = $this->input->post('no_telp');

		$data = array(
        'kontak' => $nama,
        'alamat' => $alamat,
        'no_telp' => $no_telp
        );

        $this->db->where('id_kontak', $id);

		$sql = $this->db->update('kontak', $data);

		if ( !$sql ) 
	        {
	        	$this->riwayat->add( 'KLU0' );
	        	$this->no('Gagal mengubah');
	        } 
        else 
	        {
	        	$this->riwayat->add( 'KLU1' );
	        	$this->ok('Berhasil mengubah');
	        }
        
	}

}

/* End of file kontak_luar.php */
/* Location: ./application/models/kontak_luar.php */