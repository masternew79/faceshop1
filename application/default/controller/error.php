<?php
class Default_Controller_Error extends Default_Controller_Base{
    public function index(){

       Helper::sendmail('thanhphong.vtkn@gmail.com', '12345');
    }

    public function nodatabase(){
        //$this->view->setLayout('other');
        $this->view->render('nodb');
        //echo '<img src="'.$this->$img . '"/>';
    }

}