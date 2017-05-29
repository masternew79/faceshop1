<?php
    return array(
        'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'ds' => DIRECTORY_SEPARATOR,
        'resourceFolder' => 'public',
        'name' => 'MouseWip - FaceShop',
        'sourceLanguage' => 'vi',
        'language' => 'vi',
        'defaultModule' => 'Default',
        'defaultController' => 'Index',
        'defaultAction' => 'index',
        'defaultTemplate' => 'main',
        'db' => array(
            'connectionString'=>'mysql:host=localhost;dbname=faceshop;charset=utf8',
            'emulatePrepare'=>true,
            'username'=>'root',
            'password'=>'',
            'charset'=>'utf8',
        ),
         
        'routers' => array(
            'tin-tuc' => 'news',
            'san-pham' => 'products',
        ), 
        'recordPerPage' => 20,
        'pagePerGroup' => 10,

        'mail' => array(
            'Host' => 'smtp.gmail.com',
            'Port' => 465,
            'SMTPDebug' => 1,
            'Debugoutput' => 'html',
            'SMTPSecure' => 'ssl',
            'SMTPAuth' => true,
            'Username' => 'mousewip@gmail.com',
            'Password' => 'htpvtkn4878856',
        ),
         
    );
?>