<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //初始化登陆信息
        $this->init();
    }

    /**
     * [init 初始化信息]
     *
     */
    public function init() {
        $this->load->library('session');
    }


}