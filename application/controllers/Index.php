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
            header('Content-Type: application/octet-stream');
            header('Accept-Ranges: bytes');
            header('Accept-Length: '.filesize($absolute_path));
            header('Content-Disposition: attachment; filename='.$origin_name);
            echo fread($file, filesize($absolute_path));
            fclose($file);
            exit;
        }else{
            die('参数错误！');
        }
    }

    public function get_image(){
        $path = $this->input->get('path',true);
        if(!$path){
            die('参数错误！');
        }
        $absolute_path =  substr(ROOT_PATH,0,-1) . $path;
        if(is_file($absolute_path)){
            $info = getimagesize($absolute_path);
            if ($info === false) {
                $file = fopen($absolute_path, "r");
                header('Content-type: application/octet-stream');
                header('Accept-Ranges: bytes');
                header('Accept-Length: '.filesize($path));
                header('Content-Disposition: attachment; filename='.time().strtolower(strrchr($absolute_path, '.')));
                echo fread($file, filesize($absolute_path));
                fclose($file);
                exit;
            } else {
                header('Content-type:'.$info['mime']);
                $file = fopen($absolute_path, "rb");
                echo fread($file, filesize($absolute_path));
                fclose($file);
                exit;
            }
        }
    }


}