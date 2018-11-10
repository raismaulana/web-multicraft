<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_models extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	function validasi_login($nama_user, $password)
    {
        $query = $this->db->query("SELECT * FROM user WHERE email = '$nama_user' AND password = '$password'");
        if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
	}
}

