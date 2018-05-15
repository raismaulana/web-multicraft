<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class login_models extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function LoginApi($nama_user, $password)
    {
        $result = $this->db->query("SELECT FROM user WHERE username = '$nama_user' AND password = '$password'");
        return $result->result();
    }
}