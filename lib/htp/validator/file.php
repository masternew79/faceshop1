<?php
require_once 'validator.php';
class HTP_Validator_File extends HTP_Validator_Base{
    public function beforeValidator(){
        if(isset($this->config['allowEmpty']) && $this->config['allowEmpty'] === true){
            if(isset($this->config['multiple'])){
                if($_FILES[$this->attr]['name'][0] == '')
                    return true;
                else
                    return false;
            }else{
                if($_FILES[$this->attr]['name'] == '')
                    return true;
                else
                    return false;
            }
        }else{
            return false;
        }
             
    }
    public function validate(){
        $file = $_FILES[$this->attr];
        if(isset($this->config['multiple'])){
            for($i = 0; $i < count($file['name']); $i++){
                $this->validateFile(array(
                    'name' => $file['name'][$i],
                    'type' => $file['type'][$i],
                    'tmp_name' => $file['tmp_name'][$i],
                    'error' => $file['error'][$i],
                    'size' => $file['size'][$i]
                ));
            }
        }else{
            $this->validateFile($file);
        }
    }
     
    private function validateFile($file){
        if($file['name'] == ''){
            $this->setError('Field "'. $this->config['label'] .'" is file.');
            return;
        }
        if($file['error'] != '' && $file['error'] != 0){
            $this->setError('File "'. $this->config['label'] .'" is error.');
            return;
        }
             
        if(isset($this->config['maxSize']) && $file['size'] / 1024 > $this->config['maxSize'])
            $this->setError('The file is too large. Its should be at max ' . $this->config['maxSize'] . ' kb in size.');
             
        if(isset($this->config['minSize']) && $file['size'] / 1024 < $this->config['minSize'])
            $this->setError('The file is too large. Its should be at max ' . $this->config['maxSize'] . ' kb in size.');
                 
        if(isset($this->config['mimeType']) && !in_array($info['mime'], $this->config['mimeType']))
            $this->setError('This mime type of the file is not allowed');
         
        if(isset($this->config['ext']) && !in_array(pathinfo($file['name'], PATHINFO_EXTENSION), $this->config['ext']))
            $this->setError('The file should have extension in ' . implode(', ', $this->config['ext']));
             
        $info = @getimagesize($file['tmp_name']);
        if($info != null){
            if(isset($this->config['minWidth']) && $info[0] < $this->config['minWidth'])
                $this->setError('Photo should be at least ' . $this->config['minWidth'] . 'px in width');
                 
            if(isset($this->config['maxWidth']) && $info[0] > $this->config['maxWidth'])
                $this->setError('Photo should be at max ' . $this->config['maxWidth'] . 'px in width');
                 
            if(isset($this->config['minHeight']) && $info[1] < $this->config['minHeight'])
                $this->setError('Photo should be at least ' . $this->config['minHeight'] . 'px in height');
                 
            if(isset($this->config['maxHeight']) && $info[1] > $this->config['maxHeight'])
                $this->setError('Photo should be at max ' . $this->config['maxHeight'] . 'px in height');
        }
    }
}