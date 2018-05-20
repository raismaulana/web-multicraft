<?php
/**
 * model untuk verifikasi email
 */
class Email_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function sendVerificationEmail($data){

		$config = array(
						'protocol' => 'sendmail',
		  				'smtp_host' => 'ssl://smtp.gmail.com',
		  				'smtp_port' => '465',
		  				'smtp_user' => 'multicraftbusinessofficial@gmail.com', // change it to yours
		  				'smtp_pass' => 'elydiandindaeldianda', // change it to yours
		  				'mailtype' => 'html',
		  				'charset' => 'iso-8859-1',
		  				'wordwrap' => TRUE
		  			);
		$message = 	"
							<!DOCTYPE html>
							<html>
							<head>
								<title>Verification Code</title>
							</head>
							<body>
								<h2>Thank you for Registering.</h2>
								<p>Your Account:</p>
								<p>Email: ".$data['email']."</p>
								<p>Password: ".$data['password']."</p>
								<p>Please click the link below to activate your account.</p>
								<h4><a href='".base_url()."mregister/Verify/verify/".$data['email']."/".$data['kode_aktivasi']."'>Activate My Account</a></h4>
							</body>
							</html>
						";
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
$this->email->set_header('Content-type', 'text/html'); //must add this line
			$this->email->from($config['smtp_user'], "Multicraft Business Official");
			
		    $this->email->to($data['email']);
		    $this->email->subject('Signup Verification Email');
		    $this->email->message($message);
		    $this->email->send(FALSE);
		    return $this->email->print_debugger();

}
}

?>