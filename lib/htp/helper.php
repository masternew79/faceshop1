<?php
class Helper{
    public static function getPage($page){
        return ($page != null && trim($page) != '' && $page > 0 && is_numeric($page)) ? $page : 1;
    }
     
    public static function getCurrentUrl(){
        return 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }
     
    public static function convertAlias($str){
        $str = strtolower(trim($str));
        $str = trim($str, '-');
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);
        return $str;
    }

    public static function strip_tags_content($text) {
        /*return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); */
        return preg_replace('/(?:<|&lt;)\/?([a-zA-Z]+) *[^<\/]*?(?:>|&gt;)/', '', $text);
    }

    public static function checkMailExists($email)
    {
        $sender = 'mousewip@gmail.com';
        $SMTP_Validator = new SMTP_validateEmail();
//      turn on debugging if you want to view the SMTP transaction
        $SMTP_Validator->debug = false;
        $results = $SMTP_Validator->validate(array($email), $sender);
        if ($results[$email]) {
            return true;
        } else {
            return false;
        }
    }

    public static function sendmail($email, $body, $subject){
        $mail = new HTP_Email();
        $mail->Subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
        $mail->isHTML(true);

        $mail->Body = $body;
        $mail->SetFrom('mousewip@gmail.com');
        $mail->addAddress($email);
      //  $mail->toMails = $email;
        $send = $mail->sendMail();

        if($send){
            return true;
        }else{
            return false;
        }
    }

}