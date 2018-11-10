<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Login extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mlogin/Login_models');
        $this->load->model('mregister/Register_model');
    }

    public function index_post()
    {
        echo 'login';
    }

    public function loginApi_post()
    {
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        $jumlah = $this->Register_model->select_email($username);
        /*foreach ($jumlah as $value) {
            echo "$value <br>";
        }*/
        if($jumlah>0)
        {
            $row = $this->Login_models->validasi_login($username, $password);
            if($row > 0){
                $user = $this->Register_model->get_user_byemail($username);
                $this->response([
                    'success' => '1',
                    'message' => 'Selamat Datang di Multicraft, Selamat Berbelanja',
                    'id_user' => $user['id_user'],
                    'email' => $username,
                    'password' => $password,
                ]);
                
            }else{
                $this->response([
                    'success' => 0,
                    'message' => 'Password Salah'
                ]);
            }
        } else
        {
            $this->response([
                    'success' => 0,
                    'message' => 'Anda belum terdaftar'
                ]);
        }
        
    }
}
