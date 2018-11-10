<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
/**
 * 
 */
class Checkout extends Rest_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('mkeranjang/Keranjang_model');
		$this->load->model('mcheckout/Checkout_model');
		$this->load->model('mdetailproduk/Detail_produk_model');
	}

	function ambil_hitungan_post(){
		$id_user = $this->post('id_user');
		$user = $this->Keranjang_model->ambil_id_pesan($id_user);
		$berat = $this->Checkout_model->ambil_berat($user['id_pesan']);
		$harga = $this->Detail_produk_model->ambil_total_harga_pesan($user['id_pesan']);
		$data = array(
			'berat' => $berat['SUM(total_berat)'],
			'harga' => $harga['total_harga_pesan']
			);
		$this->response($data, 200);	
	}

	function input_check_out(){
		$id_user = $this->post('id_user');
		$user = $this->Keranjang_model->ambil_id_pesan($id_user);
		$data = array(
			'biaya_pengiriman' => $this->post('biaya_pengiriman'),
			'total_pembayaran' => $this->post('total_pembayaran'),
			'nama_penerima' => $this->post('nama_penerima'),
			'no_hp_penerima' => $this->post('no_hp_penerima'),
			'alamat_penerima' => $this->post('alamat_penerima'),
			'catatan' => $this->post('catatan'),
			'pesan_id_pesan' => $user['id_pesan'],
			'kurir_id_kurir' => '1',
			'rekening_id_rekening' => '1'
		);
		$this->Checkout_model->insert_check_out($data);
	}
}
?>