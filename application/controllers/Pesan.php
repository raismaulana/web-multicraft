<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('model_pesan');

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$semuadata = $this->model_pesan->tampil();
		if($semuadata){
			$tabel = $this->model_pesan->tabel($semuadata);
			$data['tabel'] = $tabel;
		}else{
			$data['tabel'] = "<h2> Oops! Tidak ada data</h2>";
		}

		$data['content'] = 'isi/pesan';
		$this->load->view('view_dashboard', $data);
	}

	public function detail($id)
	{
		$semuadata = $this->model_pesan->tampil_detail($id);
		if($semuadata){
			$data['tabel']=$this->model_pesan->tabel_detail($semuadata);
		}

		$data['files']=$this->model_pesan->tampil_detail($id);
		$data['content'] = 'isi/pesan_detail';
		$this->load->view('view_dashboard', $data);
	}

}

/* End of file Pesan.php */
/* Location: ./application/controllers/Pesan.php */