<?php
class HTP_User extends HTP_Session{
    public static $info;
    public static function setId($id){
        self::set('ID', $id);
    }
     
    public static function getId(){
        return self::get('ID');
    }
     
    public static function setInfo($info){
        self::set('Info', $info);
    }
     
    public static function getInfo(){
        return self::get('Info');
    }
     
    public static function logged(){
        if(self::get('ID') !== null)
            return true;
        return false;
    }
     
    public static function logout(){
        self::delete('ID');
        if(self::get('ID') !== null)
            return false;
        return true;
    }
}