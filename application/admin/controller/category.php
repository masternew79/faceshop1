<?php
class Admin_Controller_Category extends Admin_Controller_Base{

    public function init(){
        //$this->allowAccessAction = array('login');
        parent::init();
    }

    public function index()
    {
        $this->view->setLayout('main');
        $this->view->render('index');
    }
}