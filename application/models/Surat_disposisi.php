<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_disposisi extends CI_Model {
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

	public function tampilKontak2()
	{
		return $this->db->get('kontak2');
	}

	public function tampilSuratDisposisi()
	{
		$this->db->select('*');
		$this->db->from('disposisi');
		$this->db->join('kontak2', 'kontak2.id_kontak2 = disposisi.id_kontak2_disposisi','left');
		$this->db->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat_masuk','left');
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk','left');
		$this->db->order_by('disposisi.tgl_arsip_disposisi', 'desc');		
		return $this->db->get();

	}

	public function add()
	{

		$kepada       	= $this->input->post('kepada');
		$nomor      	= $this->input->post('nomor');
		$asal   	 	= $this->input->post('asal');
		$tgl_terima 	= $this->input->post('tgl_terima');

		$data = array(
        'id_disposisi' => '',
        'nomor_disposisi' => $nomor,
        'perihal_disposisi' => '',
        'id_kontak2_disposisi' => $kepada,
        'id_surat_masuk' => $asal,
        'tgl_diterima_disposisi' => date('Y-m-d',strtotime($tgl_terima)),
        'tgl_arsip_disposisi' => date('Y-m-d'),
        'upload_disposisi' => '' 
        );

		$sql = $this->db->insert('disposisi', $data);

		if ( !$sql ) 
			{
				$this->no("Gagal menambahkan : kemungkinan nomor disposisi sama");
				$this->riwayat->add( 'DI0' );
			}
		else
			{
				$this->ok("Berhasil menambahkan");
				$this->riwayat->add( 'DI1' );
			}
	}

	public function update($id)
	{

		$nomor       = $this->input->post('nomor');
		$perihal     = $this->input->post('perihal');

		$data = array(
        'perihal_disposisi' => $perihal
        );

		$this->db->where('nomor_disposisi', $nomor);

		$sql = $this->db->update('disposisi', $data);
		if ( !$sql ) 
			{
				$this->no("Gagal mengubah");
				$this->riwayat->add( 'DU0' );
			}
		else
			{
				$this->ok("Berhasil mengubah");
				$this->riwayat->add( 'DU1' );
			}

	}

	public function updateFile($id, $file)
	{

		$data = array(
        'upload_disposisi' => $file 
        );

		$this->db->where('id_disposisi', $id);
		return $this->db->update('disposisi', $data);
	}

	public function buatNamaFile($id)
	{
		$this->db->select('disposisi.nomor_disposisi as nomor, kontak2.kontak2 as kontak2');
		$this->db->from('disposisi');
		$this->db->join('kontak2', 'kontak2.id_kontak2 = disposisi.id_kontak2_disposisi', 'left');
		$this->db->where('disposisi.id_disposisi', $id);
		$query = $this->db->get();

		foreach ($query->result() as $name )
		 return str_replace(' ', '_', $name->kontak2 ).'_'.str_replace(' ', '_', $name->nomor ).'.pdf';
	}

	public function hapusfile($id, $file)
	{
		unlink('./arsip_disposisi/'.$file);

		$sql = $this->updateFile($id, '');

		if ( !$sql ) 
			{
				$this->no("Gagal menghapus file");
				$this->riwayat->add( 'DDF0' );
			}
		else
			{
				$this->ok("Berhasil menghapus file");
				$this->riwayat->add( 'DDF1' );
			}
	}

	public function hapusdata($id)
	{
		$this->db->where('id_disposisi', $id);

		$sql = $this->db->delete('disposisi');

		if ( !$sql ) 
			{
				$this->no("Gagal menghapus data disposisi");
				$this->riwayat->add( 'DDD0' );
			}
		else
			{
				$this->ok("Berhasil menghapus data disposisi");
				$this->riwayat->add( 'DDD1' );
			}
	}

	

	public function up($id)
	{
		$config['upload_path']   = './arsip_disposisi/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = '2000000';
		$config['file_name']     = $this->buatNamaFile($id);
		
		$this->load->library('upload', $config);
		
		$sql = $this->upload->do_upload('file');

		if ( !$sql ) 
			{
				$this->no("Gagal mengunggah file");
				$this->riwayat->add( 'DF0' );
			}
		else
			{
				$this->ok("Berhasil mengunggah file");
				$this->riwayat->add( 'DF1' );
				$this->updateFile($id, $config['file_name']); 
			}

	}



	public function cariSuratDisposisi($id = NULL, $kategori = NULL , $mulai = NULL , $sampai = NULL )
	{

		// $kategori 1,2;

		switch ($kategori) {

			case '1':
				$kateg = 'disposisi.tgl_diterima_disposisi';
				break;
			
			default:
				$kateg = 'disposisi.tgl_arsip_disposisi';
				break;
		}

		$this->db->select('*');
		$this->db->from('disposisi');
		$this->db->join('kontak2', 'kontak2.id_kontak2 = disposisi.id_kontak2_disposisi','left');
		$this->db->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat_masuk','left');
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk','left');
		$this->db->order_by($kateg, 'desc');
		if (!empty($id)) {
			$this->db->where('disposisi.id_kontak2_disposisi', $id );
			$this->db->where($kateg.' >=', $mulai );
			$this->db->where($kateg.' <=', $sampai );
		}else{
			$this->db->where($kateg.' >=', $mulai );
			$this->db->where($kateg.' <=', $sampai );
		}
		
		return $query = $this->db->get();


	}

	public function cetak( $mulai , $sampai )
	{
		$this->db->select('*');
		$this->db->from('disposisi');
		$this->db->join('kontak2', 'kontak2.id_kontak2 = disposisi.id_kontak2_disposisi','left');
		$this->db->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat_masuk','left');
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk','left');
		$this->db->order_by('disposisi.tgl_arsip_disposisi', 'desc');
		$this->db->where('disposisi.tgl_arsip_disposisi >=', $mulai );
		$this->db->where('disposisi.tgl_arsip_disposisi <=', $sampai );
		
		
		return $query = $this->db->get();
	}
	

}


/* End of file surat_disposisi.php */
/* Location: ./application/models/surat_disposisi.php */