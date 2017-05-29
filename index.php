<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once(dirname(__FILE__).'/lib/htp/htp.php');
$config = require_once('config/application.php');
$app = new HTP($config);
$app->run();
?>