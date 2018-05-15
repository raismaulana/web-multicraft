<?php
class Register_model extends CI_Model{
	public $nama;
	public $email;
	public $password;
	public $nohp;
	public $gender;


	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function insert_register_user($data){
		$insert = $this->db->insert('user', $data);

		if($insert){
			return true;
		} else {
			return false;
		}
	}
}
?>