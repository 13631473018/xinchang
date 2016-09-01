<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('index_index');
    }

    public function quotation(){
        $this->load->view('index_quotation');
    }

    public function wish_list(){
        $this->load->view('index_wish_list');
    }

    public function add_wish_list(){
        $this->load->helper();
    }

}