<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
/**
 * 
 */
class Detail_produk extends Rest_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('mdetailproduk/Detail_produk_model');
		$this->load->model('mkeranjang/Keranjang_model');
	}

	public function masuk_keranjang_post()
	{
		$id_produk = $this->post('id_produk');
		$id_user = $this->post('id_user');
		$total_harga = $this->post('total_harga');
		$total_berat = $this->post('total_berat');

		$user = $this->Keranjang_model->ambil_id_pesan($id_user);
		$jumlah = $this->Detail_produk_model->cek_sudah_belum($user['id_pesan'], $id_produk);
		if($jumlah>0){
			$this->response([
                    'error' => TRUE,
                    'pesan' => 'Sudah di Keranjang'
                ]);
		} else {
			$total_harga_pesan_saiki = $this->Detail_produk_model->ambil_total_harga_pesan($user['id_pesan']);
			var_dump($total_harga_pesan_saiki);
			$total_harga_pesan = $total_harga_pesan_saiki['total_harga_pesan'] + $total_harga;
			echo $total_harga_pesan;
			var_dump($total_harga_pesan);
			$this->Detail_produk_model->input_total_harga_pesan($user['id_pesan'], $total_harga_pesan);

			$this->Detail_produk_model->masuk_keranjang($user['id_pesan'], $id_produk, $total_harga, $total_berat);
			
			$this->response([
                    'error' => FALSE,
                    'pesan' => 'Masuk Keranjang'
                ]);
		}
	}
}

?>