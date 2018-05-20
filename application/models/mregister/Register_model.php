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

	public function select_email($email){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}

	}

	public function get_user_byemail($email){
		$query = $this->db->get_where('user',array('email'=>$email));
		return $query->row_array();
		
	}

	public function activate($user, $email){
		$this->db->where('email', $email);
		$update = $this->db->update('user', $user);
		if($update){
			return true;
		} else {
			return false;
		}
	}
	public function insert_negara($negara, $id_user){
		$sql = "INSERT INTO alamat (negara, user_id_user) VALUES ('$negara', '$id_user')";
		$this->db->query($sql);
	}


}
?>