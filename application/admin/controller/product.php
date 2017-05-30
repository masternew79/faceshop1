<?php
class Admin_Controller_Product extends Admin_Controller_Base{

    public function init(){
        $this->allowAccessAction = array('login');
        parent::init();
    }

    public function index($param)
    {

        if(isset($param[0]))
            $page = intVal($param[0]) == 0 ? 1 : intVal($param[0]);
        else
            $page = 1;

        $sodong = HTP::$config['recordPerPage'];
        $x = ($page - 1) * $sodong;
        $this->view->products = Product::model()->findAllBySql('select * from product limit '.$x.', '.$sodong);
        //$this->view->products = Product::model()->findAll();
        $this->view->page = $page;
        $this->view->sodong = $sodong;
        $this->view->totalPage = Product::model()->getCount();
        $this->view->setLayout('main');
        $this->view->render('index');
    }

    public function add(){
        if(HTP_Request::post('Product'))
        {
            $product = new Product();
            $product->load(HTP_Request::post('Product'));
            $product->insert();
            $this->redirect(HTP::$baseUrl);
        }
        else
        $this->view->render('add');
    }

    public function delete($param)
    {
        if(isset($param[0]))
        {
            $id = intval($param[0]);
            $page = isset($param[1]) ? intval($param[1]) : 1;
            Product::model()->delete('id = :id', array(':id'=>$id));
            $this->redirect(HTP::$baseUrl.'/product/'. $page);
        }
    }

    public function update($param)
    {
        if(isset($param[0]))
        {
            $id = intVal($param[0]);
            $product = Product::model()->find('id = :id', array(':id'=>$id));
            $this->view->product = $product;
            $this->view->render('update');
        }
        if(HTP_Request::post('Product'))
        {
            $product = new Product();
            $product->load(HTP_Request::post('Product'));
            $product->update('id = :id', array(':id'=>$product->id));
        }
        else
            $this->redirect(HTP::$baseUrl);
    }
}