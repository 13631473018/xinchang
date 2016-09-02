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
        $enquiry_title = $this->input->post('enquiry_title',true);
        $enquiry_content = $this->input->post('enquiry_content',true);
        $enquiry_attach = $_FILES['enquiry_attach'];
        $upload = $this->file->upload_file($enquiry_attach);

        $data = array(
            'enquiry_title'=>$enquiry_title,
            'enquiry_content'=>$enquiry_content,
            'enquiry_attach'=>$upload->filePath,
            'addtime'=>SYSTEM_TIME,
        );

        $result = $this->db->insert($this->_table,$data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return false;
        }

    }

    public function get_front_quotation_list(){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where(array('is_deleted'=>0));
        $this->db->limit(0,20);
        $res =  $this->db->get()->result_array();
        if($res){
            foreach($res as &$r){
                $r['addtime'] = date('d',$r['addtime']).'/'.date('m',$r['addtime']).'/'.date('y',$r['addtime']);
                $r['file_origin_name'] = get_file_origin_name($r['enquiry_attach']);
                unset($r);
            }
        }
        return $res;
    }

    public function edit(){

        $this->load->library('file');

        $qid = $this->input->post('qid',true);
        $enquiry_title = $this->input->post('enquiry_title',true);
        $enquiry_content = $this->input->post('enquiry_content',true);
        $enquiry_attach = $_FILES['enquiry_attach'];
        $upload = $this->file->upload_file($enquiry_attach);

        $data = array(
            'enquiry_title'=>$enquiry_title,
            'enquiry_content'=>$enquiry_content,
            'enquiry_attach'=>$upload->filePath,
        );

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
