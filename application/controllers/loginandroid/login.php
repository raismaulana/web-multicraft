<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class login extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mlogin/login_models');
    }

    public function index_post()
    {
        echo 'login';
    }

    public function LoginApi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->login_models->LoginApi($nama_user, $password);
        echo json_encode($result);
    }
}
