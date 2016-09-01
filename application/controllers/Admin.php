<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    protected $_user_name,$_password = null;

    public function __construct(){
        parent::__construct();
       /* if(!isset($_SESSION['auth_admin_user_name'])){
            header("Location: /Admin_Login/login");
        }*/
        $this->load->model('public_model', 'p');
    }



    public function index(){

        //$this->load->view('admin_index');
        $this->quotation_list();
    }

    public function quotation_list(){
        $this->p->db->select('*');
        $this->p->db->from('quotation');
        $this->p->db->limit(0,20);
        $res =  $this->p->db->get()->result_array();
        foreach($res as &$r){
            if(!intval($r['reply_price'])){
                $r['reply_price'] = '';
            }
            $r['addtime'] = intval($r['addtime']) ? date('Y-m-d',$r['addtiem']) : '-';
            $r['enquiry_images'] =  $r['enquiry_images'] ? unserialize($r['enquiry_images']) : array();
            unset($r);
        }
        $this->load->view('admin_quotation_list.html',array('list'=>$res));
    }

    //回复报价
    public function quotation_edit(){

        $qid = $this->input->get('qid',true);

        if(IS_POST){
            $price = trim($this->input->post('reply_price','trim'));
            $reply_content = trim($this->input->post('reply_content','trim'));
            $attach = '/upload/abc.jpg';
            $data = array(
                'reply_price'=>$price,
                'reply_content'=>$reply_content,
                'reply_attach'=>$attach,
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

}

