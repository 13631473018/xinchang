<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 文件处理类
 */
class file
{

    var $pic_formats = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'application/pdf'); //可以上传的图片格
    var $f_formats = array('image/gif', 'image/jpeg', 'image/pjpeg', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/pdf', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/x-zip-compressed', 'application/octet-stream', 'text/plain');
    var $f , $path, $err,  $filePath, $newName, $originName, $mimeType, $fileSize, $fileExt;
    var $max_size;

    function __construct()
    {

    }

    public function upload_file(&$fs){
        $this->max_size = 5*1024*1024;
        $this->f = $fs;
        $relate_save_path = 'upload' . DS .date('Y') .DS .date('m') .DS . date('d') . DS ;
        $this->path = ROOT_PATH . $relate_save_path ;
        if (!is_dir($this->path)) {
            @mkdir($this->path, 0777, true);
        }
        if( $this->f['size'] >$this->max_size){
            $this->err = array('err' => '文件不能大于5M');
            return $this;
        }
        if(!empty($this->f['tmp_name']) && $this->f['size'] != 0 && $this->f['error'] == 0 ){
            $file_info = pathinfo($this->f['name']);
            $fileName = SYSTEM_TIME . uniqid();
            $ext = $file_info['extension'];
            $fileName .= '.' . $ext;
            $save_absolute = $this->path . $fileName;
            if(move_uploaded_file($this->f['tmp_name'],$save_absolute)){
                $this->newName = $fileName;
                $this->originName = $this->f['name'];
                $this->fileSize = $this->f['size'];
                $this->fileExt = $ext;
                $this->filePath = DS . $relate_save_path.$fileName;
                return $this;
            }
        }
    }

}