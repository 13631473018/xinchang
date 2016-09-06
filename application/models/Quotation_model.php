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
        if(isset($_FILES['enquiry_attach'])){
            $enquiry_attach = $_FILES['enquiry_attach'];
            $upload_ojb = $this->file->upload_file($enquiry_attach);
            $upload_file_id = $this->upload_file->insert_upload_file_record($upload_ojb);
            $data['enquiry_attach'] = $upload_file_id;
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
                    $r['origin_name'] = $upload_file_info['origin_name'] ? $upload_file_info['origin_name'] : '';
                    $r['file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
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
        if(isset($_FILES['enquiry_attach'])){
            $enquiry_attach = $_FILES['enquiry_attach'];
            $upload_ojb = $this->file->upload_file($enquiry_attach);
            $upload_file_id = $this->upload_file->insert_upload_file_record($upload_ojb);
            $data['enquiry_attach'] = $upload_file_id;
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

}
