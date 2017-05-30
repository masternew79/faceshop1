<?php
    class HTP_Controller{
        public $view;
         
        public function __construct() {
            $this->view = new HTP_View;
        }
         
        public function redirect($url){
            header('location:' . $url);
        }
    }