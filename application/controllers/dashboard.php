<?php
class Dashboard extends CI_Controller {

function __construct(){
		parent::__construct();
		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	public function index(){
		$this->load->view('v_dashboard');
	}
}
