<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    protected $_user_name,$_password = null;

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['auth_admin_login'])){
            header("Location: /Admin_Login/login");
        }
        $this->load->model('public_model', 'p');
    }

    public function index(){
        //$this->load->view('admin_index');
        $this->quotation_list();
    }

    public function quotation_list(){
        $this->load->model('upload_file_model','upload_file');
        $this->p->db->select('*');
        $this->p->db->from('quotation');
        $this->p->db->where(array('is_deleted'=>0));
        $this->p->db->limit(0,20);
        $res =  $this->p->db->get()->result_array();
        foreach($res as &$r){
            if(!intval($r['reply_price'])){
                $r['reply_price'] = '';
            }
            $r['addtime'] = intval($r['addtime']) ? date('Y-m-d',$r['addtime']) : '-';
            if($r['enquiry_attach']){
                $upload_file_info = $this->upload_file->get_upload_file_info_by_fid($r['enquiry_attach']);
                $r['enquiry_origin_name'] = $upload_file_info['origin_name'] ? $upload_file_info['origin_name'] : '';
                $r['enquiry_file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
            }
            if($r['reply_attach']){
                $upload_file_info = $this->upload_file->get_upload_file_info_by_fid($r['enquiry_attach']);
                $r['reply_origin_name'] = $upload_file_info['origin_name'] ? $upload_file_info['origin_name'] : '';
                $r['reply_file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
            }
            unset($r);
        }
        $this->load->view('admin_quotation_list.html',array('list'=>$res));
    }

    public function view_test(){

        //参数是填要显示的模板名称
        $this->load->view('admin_quotation_list_test.html');

    }

    //回复报价
    public function quotation_edit(){

        $qid = $this->input->get('qid',true);
        $this->load->model('upload_file_model','upload_file');

        if(IS_POST){
            $this->load->library('file');
            $price = trim($this->input->post('reply_price','trim'));
            $reply_content = trim($this->input->post('reply_content','trim'));
            $reply_attach = $_FILES['reply_attach'];
            $upload_ojb = $this->file->upload_file($reply_attach);
            $upload_file_id = $this->upload_file->insert_upload_file_record($upload_ojb);
            $data = array(
                'reply_price'=>$price,
                'reply_content'=>$reply_content,
                'reply_attach'=>$upload_file_id,
                'is_reply'=>1,
            );
            $this->p->db->where(array('quotation_id'=>$qid));
            $result = $this->p->db->update('quotation',$data);
            if($result){
                echo '保持成功';
                header("Location: /admin/quotation_list");
            }
        }

        $this->p->db->select('*');
        $this->p->db->from('quotation');
        $this->p->db->where(array('quotation_id'=>$qid));
        $res = $this->p->db->get()->row_array();
        if($res['enquiry_attach']){
            $upload_file_info = $this->upload_file->get_upload_file_info_by_fid($res['enquiry_attach']);
            $res['enquiry_origin_name'] = $upload_file_info['origin_name'] ? $upload_file_info['origin_name'] : '';
            $res['enquiry_file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
        }
        if($res['reply_attach']){
            $upload_file_info = $this->upload_file->get_upload_file_info_by_fid($res['reply_attach']);
            $res['reply_origin_name'] = $upload_file_info['origin_name'] ? $upload_file_info['origin_name'] : '';
            $res['reply_file_path'] = $upload_file_info['file_path'] ? $upload_file_info['file_path'] : '';
        }
        $this->load->view('admin_quotation_edit.html',array('quo'=>$res));
    }

    public function quotation_del(){
        $this->load->model('quotation_model','quotation');
        $qid = $this->input->get('qid',true);
        if(!$qid){
            echo '参数有误！';
            header('Location: /admin/quotation_list');
        }
        $res = $this->quotation->del($qid);
        header('Location: /admin/quotation_list');
    }

}

