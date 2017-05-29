<?php
    class Default_Controller_Base extends HTP_Controller{
        public function init(){
            HTP_Session::start();
        }

    }