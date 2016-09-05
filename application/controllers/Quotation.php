<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation extends MY_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function quotation(){
        $this->load->model('quotation_model','quotation');
        $quotation = $this->quotation->get_front_quotation_list();
        $this->load->view('quotation_quotation.html',array('quotation'=>$quotation));
    }


    public function add(){

        $this->load->model('quotation_model','quotation');
        if($this->quotation->add()){
            echo '报价成功！';
            header('Location: /quotation/quotation');
        }

    }

    public function edit(){
        $this->load->model('quotation_model','quotation');
        if($this->quotation->edit()){
            echo '修改成功！';
            header('Location: /quotation/quotation');
        }
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


}