<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
/**
 * 
 */
class Keranjang extends Rest_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mkeranjang/Keranjang_model');
		$this->load->model('mdetailproduk/Detail_produk_model');
	}

	function ambil_keranjang_post(){
		$id_user = $this->post('id_user');

		$user = $this->Keranjang_model->ambil_id_pesan($id_user);
		
		$data = $this->Keranjang_model->ambil_data_keranjang($user['id_pesan']);
		$harga = $this->Keranjang_model->ambil_total_harga_pesan($user['id_pesan']);

		$this->response(['data' => $data,'total_harga_pesan' => $harga], 200);
	}

	public function tambah_kurang_post()
	{
		$id_pesan = $this->post('id_pesan');
		$id_produk = $this->post('id_produk');
		$jumlah = $this->post('jumlah');
		$total_berat = $this->post('total_berat');
		$total_harga = $this->post('total_harga');
		$total_harga_pesan = $this->post('total_harga_pesan');
		$this->Keranjang_model->update_produk_di_keranjang($id_pesan, $id_produk, $jumlah, $total_harga, $total_berat);
		$result = $this->Keranjang_model->ambil_jumlah($id_pesan, $id_produk);
		$this->Detail_produk_model->input_total_harga_pesan($id_pesan, $total_harga_pesan);
		$this->response($result);
	}

	public function hapus_dari_keranjang_post()
	{
		$id_pesan = $this->post('id_pesan');
		$id_produk = $this->post('id_produk');
		$total_harga_pesan = $this->post('total_harga_pesan');
		$this->Detail_produk_model->input_total_harga_pesan($id_pesan, $total_harga_pesan);
		$hasil = $this->Keranjang_model->remove_dari_keranjang($id_pesan, $id_produk);
		if($hasil){
			$this->response(['error'=>FALSE,'pesan'=>'T E R H A P U S']);
		} else {
			$this->response(['error'=>TRUE,'pesan'=>'gagal hapus!']);
		}	
	}


}
?>