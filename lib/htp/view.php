<?php
class HTP_View{
    private $title;
    private $image;
    private $keywords;
    private $description;
    private $published;
    private $modified;
    private $layout;
    private $placeholder;
  //  private $error;

     
    public function __construct(){
        $this->setLayout(HTP::$config['defaultTemplate']);
        $this->setTitle(isset(HTP::$config['name'])?HTP::$config['name']:'');
    }
 
    public function render($name){
        $this->placeholder = $name;
        require 'application/'.strtolower(HTP::$module).'/view/layout/'.$this->layout.'.php';
    }
 
    public function renderPartial($name){
        $names = explode('/', $name);
        if(count($names) == 1){
            $name = strtolower(HTP::$controller) .'/'. $name;
        }
        require 'application/'.strtolower(HTP::$module).'/view/'.$name.'.php';
    }
 
    public function placeholder(){
        $names = explode('/', $this->placeholder);
        if(count($names) == 1){
            $this->placeholder = strtolower(HTP::$controller) .'/'. $this->placeholder;
        }
        require 'application/'.strtolower(HTP::$module).'/view/'.$this->placeholder.'.php';
    }
//
//    public function showErrorMessage()
//    {
//        echo $this->error;
//    }
     
    public function setLayout($layout){
        $this->layout = $layout;
    }
    public function getLayout(){
        return $this->layout;
    }
    public function setKeywords($keywords){
        $this->keywords = $keywords;
    }
    public function getKeywords(){
        return $this->keywords;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }
     
    public function setPublished($published){
        $this->published = $published;
    }
     
    public function setModified($modified){
        $this->modified = $modified;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getTitle(){
        return $this->title;
    }

//    public function setError($error){
//        $this->error = $error;
//    }
//    public function getError(){
//        return $this->error;
//    }
}