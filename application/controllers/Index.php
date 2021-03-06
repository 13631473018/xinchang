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
            //$fi = new finfo(FILEINFO_MIME_TYPE);
            //$mime_type = $fi->file($absolute_path);
            $info = getimagesize($absolute_path);
            $mime_type = $info['mime'];
            $is_image_pdf = is_image_pdf($mime_type);
            if($is_image_pdf){
                header('Content-type:'.$mime_type);
                $file = fopen($absolute_path, "rb");
                while(!feof($file) && ($bin = fread($file,1024)) !== false ){
                    echo $bin;
                }
                fclose($file);
                exit;
            }else{
                $file = fopen($absolute_path, 'rb');
                header('Content-Type: application/octet-stream');
                header('Accept-Ranges: bytes');
                header('Accept-Length: '.filesize($absolute_path));
                header('Content-Disposition: attachment; filename='.$origin_name);
                while(!feof($file) && ($bin = fread($file,1024)) !== false ){
                    echo $bin;
                }
                fclose($file);
                exit;
            }

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
                $file = fopen($absolute_path, "rb");
                header('Content-type: application/octet-stream');
                header('Accept-Ranges: bytes');
                header('Accept-Length: '.filesize($path));
                header('Content-Disposition: attachment; filename='.time().strtolower(strrchr($absolute_path, '.')));
                while(!feof($file) && ($bin = fread($file,1024)) !== false ){
                    echo $bin;
                }
                fclose($file);
                exit;
            } else {
                header('Content-type:'.$info['mime']);
                $file = fopen($absolute_path, "rb");
                while(!feof($file) && ($bin = fread($file,1024)) !== false ){
                    echo $bin;
                }
                fclose($file);
                exit;
            }
        }
    }


}