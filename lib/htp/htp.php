<?php
require(dirname(__FILE__).'/base.php');
require_once (dirname(__FILE__).'/helper.php');
class HTP extends Base {
    public function sendmail($receiver, $subject, $body){
        $mail = new HTP_Email();
        $mail->Subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
        $mail->isHTML(true);
        $mail->Body = $body;
        $mail->from = 'mousewip@gmail.com';
        $mail->toMails = $receiver;
        $send = $mail->sendMail();
        if($send){
            echo 'Successfully!';
        }else{
            echo 'Fail!';
        }
    }
 
}