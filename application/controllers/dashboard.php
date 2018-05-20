<?php
class Dashboard extends CI_Controller {

// function __construct(){
// 		parent::__construct();
// 		//ngambil data status di session
// 		if($this->session->userdata('status') != "login"){
// 			redirect(base_url("login"));
// 		}
// 	}
	public function index(){
		$data['content'] = 'content';
		$this->load->view('view_dashboard', $data);
	}

	public function produk()
	{
		$data['content'] = 'isi/produk';
		$this->load->view('view_dashboard', $data);
	}
}
