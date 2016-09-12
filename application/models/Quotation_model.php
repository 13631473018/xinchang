<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quotation_model extends CI_Model{

    protected $_table = 'quotation';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function add(){

        $this->load->library('file');
        $this->load->model('upload_file_model','upload_file');
        $enquiry_title = $this->input->post('enquiry_title',true);
        $enquiry_content = $this->input->post('enquiry_content',true);
        $data = array(
            'enquiry_title'=>$enquiry_title,
            'enquiry_content'=>$enquiry_content,
            'addtime'=>SYSTEM_TIME,
        );
        if(isset($_FILES['enquiry_attach']) && $_FILES['enquiry_attach']['name']){
            $enquiry_attach = $_FILES['enquiry_attach'];
            $file_multiple = $this->file->upload_file_multiple($enquiry_attach);
            //上传出错
            if($file_multiple['err']){
               return $file_multiple;
            }
            $upload_file_ids = $this->upload_file->insert_upload_file_record_multiple($file_multiple['files']);
            $data['enquiry_attach'] = $upload_file_ids ? implode(',',$upload_file_ids) : '';
        }

        $result = $this->db->insert($this->_table,$data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function get_front_quotation_list(){
        $this->load->model('upload_file_model','upload_file');
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where(array('is_deleted'=>0));
        $this->db->limit(0,20);
        $res =  $this->db->get()->result_array();
        if($res){
            foreach($res as &$r){
                $r['addtime'] = date('d',$r['addtime']).'/'.date('m',$r['addtime']).'/'.date('y',$r['addtime']);
                if($r['enquiry_attach']){
                    $upload_file_info = $this->upload_file->get_upload_file_info_by_fid($r['enquiry_attach']);
                    $r['enquiry_origin_name'] = $upload_file_info['origin_name'] ? $upload_file_info['origin_name'] : '';
                    $r['enquiry_file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
                    $r['enquiry_fid'] = $upload_file_info['file_id'];
                }
                if($r['reply_attach']){
                    $upload_file_info = $this->upload_file->get_upload_file_info_by_fid($r['reply_attach']);
                    $r['reply_origin_name'] = $upload_file_info['origin_name'] ? $upload_file_info['origin_name'] : '';
                    $r['reply_file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
                    $r['reply_fid'] = $upload_file_info['file_id'];
                }
                unset($r);
            }
        }
        return $res;
    }

    public function edit(){

        $this->load->library('file');
        $this->load->model('upload_file_model','upload_file');
        $qid = $this->input->post('qid',true);
        $enquiry_title = $this->input->post('enquiry_title',true);
        $enquiry_content = $this->input->post('enquiry_content',true);
        $data = array(
            'enquiry_title'=>$enquiry_title,
            'enquiry_content'=>$enquiry_content,
        );
        if(isset($_FILES['enquiry_attach']) && $_FILES['enquiry_attach']['name'][0]){
            $enquiry_attach = $_FILES['enquiry_attach'];
            $file_multiple = $this->file->upload_file_multiple($enquiry_attach);
            //上传出错
            if($file_multiple['err']){
                return $file_multiple;
            }
            $upload_file_ids = $this->upload_file->insert_upload_file_record_multiple($file_multiple['files']);
            $data['enquiry_attach'] = $upload_file_ids ? implode(',',$upload_file_ids) : '';
        }
        $this->db->where(array('quotation_id'=>$qid));
        $result = $this->db->update($this->_table,$data);
        return $result;

    }

    public function del($qid){
        $data = array('is_deleted'=>1);
        $this->db->where(array('quotation_id'=>$qid));
        $result = $this->db->update($this->_table,$data);
        return $result;
    }

    //删除报价附件
    public function do_quotation_enquiry_attach_del(){
        $qid = $this->input->post('qid',true);
        $fid = $this->input->post('fid',true);
        if(!$qid && !$fid){
            do_frame('参数错误！');
        }
        //报价
        $this->db->select('enquiry_attach');
        $this->db->from($this->_table);
        $this->db->where(array('quotation_id'=>$qid));
        $quo = explode(',',current($this->db->get()->row_array()));
        //与原数组比较取差集
        $diff_arr = array_diff($quo,array($fid));
        $quo_data = array(
            'enquiry_attach' => implode($diff_arr),
        );
        //更新报价enquiry_attach字段
        $this->db->where(array('quotation_id'=>$qid));
        $result = $this->db->update($this->_table,$quo_data);
        return $result;

    }

}
