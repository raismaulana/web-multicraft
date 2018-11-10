<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('model_user');

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{

		$semuadata = $this->model_user->tampil();

		if($semuadata){
			$tabel = $this->model_user->tabel($semuadata);
			$data['tabel'] = $tabel;
		}else{
			$data['tabel'] = "<h2> Oops! Tidak ada data</h2>";
		}
		$data['content'] = 'isi/user';
		$this->load->view('view_dashboard', $data);
	}

	public function detail($id)
	{	
		$semuadata = $this->db->get_where('detail_user', array('id_user'=>$id))->result_object();

		if($semuadata){
			$data['files'] = $semuadata;
		}
		$data['content'] = 'isi/user_detail';
		$this->load->view('view_dashboard', $data);

		
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */