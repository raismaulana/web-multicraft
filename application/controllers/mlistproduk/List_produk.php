<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
/**
 * 
 */
class List_produk extends Rest_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mlistproduk/List_produk_model');
	}

	public function list_post()
	{
		$id_kategori = $this->post('id_kategori');
		$data = $this->List_produk_model->ambil_produk($id_kategori);

		$this->response($data, 200);
	}
}

?>