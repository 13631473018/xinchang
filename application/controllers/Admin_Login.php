<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function login(){
        if(is_ajax()){
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

        }
        ww('请输入密码');
    }

}