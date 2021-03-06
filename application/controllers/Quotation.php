<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('quotation_model','quotation');
    }

    public function quotation(){
        $this->load->model('quotation_model','quotation');
        $quotation = $this->quotation->get_front_quotation_list();
        $this->load->view('quotation_quotation.html',array('quotation'=>$quotation));
    }


    public function add(){

        $this->load->model('quotation_model','quotation');
        $res = $this->quotation->add();
        if($res['err']){
            do_frame($res['err']);
        }
        do_frame('添加报价成功！');
        header('Location: /quotation/quotation');

    }

    public function edit(){
        $this->load->model('quotation_model','quotation');
        $res = $this->quotation->edit();
        if($res['err']){
            do_frame($res['err']);
        }
        do_frame('编辑成功！');
        header('Location: /quotation/quotation');
    }

    public function del(){
        $this->load->model('quotation_model','quotation');
        $qid = $this->input->get('qid',true);
        if(!$qid){
            echo '参数有误！';
            header('Location: /index/quotation');
        }
        $res = $this->quotation->del($qid);
        header('Location: /quotation/quotation');
    }

    public function quotation_test(){
        $this->load->model('quotation_model','quotation');
        $quotation = $this->quotation->get_front_quotation_list();
        $this->load->view('quotation_quotation_test.html',array('quotation'=>$quotation));
    }

    public function quotation_attach_del(){
        if(is_ajax()){
            $res = $this->quotation->do_quotation_enquiry_attach_del();
            if($res){
                die(json_encode(array('code'=>1,'msg'=>'删除附件成功！')));
            }
        }
    }


}