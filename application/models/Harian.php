<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Harian extends CI_Model {

	public function masuk()
	{
		$this->db->where('tgl_arsip_surat_masuk', date('Y-m-d'));
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk', 'left');
		$this->db->order_by('tgl_arsip_surat_masuk', 'desc');
		return $this->db->get('surat_masuk');
	}

	public function keluar()
	{
		$this->db->where('tgl_arsip_surat_keluar', date('Y-m-d'));
		$this->db->join('kontak', 'kontak.id_kontak = surat_keluar.id_kontak_surat_keluar', 'left');
		$this->db->order_by('tgl_arsip_surat_keluar', 'desc');
		return $this->db->get('surat_keluar');
	}

	public function disposisi()
	{
		$this->db->where('tgl_arsip_disposisi', date('Y-m-d'));
		$this->db->join('kontak2', 'kontak2.id_kontak2 = disposisi.id_kontak2_disposisi','left');
		$this->db->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat_masuk','left');
		$this->db->join('kontak', 'kontak.id_kontak = surat_masuk.id_kontak_surat_masuk','left');
		$this->db->order_by('tgl_arsip_disposisi', 'desc');
		return $this->db->get('disposisi');
	}

}

/* End of file Harian.php */
/* Location: ./application/models/Harian.php */