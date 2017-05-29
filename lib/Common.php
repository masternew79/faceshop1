<?php
class Common
{
    public static $db_ConnectionString;
    public static $db_UserName;
    public static $db_Password;
    public static $db_Charset;
    public static $recordPerPage = 20;
    public static $pagePerGroup = 10;

    public function __construct()
    {
        Common::$db_ConnectionString = 'mysql:host=localhost;dbname=faceshop;charset=utf8';
        Common::$db_UserName = 'root';
        Common::$db_Password = '';
        Common::$db_Charset = 'utf8';
    }
}
?>