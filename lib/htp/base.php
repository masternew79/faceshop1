<?php
require_once 'lib/Common.php';
class Base{
    public static $module;
    public static $controller;
    public static $action;
    public static $param;
    public static $config;
    public static $baseUrl;
    public static $resourceUrl;
    public static $homeUrl;

    public function __construct($_config) {
        Base::$config = $_config;
        Base::$baseUrl = $this->getBaseUrl();
        Base::$resourceUrl = Base::$baseUrl . '/' . Base::$config['resourceFolder'];
        spl_autoload_register('self::autoLoad');
    }

    private function getBaseUrl(){
        $currentPath = $_SERVER['PHP_SELF'];
        $pathInfo = pathinfo($currentPath);
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
        $fullpath = explode('/',$pathInfo['dirname']);
        Base::$homeUrl = $protocol . $hostName .'/'.$fullpath[1];
        return $protocol . $hostName . ($pathInfo['dirname'] != '/' ? $pathInfo['dirname'] : '');
    }

    public function autoLoad($class){
        $file = strtolower(str_replace('_',Base::$config['ds'],$class).'.php');
        if(file_exists('application'.Base::$config['ds'].$file)){
            include_once 'application'.Base::$config['ds'].$file;
        }else if(file_exists('lib'.Base::$config['ds'].$file)){
            include_once 'lib'.Base::$config['ds'].$file;
        }else if(file_exists('model'.Base::$config['ds'].$file)){
            include_once 'model'.Base::$config['ds'].$file;
        }else if(file_exists($file)){
            require_once "$file";
        }
    }

    public function run(){
        $module = Base::$config['defaultModule'];
        $controller = Base::$config['defaultController'];
        $action = Base::$config['defaultAction'];
        $param = array();
        if(isset($_GET['router'])){
            $routers = strtolower(rtrim($_GET['router'],'/\\'));
            unset($_GET['router']);
            foreach(Base::$config['routers'] as $key=>$value){
                $key = str_replace('/', '\/', $key);
                if(preg_match('/^'.$key.'/', $routers, $match)){
                    $routers = str_replace($match[0], $value, $routers);
                    break;
                }
                if($routers == $value){
                    $routers = 'index/error';
                    $param['code'] = '404';
                    $param['message'] = 'Request not found!';
                    break;
                }
            }
            $routers = explode('/',$routers);
            if($routers[0] != '' && is_dir('application'.Base::$config['ds'].str_replace('-','',$routers[0]))){
                $module = str_replace('-','',$routers[0]);
                array_shift($routers);
            }
            if(isset($routers[0])){
                $filepath = 'application'.Base::$config['ds'].strtolower($module).Base::$config['ds'].'controller'.Base::$config['ds'].str_replace('-','',$routers[0]).'.php';
                if(file_exists($filepath)){
                    $controller = str_replace('-','',$routers[0]);
                    array_shift($routers);
                }
            }
            if(isset($routers[0])){
                $class = ucfirst($module).'_Controller_'.ucfirst($controller);
                if(method_exists($class, str_replace('-', '', $routers[0])) || $routers[0] == 'error'){
                    $action = str_replace('-','',$routers[0]);
                    array_shift($routers);
                }
            }
            if(isset($routers[0])){
                $param = $routers;
            }
        }
        Base::$module = $module;
        Base::$controller = $controller;
        Base::$action = $action;
        Base::$param = $param;
        if($module != Base::$config['defaultModule']){
            Base::$baseUrl .= '/' . $module;
        }
        $class = ucfirst($module).'_Controller_'.ucfirst($controller);
        $controller = new $class();
        if(method_exists($controller, 'init')){
            $controller->init();
        }
        $controller->$action($param);
    }
}