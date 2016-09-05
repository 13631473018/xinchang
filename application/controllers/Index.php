<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('index_index.html');
    }

    public function get_file(){

        $path = $this->input->get('path',true);
        $origin_name = $this->input->get('origin_name',true);
        if(!$path || !$origin_name){
            die('参数错误！');
        }
        $absolute_path =  substr(ROOT_PATH,0,-1) . $path;
        if(is_file($absolute_path)){
            $file = fopen($absolute_path, 'r');
            Header('Content-Type: application/octet-stream');
            Header('Accept-Ranges: bytes');
            Header('Accept-Length: '.filesize($absolute_path));
            Header('Content-Disposition: attachment; filename='.$origin_name);
            echo fread($file, filesize($absolute_path));
            fclose($file);
            exit;
        }else{
            die('参数错误！');
        }
    }


}