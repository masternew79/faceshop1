<?php
class HTP_Session{
    public static function start(){
        @session_start();
    }
     
    public static function set($name, $value){
        $_SESSION[$name] = $value;
    }
     
    public static function get($name){
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }
     
    public static function delete($name){
        if(isset($_SESSION[$name])){
            unset($_SESSION[$name]);
        }
    }
     
    public static function destroy(){
        return @session_destroy();
    }
}