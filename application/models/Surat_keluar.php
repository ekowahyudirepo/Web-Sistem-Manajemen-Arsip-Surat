<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Model {
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

	public function tampilKontak()
	{
		return $this->db->get('kontak');
	}

	public function tampilSuratKeluar()
	{
		$this->db->select('*');
		$this->db->from('surat_keluar');
		$this->db->join('kontak', 'kontak.id_kontak = surat_keluar.id_kontak_surat_keluar');
		$this->db->order_by('surat_keluar.tgl_arsip_surat_keluar', 'desc');		
		return $this->db->get();

	}

	public function add()
	{

		$kepada     = $this->input->post('kepada');
		$nomor      = $this->input->post('nomor');
		$perihal    = $this->input->post('perihal');
		$tgl_surat  = $this->input->post('tgl_surat');

		$data = array(
        'id_surat_keluar' => '',
        'nomor_surat_keluar' => $nomor,
        'perihal_surat_keluar' => $perihal,
        'id_kontak_surat_keluar' => $kepada,
        'tgl_surat_keluar' => date('Y-m-d',strtotime($tgl_surat)),
        'tgl_arsip_surat_keluar' => date('Y-m-d'),
        'upload_surat_keluar' => '' 
        );

		$sql = $this->db->insert('surat_keluar', $data);
		if ( !$sql ) 
			{
				$this->no("Gagal menambahkan");
				$this->riwayat->add( 'KI0' );
			}
		else
			{
				$this->ok("Berhasil menambahkan");
				$this->riwayat->add( 'KI1' );
			}
	}

	public function tampilEdit($id)
	{
		$this->db->select('*');
		$this->db->from('surat_keluar');
		$this->db->where('id_surat_keluar', $id);
		return $this->db->get();
	}

	public function update($id)
	{

		$kepada     = $this->input->post('kepada');
		$nomor      = $this->input->post('nomor');
		$perihal    = $this->input->post('perihal');
		$tgl_surat  = $this->input->post('tgl_surat');

		$data = array(
        'nomor_surat_keluar' => $nomor,
        'perihal_surat_keluar' => $perihal,
        'id_kontak_surat_keluar' => $kepada,
        'tgl_surat_keluar' => date('Y-m-d',strtotime($tgl_surat)),
        'tgl_arsip_surat_keluar' => date('Y-m-d')
        );

		$this->db->where('id_surat_keluar', $id);

		$sql = $this->db->update('surat_keluar', $data);
		if ( !$sql ) 
			{
				$this->no("Gagal mengubah");
				$this->riwayat->add( 'KU0' );
			}
		else
			{
				$this->ok("Berhasil mengubah");
				$this->riwayat->add( 'KU1' );
			}


	}

	public function updateFile($id, $file)
	{

		$data = array(
        'upload_surat_keluar' => $file 
        );

		$this->db->where('id_surat_keluar', $id);
		return $this->db->update('surat_keluar', $data);
	}

	public function buatNamaFile($id)
	{
		$this->db->select('surat_keluar.id_surat_keluar as id, surat_keluar.perihal_surat_keluar as perihal , kontak.kontak as kontak');
		$this->db->from('surat_keluar');
		$this->db->join('kontak', 'kontak.id_kontak = surat_keluar.id_kontak_surat_keluar', 'left');
		$this->db->where('surat_keluar.id_surat_keluar', $id);
		$query = $this->db->get();

		foreach ($query->result() as $name )
		 return str_replace(' ', '_', $name->kontak ).'_'.$name->id.'_'.str_replace(' ', '_', $name->perihal ).'.pdf';
	}

	public function hapusfile($id, $file)
	{
		unlink('./arsip_keluar/'.$file);

		$sql = $this->updateFile($id, '');

		if ( !$sql ) 
			{
				$this->no("Gagal menghapus file");
				$this->riwayat->add( 'KDF0' );
			}
		else
			{
				$this->ok("Berhasil menghapus file");
				$this->riwayat->add( 'KDF1' );
			}
	}

	public function hapusdata($id)
	{
		$this->db->where('id_surat_keluar', $id);

		$sql = $this->db->delete('surat_keluar');

		if ( !$sql ) 
			{
				$this->no("Gagal menghapus data surat keluar");
				$this->riwayat->add( 'KDD0' );
			}
		else
			{
				$this->ok("Berhasil menghapus data surat keluar");
				$this->riwayat->add( 'KDD1' );
			}
	}

	

	public function up($id)
	{
		$config['upload_path']   = './arsip_keluar/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = '2000000';
		$config['file_name']     = $this->buatNamaFile($id);
		
		$this->load->library('upload', $config);
		
		$sql = $this->upload->do_upload('file');

		if ( !$sql ) 
			{
				$this->no("Gagal mengunggah file");
				$this->riwayat->add( 'KF0' );
			}
		else
			{
				$this->ok("Berhasil mengunggah file");
				$this->riwayat->add( 'KF1' );
				$this->updateFile($id, $config['file_name']); 
			}

	}

	public function cariSuratKeluar($id = NULL, $kategori = NULL , $mulai = NULL , $sampai = NULL )
	{
		switch ($kategori) {
			case '1':
				$kateg = 'surat_keluar.tgl_surat_keluar';
				break;
			
			default:
				$kateg = 'surat_keluar.tgl_arsip_surat_keluar';
				break;
		}

		$this->db->select('*');
		$this->db->from('surat_keluar');
		$this->db->join('kontak', 'kontak.id_kontak = surat_keluar.id_kontak_surat_keluar');
		$this->db->order_by($kateg, 'desc');
		if (!empty($id)) {
			$this->db->where('surat_keluar.id_kontak_surat_keluar', $id );
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
		$this->db->from('surat_keluar');
		$this->db->join('kontak', 'kontak.id_kontak = surat_keluar.id_kontak_surat_keluar');
		$this->db->order_by('surat_keluar.tgl_arsip_surat_keluar', 'desc');
		$this->db->where('surat_keluar.tgl_arsip_surat_keluar >=', $mulai );
		$this->db->where('surat_keluar.tgl_arsip_surat_keluar <=', $sampai );
		
		
		return $query = $this->db->get();
	}




}

/* End of file sql.php */
/* Location: ./application/models/sql.php */