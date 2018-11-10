<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
/**
 * 
 */
class Upload_bukti_bayar extends Rest_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('muploadbuktibayar/Upload_bukti_bayar_model');
	}

	public function input_post(){
		$data = array(
			'tgl_bayar' => $this->post('tgl_bayar'),
			'jam_bayar' => $this->post('jam_bayar'),
			'nomor_rekening' => $this->post('nomor_rekening'),
			'nominal_bayar' => $this->post('nominal_bayar'),
			'checkout_invoice' => $this->post('invoice')
		 );
		$gambar = $this->post('KEY_IMAGE');

		$hasil = $this->Upload_bukti_bayar_model->unggah($gambar);

		if ($hasil['result'] == "success") {
			$this->Upload_bukti_bayar_model->simpan_ke_db($hasil, $data);

			$this->response(['error' => TRUE,
                    'error_msg' => 'Upload berhasil']);
		} else {
			$this->response([
                    'error' => TRUE,
                    'error_msg' => $hasil['error']
                ]);
		}
	}
}
?>