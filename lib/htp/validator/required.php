<?php
require_once 'validator.php';
class HTP_Validator_Required extends HTP_Validator_Base
{
    public function validate(){
        if(!isset($this->value) || null == $this->value || trim($this->value) == '')
            $this->setError('Field "'. $this->config['label'] .'" is required.');
    }
}
?>