<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once(dirname(__FILE__).'/lib/htp/htp.php');
require_once(dirname(__FILE__).'/lib/phpmailchecked/smtp_validateEmail.class.php');
$config = require_once('config/application.php');
$app = new HTP($config);
$app->run();
?>