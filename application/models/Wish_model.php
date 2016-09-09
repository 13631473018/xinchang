<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wish_model extends CI_Model{

    protected $_table = 'wish';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function add(){
        $this->load->library('file');
        $this->load->model('upload_file_model','upload_file');
        $data = array(
            'addtime'=>SYSTEM_TIME,
        );
        $post_file = $_FILES['add_wish_list'];
        $upload_ojb = $this->file->upload_file($post_file);
        $upload_file_id = $this->upload_file->insert_upload_file_record($upload_ojb);
        $data['wish_images'] = $upload_file_id;
        $result = $this->db->insert($this->_table,$data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return false;
        }

    }

    public function get_front_wish_list(){
        $this->load->model('upload_file_model','upload_file');
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where(array('is_deleted'=>0));
        $this->db->limit(12,0);
        $this->db->order_by('wish_id','DESC');
        $wish =  $this->db->get()->result_array();
        if($wish){
            $wish_ids = array_column($wish,'wish_id');
            $this->db->select('*');
            $this->db->from('wish_comment');
            $this->db->where(array('is_deleted'=>0));
            $this->db->where_in('wish_id',$wish_ids);
            $this->db->order_by('comment_id','DESC');
            $comment = $this->db->get()->result_array();

            foreach($wish as &$r){
                $r['addtime'] = date('d',$r['addtime']).'/'.date('m',$r['addtime']).'/'.date('y',$r['addtime']);
                if($r['wish_images']){
                    $upload_file_info = $this->upload_file->get_upload_file_info_by_fid($r['wish_images']);
                    $r['file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
                }
                foreach($comment as $c){
                    if($r['wish_id'] == $c['wish_id']){
                        $r['comment'][$c['comment_id']] = $c;
                    }else{
                        $r['comment'] = array();
                    }
                }
                unset($r);
            }

        }
        return $wish;
    }

    //前台编辑愿望
    public function edit_wish_list_from_front(){
        $wish_id = $this->input->post('edit_wish_id',true);
        if(!$wish_id){
            do_frame('参数错误！');
        }
        $edit_wish_title = $this->input->post('edit_wish_title',true);
        $edit_wish_content = $this->input->post('edit_wish_content',true);
        if(!$edit_wish_title || !$edit_wish_content){
            do_frame('输入不能为空！');
        }
        $data = array(
            'title' => $edit_wish_title,
            'content' => $edit_wish_content,
        );
        $this->db->where(array('wish_id'=>$wish_id));
        $result = $this->db->update($this->_table,$data);
        return $result;
    }

    //前台增加评论
    public function add_wish_comment_from_front(){
        $wish_id = $this->input->post('add_wish_id',true);
        if(!$wish_id){
            do_frame('参数错误！');
        }
        $add_wish_comment = $this->input->post('add_wish_comment',true);
        if(!$add_wish_comment){
            do_frame('输入不能为空！');
        }
        $data = array(
            'question' => $add_wish_comment,
            'wish_id' => $wish_id,
            'user_id' => 1,
            'addtime' => SYSTEM_TIME,
        );
        $result = $this->db->insert('wish_comment',$data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    //后台愿望列表
    public function get_wish_list_from_backend(){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where(array('is_deleted'=>0));
        $this->db->limit(12,0);
        $this->db->order_by('wish_id','DESC');
        $wish =  $this->db->get()->result_array();
        if($wish){
            foreach($wish as &$w){
                if($w['wish_images']){
                    $upload_file_info = $this->upload_file->get_upload_file_info_by_fid($w['wish_images']);
                    $w['file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
                    $w['addtime'] = $w['addtime'] ? date('Y-m-d',$w['addtime']) : '';
                }
                unset($w);
            }
        }
        return $wish;
    }

    //后台愿望评论列表
    public function get_comment_list_from_backend($wish_id){
        if(!$wish_id){
            echo "<script>alert('参数错误！');</script>";
            header('Location: /admin/wish_list');
        }
        $this->db->select('*');
        $this->db->from('wish_comment');
        $this->db->where(array('is_deleted'=>0));
        $this->db->where(array('wish_id'=>$wish_id));
        $this->db->limit(12,0);
        $this->db->order_by('comment_id','DESC');
        $comment =  $this->db->get()->result_array();
        if($comment){
            foreach($comment as &$c){
                $c['addtime'] = $c['addtime'] ? date('Y-m-d',$c['addtime']) : '';
            }
            unset($c);
        }
        return $comment;
    }

    //更新愿望评论回复
    public function do_upgrade_wish_comment_answer(){
        $comment_id = $this->input->post('comment_id',true);
        if(!$comment_id){
            echo "<script>alert('参数错误！');</script>";
            header('Location: /admin/wish_list');
        }
        $answer = $this->input->post('answer',true);
        if(!$answer){
            echo "<script>alert('输入不能为空!');</script>";
            header('Location: /admin/wish_list');
        }
        $data = array(
            'answer' => $answer,
            'is_answer' => 1,
        );
        $this->db->where(array('comment_id'=>$comment_id));
        $res = $this->db->update('wish_comment',$data);
        return $res;

    }

    //愿望清单删除
    public function wish_list_del_from_backend(){
        $wish_id = $this->input->get('wish_id',true);
        $data = array(
            'is_deleted' => 1,
        );
        $this->db->where(array('wish_id'=>$wish_id));
        $res = $this->db->update($this->_table,$data);
        return $res;
    }

    //后台删除愿望评论
    public function wish_commnet_del_from_backend(){
        $comment_id = $this->input->get('comment_id',true);
        $data = array(
            'is_deleted' => 1,
        );
        $this->db->where(array('comment_id'=>$comment_id));
        $res = $this->db->update('wish_comment',$data);
        return $res;
    }


}