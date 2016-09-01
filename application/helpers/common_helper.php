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