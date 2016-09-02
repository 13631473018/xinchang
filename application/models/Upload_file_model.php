<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_file_model extends CI_Model{

    protected $_table = 'upload_file';

    public function insert_upload_file_record($upload_ojb){
        if(!$upload_ojb){
            return false;
        }
        $data = array(
            'origin_name'=>$upload_ojb->originName,
            'new_name'=>$upload_ojb->newName,
            'file_ext'=>$upload_ojb->fileExt,
            'file_size'=>$upload_ojb->fileSize,
            'file_path'=>$upload_ojb->filePath,
            'addtime'=>SYSTEM_TIME,
        );
        $result = $this->db->insert($this->_table,$data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function get_upload_file_info_by_fid($fid){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where(array('file_id'=>$fid));
        $res =  $this->db->get()->row_array();
        return $res;
    }


}