<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wish extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('wish_model','wish');
    }

    public function wish_list(){
        $wish= $this->wish->get_front_wish_list();
        $data = array(
            'wish'=>$wish,
        );
        wwww($data);
        $this->load->view('wish_wish_list.html',$data);
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
                echo "<script>alert('编辑愿望成功！');</script>";
            }
        }
        header('Refresh:0;url=/wish/wish_list');
    }

    //添加评论
    public function add_wish_comment(){
        if(IS_POST){
            $res = $this->wish->add_wish_comment_from_front();
            if($res){
                echo "<script>alert('添加评论成功！');</script>";
            }
        }
        header('Refresh:0;url=/wish/wish_list');
    }


}