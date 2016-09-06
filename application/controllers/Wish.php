<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wish extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('wish_model','wish');
    }

    public function wish_list(){

        $wish= $this->wish->get_front_wish_list();
        $this->load->view('wish_wish_list.html',array('wish'=>$wish));
    }

    public function add_wish_list(){
        if(IS_POST){
            if(!isset($_FILES['add_wish_list'])){
                do_frame('没有上传文件！');
            }
            if(!is_images($_FILES['add_wish_list']['type'])){
                do_frame('请上传图片文件！');
            }
            $this->load->model('wish_model','wish');
            if($this->wish->add()){
                do_frame('添加愿望成功！');
            }
        }
    }

    //编辑愿望
    public function edit_wish_list(){
        if(IS_POST){
            $res = $this->wish->edit_wish_list_from_front();
            if($res){
                do_frame('编辑愿望成功！');
            }
        }
    }


}