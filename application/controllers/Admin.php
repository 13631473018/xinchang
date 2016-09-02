<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    protected $_user_name,$_password = null;

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('auth_admin_login')){
            header("Location: /admin_login/login");
        }
        $this->load->model('public_model', 'p');
    }

    public function index(){
        //$this->load->view('admin_index');
        $this->quotation_list();
    }

    public function quotation_list(){
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
            $r['enquiry_images'] =  $r['enquiry_images'] ? unserialize($r['enquiry_images']) : array();
            unset($r);
        }
        $this->load->view('admin_quotation_list.html',array('list'=>$res));
    }

    //回复报价
    public function quotation_edit(){

        $qid = $this->input->get('qid',true);

        if(IS_POST){
            $this->load->library('file');
            $price = trim($this->input->post('reply_price','trim'));
            $reply_content = trim($this->input->post('reply_content','trim'));
            $reply_attach = $_FILES['reply_attach'];
            $upload = $this->file->upload_file($reply_attach);
            $data = array(
                'reply_price'=>$price,
                'reply_content'=>$reply_content,
                'reply_attach'=>$upload->filePath,
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

