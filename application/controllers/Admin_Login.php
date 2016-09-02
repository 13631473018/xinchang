<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Login extends MY_Controller {

    protected $username = 'xcadminglht';
    protected $userpwd = 'xcletmeinglht';

    public function __construct(){
        parent::__construct();
    }

    public function login(){
        if(is_ajax()){

            $username = $this->input->post('username', true);
            $userpwd = $this->input->post('userpwd', true);

            if($this->username != $username || $this->userpwd != $userpwd){
                $data = array(
                    'code' => -1,
                    'url' => '/admin_login/login',
                );
                die(json_encode($data));
            }

            $data = array(
                'code' => 1,
                'url' => '/admin/quotation_list',
            );
            $this->session->set_userdata('auth_admin_login',1);
            die(json_encode($data));
        }
        $this->load->view('admin_login_login.html');
    }

}