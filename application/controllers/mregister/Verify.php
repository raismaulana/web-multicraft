<?php
/**
 * 
 */
class Verify extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mregister/Register_model');
		$this->load->model('mregister/Email_model');
		$this->load->library('email');
		$this->load->database();
	}

	public function verify($email,$kode){
		$email =  $this->uri->segment(4);
		$kode = $this->uri->segment(5);
 		// echo $email;
		//fetch user details
		$user = $this->Register_model->get_user_byemail($email);
 		// var_dump($user);
			
 		if($user['active'] == 0){
		//if code matches
			if($user['kode_aktivasi'] == $kode){
			//update user active status
				$user['active'] = '1';
				$query = $this->Register_model->activate($user, $email);
 				
				if($query){
					$data = array('email'=> $email);
				$this->load->view('mregister/verifiberhasil', $data);
				// echo "berhasil";
				}
				else{
				$this->load->view('mregister/verifigagal');
				// echo "gagal1";
				}
			}
			else{
			$this->load->view('mregister/verifigagal');
				// echo "gagal2";
			}
		}else{
			$this->load->view('mregister/verifigagal2');
			// echo "gagal3";
		}
	}
}
?>