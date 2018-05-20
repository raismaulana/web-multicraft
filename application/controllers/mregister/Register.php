<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';


class Register extends REST_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('mregister/Register_model');
		$this->load->model('mregister/Email_model');
		$this->load->library('email');
		$this->load->database();
	}

	public function daftar_post(){
		$tgl_lahir = $this->post('tanggal');
		$orderdate = explode('/', $tgl_lahir);
		$day = $orderdate[0];
		$month   = $orderdate[1];
		$year  = $orderdate[2];
		$tanggal = $year."-".$month."-".$day;

		$set = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLMNBVCXZ';
		$kode = substr(str_shuffle($set), 0, 12);

		$data = array(
			'nama_user' => $this->post('nama'),
			'email' => $this->post('email'),
			'password' => $this->post('password'),
			'no_hp' => $this->post('nohp'),
			'gender' => $this->post('gender'),
			'tgl_lahir' => $tanggal,
			'kode_aktivasi' => $kode
			);
		$jumlah = $this->Register_model->select_email($data['email']);
		/*foreach ($jumlah as $value) {
			echo "$value <br>";
		}*/
		if($jumlah>0)
		{
			$this->response(array('status'=>'fail1',502));
		} 
		else 
		{

			$success = $this->Register_model->insert_register_user($data);
			if($success)
			{
				$x = $this->send_mail($data);
			echo "$x";
				$this->response($data, 200);
			} 
			else 
			{
			$this->response(array('status'=>'fail2',502));
			}
			
		}
	}

	public function send_mail($data){
		$stmt = $this->Email_model->sendVerificationEmail($data);
		return $stmt;
	}

}

/*
	function register_get(){
		if (isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nohp']) && isset($_POST['gender'])){
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$nohp = $_POST['nohp'];
			$gender = $_POST['gender'];

			if($db->CheckExistiongUser($email)){
				$response["error"] = TRUE;
				$response["error_msg"] = "GAGAL. User sudah" . $email." terdaftar";
				echo json_encode($response);
			} else {
				$user = $db->StoreUserInfo($nama, $email, $password, $nohp, $gender);
				if($user){
					$response["error"] = FALSE;
					$response["user"]["nama"] = $user["nama"];
					$response["user"]["email"] = $user["email"];
					$response["user"]["password"] = $user["password"];
					$response["user"]["nohp"] = $user["nohp"];
					$response["user"]["gender"] = $user["gender"];
					echo json_encode($response);
				} else {
					$response["error"]=TRUE;
					$response["error_msg"] = "Error gak bisa dimasukkan";
					echo json_encode($response);
				}
			}
		} else {
			$response["error"] = TRUE;
    		$response["error_msg"] = "Required parameters (nama, email or password, nohp, gender) is missing!";
    		echo json_encode($response);
		}

	}

	public function StoreUserInfo($nama, $email, $password, $nohp, $gender) {
        $hash = $this->hashFunction($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
 
        $stmt = $this->conn->prepare("INSERT INTO user(nama_user, email, password, nohp, gender) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nama, $email, $password, $nohp, $gender);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT nama_user, email, password, ,nohp, gender, FROM user WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt-> bind_result($token2,$token3,$token4,$token5,$token6,$token7);
 
            while ( $stmt-> fetch() ) {
               $user["name"] = $token2;
               $user["email"] = $token3;
               $user["gender"] = $token6;
               $user["age"] = $token7;
            }
            $stmt->close();
            return $user;
        } else {
          return false;
        }
    }
 
    /*public function hashFunction($password) {
 
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }*/
?>