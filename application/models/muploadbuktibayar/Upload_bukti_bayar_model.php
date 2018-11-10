<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Upload_bukti_bayar_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function unggah($gambar)
	{
		$config = array(
			'upload_path' => "./foto/user",
			'allowed_types' => "jpg|png",
			'overwrite' => TRUE,
			'max_size' => "2048000", // 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
		);
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload($gambar)){
			$error = array('error' => $this->upload->display_errors(), 'result' => false);
			return $error;
		}
		else{
			$data = array('upload_data' => $this->upload->data(), 'result' => true);
			return $data;
		}
	}

	public function simpan_ke_db($hasil, $data){
		$datas = array(
			'tgl_bayar' => $data['tgl_bayar'],
			'jam_bayar' => $data['jam_bayar'],
			'nomor_rekening' => $data['nomor_rekening'],
			'foto_bukti' => $hasil['full_path'],
			'nominal_bayar' => $data['nominal_bayar'],
			'checkout_invoice' => $data['invoice']
		 );

		$this->db->insert('pembayaran', $datas);
	}
}
?>