<?php
class Admin_Controller_Product extends Admin_Controller_Base{

    public function init(){
        //$this->allowAccessAction = array('login');
        parent::init();
    }

    public function index($param)
    {
        if(isset($param[0]))
            $page = $param[0];
        else
            $page = 1;

        $sodong = HTP::$config['recordPerPage'];
        $x = ($page - 1) * $sodong;
        $sql = "select * from product limit $x, $sodong";
        $this->view->products = Product::model()->findBySql($sql);


        $this->view->totalPage = Product::model()->getCount();
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