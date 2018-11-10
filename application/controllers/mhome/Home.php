<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
/**
 * 
 */
class Home extends Rest_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mhome/Home_model');

	}

	public function kategori_post(){
		$kategori = $this->Home_model->select_kategori();
		$this->response($kategori);
	}
	
}
?>