<?php
session_start();
function create_image()
{
    $md5_hash = md5(rand(0, 999));
    $security_code = substr($md5_hash, 17, 5);
    $_SESSION["security_code"] = $security_code;
    $width = 100;
    $height = 23;
    $im = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($im, 238, 238, 238);
    $black = imagecolorallocate($im, 0, 0, 0);
    imagefilledrectangle($im, 0, 0, 399, 29, $white);
    $font = 'assets/fonts/arial.ttf';
    imagettftext($im, 20, 0, 10, 20, $black, $font, $security_code);
    header("Content-Type: image/png");
    imagepng($im);
    imagedestroy($im);
}
create_image();
exit();
