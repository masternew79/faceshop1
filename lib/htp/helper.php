<?php
class Helper{
    public static function getPage($page){
        return ($page != null && trim($page) != '' && $page > 0 && is_numeric($page)) ? $page : 1;
    }
     
    public static function getCurrentUrl(){
        return 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }
     
    public static function convertAlias($str){
        $str = strtolower(trim($str));
        $str = trim($str, '-');
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);
        return $str;
    }

    public static function image()
    {
        $md5_hash = md5(rand(0,999));
        $security_code = substr($md5_hash, 15, 5);
        $_SESSION["security_code"] = $security_code;
        $width = 100;
        $height = 30;
        $image = ImageCreate($width, $height);
        $white = ImageColorAllocate($image, 255, 255, 255);
        $black = ImageColorAllocate($image, 0, 0, 0);
        ImageFill($image, 0, 0, $black);
        ImageString($image, 5, 30, 6, $security_code, $white);
        header("Content-Type: image/jpeg");
        ImageJpeg($image);
    }
}