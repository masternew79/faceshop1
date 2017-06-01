<?php
class Admin_Controller_Order extends Admin_Controller_Base{

    public function init(){
        $this->allowAccessAction = array('login');
        parent::init();
    }

    public function index()
    {
        $this->view->order = Order::model()->findAll();
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


    public function delete($param)
    {
        if(isset($param[0]))
        {
            $id = intval($param[0]);
            $page = isset($param[1]) ? intval($param[1]) : 1;
            OrderDetail::model()->delete('id = :id', array(':id'=>$id));
            Order::model()->delete('id = :id', array(':id'=>$id));
            $this->redirect(HTP::$baseUrl.'/product/'. $page);
        }
        else
            $this->redirect(HTP::$baseUrl);
    }
}