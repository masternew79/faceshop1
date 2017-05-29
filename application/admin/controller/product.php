<?php
class Admin_Controller_Product extends Admin_Controller_Base{

    public function init(){
        //$this->allowAccessAction = array('login');
        parent::init();
    }

    public function index()
    {
        $this->view->setLayout('main');
        $this->view->render('index');
    }
    public function add($param = null){
        if(isset($param[0])){
            echo 'add success id = '.$param[0];
        }
        else
        {
            echo 'fail';
        }
    }
}