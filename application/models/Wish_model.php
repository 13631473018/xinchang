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
        $this->db->limit(0,12);
        $this->db->order_by('wish_id','DESC');
        $res =  $this->db->get()->result_array();
        if($res){
            foreach($res as &$r){
                $r['addtime'] = date('d',$r['addtime']).'/'.date('m',$r['addtime']).'/'.date('y',$r['addtime']);
                if($r['wish_images']){
                    $upload_file_info = $this->upload_file->get_upload_file_info_by_fid($r['wish_images']);
                    $r['file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
                }
                unset($r);
            }
        }
        return $res;
    }

    //前台编辑愿望
    public function edit_wish_list_from_front(){
        $wish_id = $this->input->get('wish_id',true);
        if(!$wish_id){
            do_frame('参数错误！');
        }
        $edit_wish_title = $this->input->post('edit_wish_title',true);
        $edit_wish_title = $edit_wish_title[$wish_id];
        $edit_wish_content = $this->input->post('edit_wish_content',true);
        $edit_wish_content = $edit_wish_content[$wish_id];
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
        $wish_id = $this->input->get('wish_id',true);
        wwww($wish_id);
        die;
        if(!$wish_id){
            do_frame('参数错误！');
        }
        $add_wish_comment = $this->input->post('add_wish_comment',true);
        $add_wish_comment = $add_wish_comment[$wish_id];
    }


}