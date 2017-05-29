<?php
class HTP_Validator_Email extends HTP_Validator_String{
     
    private $pattern = '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';
    public function validate(){
        parent::validate();
        $pattern = isset($this->config['pattern']) ? $this->config['pattern'] : $this->pattern;
        if(!is_string($this->value) || !preg_match($pattern, $this->value))
            $this->setError('Field "'. $this->config['label'] .'" must be an email.');
    }
}