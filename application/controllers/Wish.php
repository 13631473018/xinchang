<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wish extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function wish_list(){
        $this->load->view('wish_wish_list.html');
    }


}