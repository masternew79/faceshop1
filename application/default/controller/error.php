<?php
class Default_Controller_Error extends Default_Controller_Base{
    public function index(){

       $this->redirect(HTP::$baseUrl);
    }

    public function nodatabase(){
        //$this->view->setLayout('other');
        $this->view->render('nodb');
        //echo '<img src="'.$this->$img . '"/>';
    }

    public function test()
    {
       echo Helper::checkMailIsExists('mousewip@gmail.com');
    }

}