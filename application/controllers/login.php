<?php
class Login extends CI_controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_login');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}

	function index(){
		$this->load->view('view_login');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login/index'));
	}



	function login(){
		//username&password ngambil dari view, dimasukkan ke
		//variable $username&$password
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//nilai dari variable $username&$password dimasukkan array $where
		$ceklogin = $this->model_login->login($username,$password);

		if($ceklogin){
			foreach ($ceklogin as $row);
				$this->session->set_userdata('username', $row->username);
				$this->session->set_userdata('hak_akses', $row->hak_akses);
				$this->session->set_userdata('status', "login");
				$data_session = array ('nama' => $username); //inisilisasi data nama_user

				if($this->session->userdata('hak_akses')=="2"){
					$this->session->set_userdata($data_session); //kirim nama admin
					
					redirect(base_url("dashboard"));
					
				}else{
					$this->session->set_flashdata('psn','anda bukan admin');
			        redirect(base_url("login"));
				}
		}else{
			$this->session->set_flashdata('pesan','username dan password salah');
			redirect(base_url("login"));
		}
	}


	// 	if($cek > 0){
	// 		//mengatur nama dan status dalam array $data_session
	// 			$data_session = array( 'nama' => $username,
	// 									'status' => "login");
				
	// 			//mengatur nilai di session
	// 			$this->session->set_userdata($data_session);
	// 			redirect(base_url("index.php/dashboard"));
	// 	}else{
	// 			$this->session->set_flashdata('pesan','username dan password salah');
	// 			redirect(base_url("index.php/login"));
	// 	}
	// }

}	