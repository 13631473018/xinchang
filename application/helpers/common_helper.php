<?php

/**
 * 扩展的公共函数库，以helper的方式在application/helpers中，会在application/config/autoload.php 中自动加载
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_ajax')) {

    /**
     * [is_ajax 判断是否是ajax请求]
     * @return boolean [description]
     */
    function is_ajax() {
        if (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) == "xmlhttprequest") {
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists('ip')) {
    /**
     * 获取请求ip
     *
     * @return ip地址
     */
    function ip() {
        static $realip = NULL;
        if ($realip !== NULL) {
            return $realip;
        }

        if (isset($_SERVER)) {
            if (isset($_SERVER ['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER ['HTTP_X_FORWARDED_FOR']);

                /*
                 * 取X-Forwarded-For中第一个非unknown的有效IP字符串
                 */
                foreach ($arr as $ip) {
                    $ip = trim($ip);

                    if ($ip != 'unknown') {
                        $realip = $ip;

                        break;
                    }
                }
            } elseif (isset($_SERVER ['HTTP_CLIENT_IP'])) {
                $realip = $_SERVER ['HTTP_CLIENT_IP'];
            } else {
                if (isset($_SERVER ['REMOTE_ADDR'])) {
                    $realip = $_SERVER ['REMOTE_ADDR'];
                } else {
                    $realip = '0.0.0.0';
                }
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }

        preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
        $realip = !empty($onlineip [0]) ? $onlineip [0] : '0.0.0.0';
        return $realip;
    }

}

//获取原文件名
if(!function_exists('get_file_origin_name')){
    //\upload\2016\09\02\_原文件名_aasgsg.jpg
    function get_file_origin_name($path){
        if(!$path){
            return '';
        }
        $file_info = pathinfo($path);
        $start_pos = strpos($file_info['basename'],'_');
        $end_pos = strrpos ($file_info['basename'],'_');
        $origin_name = substr($file_info['basename'],$start_pos+1,$end_pos-$start_pos-1);
        $origin_name .=  '.' . $file_info['extension'];
        return $origin_name;

    }

}