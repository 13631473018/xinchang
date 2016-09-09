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
        session_start();
    }


}

class MY_FrontEndController extends MY_Controller {

}

class MY_BackEndController extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->addHeader();
    }

    public function addHeader(){
        $this->load->view('admin_common_header.html');
    }
}