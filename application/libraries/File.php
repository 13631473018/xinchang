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
        $max_size = 5*1024*1024;
        $this->f = $fs;
        $relate_save_path = 'upload' . DS .date('Y') .DS .date('m') .DS . date('d') . DS ;
        $this->path = ROOT_PATH . $relate_save_path ;
        if (!is_dir($this->path)) {
            @mkdir($this->path, 0777, true);
        }
        if( $this->f['size'] >$max_size){
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

    //一次上传多个文件
    public function upload_file_multiple(&$fs){
        $file_index = 0;
        $file_multiple = array();
        $max_size = 5*1024*1024;
        $array_size = count($fs['name']);
        $relate_save_path = 'upload' . DS .date('Y') .DS .date('m') .DS . date('d') . DS ;
        $this->path = ROOT_PATH . $relate_save_path ;
        if (!is_dir($this->path)) {
            @mkdir($this->path, 0777, true);
        }

        for($file_index;$file_index<$array_size;$file_index++){
            $f_name = $fs['name'][$file_index];
            $f_tmp_name = $fs['tmp_name'][$file_index];
            $f_error = $fs['error'][$file_index];
            $f_size = $fs['size'][$file_index];
            if(!empty($f_name) && !empty($f_size) && empty($f_error) ){
                if($f_size >$max_size){
                    continue;
                }
                $file_info = pathinfo($f_name);
                $fileName = SYSTEM_TIME . uniqid();
                $ext = $file_info['extension'];
                $fileName .= '.' . $ext;
                $save_absolute = $this->path . $fileName;
                if(move_uploaded_file($f_tmp_name,$save_absolute)){
                    $file_multiple[$file_index]['newName'] =  $fileName;
                    $file_multiple[$file_index]['originName'] =  $f_name;
                    $file_multiple[$file_index]['fileSize'] =  $f_size;
                    $file_multiple[$file_index]['fileExt'] =  $ext;
                    $file_multiple[$file_index]['filePath'] =  DS . $relate_save_path.$fileName;
                }

            }

        }

        return $file_multiple;

    }

}