<?php
//class DB
//{
//    var $connectionString;
//    var $userName;
//    var $password;
//    var $charset;
//
//    public function __construct($cnnStr, $userName, $pass, $charset)
//    {
//        $this->connectionString = $cnnStr;
//        $this->username = $userName;
//        $this->password = $pass;
//        $this->charset = $charset;
//    }
//    public function getConnectString()
//    {
//        return $this->connectionString;
//    }
//    public function getUserName()
//    {
//        return $this->userName;
//    }
//
//    public function getPassword()
//    {
//        return $this->password;
//    }
//    public function getCharSet()
//    {
//        return $this->charset;
//    }
//}


class Config
{
    public static $basePath;
    public static $ds;
    public static $resourceFolder;
    public static $siteName;
    public static $sourceLanguage;
    public static $language;
    public static $defaultModule;
    public static $defaultController;
    public static $defaultAction;
    public static $defaultTemplate;
    public static $db;
    public static $routers;
    public static $recordPerPage;
    public static $pagePerGroup;
    public static $php_mailer;
    public static $db_ConnectionString;
    public static $db_UserName;
    public static $db_Password;
    public static $db_Charset;
    
    
    public function __construct()
    {
        Config::$basePath = dirname(__FILE__).DIRECTORY_SEPARATOR.'..';
        Config::$ds = DIRECTORY_SEPARATOR;
        Config::$resourceFolder = 'public';
        Config::$siteName = 'MouseWip - FaceShop';
        Config::$sourceLanguage = 'vi';
        Config::$language = 'vi';
        Config::$defaultModule = 'Default';
        Config::$defaultController = 'Index';
        Config::$defaultAction = 'index';
        Config::$defaultTemplate = 'main';
        Config::$db_ConnectionString = 'mysql:host=localhost;dbname=faceshop;charset=utf8';
        Config::$db_UserName = 'root';
        Config::$db_Password = '';
        Config::$db_Charset = 'utf8';
    
        Config::$routers = array(
            'tin-tuc' => 'news',
            'san-pham' => 'products',
        );

        Config::$php_mailer = array(
            'Host' => 'smtp.zoho.com',
            'Port' => 465,
            'SMTPDebug' => 0,
            'Debugoutput' => 'html',
            'SMTPSecure' => 'ssl',
            'SMTPAuth' => true,
            'Username' => 'mousewip@gmail.com',
            'Password' => 'htpvtkn4878856',
        );
    }
}
?>