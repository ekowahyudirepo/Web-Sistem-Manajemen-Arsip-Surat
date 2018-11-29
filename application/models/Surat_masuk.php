<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Model {
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

	public function tampilKontak()
	{
		return $this->db->get('kontak');
	}

	public function tampilSuratMasuk()
	{
		$this->db->select('surat_masuk.*,kontak.*, disposisi.id_disposisi as iddis, disposisi.nomor_disposisi as nodis , disposisi.upload_disposisi as filedis');
		$this->db->from('surat_masuk');
		$this->db->join('disposisi', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk','left');
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk','left');
		$this->db->order_by('surat_masuk.tgl_arsip_surat_masuk', 'desc');		
		return $this->db->get();

	}

	public function dataCetakLembarDisposisi($id)
	{
		$this->db->select('surat_masuk.*,kontak.kontak, disposisi.nomor_disposisi as nodis');
		$this->db->from('surat_masuk');
		$this->db->join('disposisi', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk','left');
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk','left');
		$this->db->where('surat_masuk.id_surat_masuk', $id);		
		return $this->db->get();

	}

	public function tampilEdit($id)
	{
		$this->db->select('*');
		$this->db->from('surat_masuk');
		$this->db->where('id_surat_masuk', $id);
		return $this->db->get();
	}

	public function add()
	{

		$dari       = $this->input->post('dari');
		$nomor      = $this->input->post('nomor');
		$perihal    = $this->input->post('perihal');
		$tgl_surat  = $this->input->post('tgl_surat');
		$tgl_terima = $this->input->post('tgl_terima');

		$data = array(
        'id_surat_masuk' => '',
        'nomor_surat_masuk' => $nomor,
        'perihal_surat_masuk' => $perihal,
        'id_kontak_surat_masuk' => $dari,
        'tgl_surat_masuk' => date('Y-m-d',strtotime($tgl_surat)),
        'tgl_diterima_surat_masuk' => date('Y-m-d',strtotime($tgl_terima)),
        'tgl_arsip_surat_masuk' => date('Y-m-d'),
        'upload_surat_masuk' => '' 
        );

		$sql = $this->db->insert('surat_masuk', $data);
		if ( !$sql ) 
			{
				$this->no("Gagal menambahkan");
				$this->riwayat->add( 'MI0' );
			}
		else
			{
				$this->ok("Berhasil menambahkan");
				$this->riwayat->add( 'MI1' );
			}
	}

	public function update($id)
	{

		$dari       = $this->input->post('dari');
		$nomor      = $this->input->post('nomor');
		$perihal    = $this->input->post('perihal');
		$tgl_surat  = $this->input->post('tgl_surat');
		$tgl_terima = $this->input->post('tgl_terima');

		$data = array(
        'nomor_surat_masuk' => $nomor,
        'perihal_surat_masuk' => $perihal,
        'id_kontak_surat_masuk' => $dari,
        'tgl_surat_masuk' => date('Y-m-d',strtotime($tgl_surat)),
        'tgl_diterima_surat_masuk' => date('Y-m-d',strtotime($tgl_terima)),
        'tgl_arsip_surat_masuk' => date('Y-m-d')
        );

		$this->db->where('id_surat_masuk', $id);

		$sql = $this->db->update('surat_masuk', $data);
		if ( !$sql ) 
			{
				$this->no("Gagal mengubah");
				$this->riwayat->add( 'MU0' );
			}
		else
			{
				$this->ok("Berhasil mengubah");
				$this->riwayat->add( 'MU1' );
			}


	}

	public function updateFile($id, $file)
	{

		$data = array(
        'upload_surat_masuk' => $file 
        );

		$this->db->where('id_surat_masuk', $id);
		return $this->db->update('surat_masuk', $data);
	}

	public function buatNamaFile($id)
	{
		$this->db->select('surat_masuk.id_surat_masuk as id, surat_masuk.perihal_surat_masuk as perihal , kontak.kontak as kontak');
		$this->db->from('surat_masuk');
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk', 'left');
		$this->db->where('surat_masuk.id_surat_masuk', $id);
		$query = $this->db->get();

		foreach ($query->result() as $name )
		 return str_replace(' ', '_', $name->kontak ).'_'.$name->id.'_'.str_replace(' ', '_', $name->perihal ).'.pdf';
	}

	public function hapusfile($id, $file)
	{
		unlink('./arsip_masuk/'.$file);

		$sql = $this->updateFile($id, '');

		if ( !$sql ) 
			{
				$this->no("Gagal menghapus file");
				$this->riwayat->add( 'MDF0' );
			}
		else
			{
				$this->ok("Berhasil menghapus file");
				$this->riwayat->add( 'MDF1' );
			}
	}

	public function hapusdata($id)
	{
		$this->db->where('id_surat_masuk', $id);

		$sql = $this->db->delete('surat_masuk');

		if ( !$sql ) 
			{
				$this->no("Gagal menghapus data surat masuk");
				$this->riwayat->add( 'MDD0' );
			}
		else
			{
				$this->ok("Berhasil menghapus data surat masuk");
				$this->riwayat->add( 'MDD1' );
			}
	}

	

	public function up($id)
	{
		$config['upload_path']   = './arsip_masuk/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = '2000000';
		$config['file_name']     = $this->buatNamaFile($id);
		
		$this->load->library('upload', $config);
		
		$sql = $this->upload->do_upload('file');

		if ( !$sql ) 
			{
				$this->no("Gagal mengunggah file");
				$this->riwayat->add( 'MF0' );
			}
		else
			{
				$this->ok("Berhasil mengunggah file");
				$this->riwayat->add( 'MF1' );
				$this->updateFile($id, $config['file_name']); 
			}

	}



	public function cariSuratMasuk($id = NULL, $kategori = NULL , $mulai = NULL , $sampai = NULL )
	{

		// $kategori 1,2,3;

		switch ($kategori) {
			case '1':
				$kateg = 'surat_masuk.tgl_surat_masuk';
				break;

			case '2':
				$kateg = 'surat_masuk.tgl_diterima_surat_masuk';
				break;
			
			default:
				$kateg = 'surat_masuk.tgl_arsip_surat_masuk';
				break;
		}

		$this->db->select('*');
		$this->db->from('surat_masuk');
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk');
		$this->db->order_by($kateg, 'desc');
		if (!empty($id)) {
			$this->db->where('surat_masuk.id_kontak_surat_masuk', $id );
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
		$this->db->from('surat_masuk');
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk');
		$this->db->order_by('surat_masuk.tgl_arsip_surat_masuk', 'desc');
		$this->db->where('surat_masuk.tgl_arsip_surat_masuk >=', $mulai );
		$this->db->where('surat_masuk.tgl_arsip_surat_masuk <=', $sampai );
		
		return $query = $this->db->get();
	}



}

/* End of file sql.php */
/* Location: ./application/models/sql.php */