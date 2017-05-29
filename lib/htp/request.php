<?php
class HTP_Request{
    public static function get($name){
        return isset($_GET[$name]) ? $_GET[$name] : null;
    }
    public static function post($name){
        return isset($_POST[$name]) ? $_POST[$name] : null;
    }
    public static function file($name){
        return isset($_FILES[$name]) ? $_FILES[$name] : null;
    }
}