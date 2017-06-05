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

    public function getProducts($param) {
        $perPage = 30;
        $property = 'id';
        $sort = 'DESC';
        $start = 1;
        if (isset($param[0])) {
            $property = $param[0];
        }
        if (isset($param[1])) {
            $sort = $param[1];
        }
        if (isset($param[2])) {
            $start = ($param[2] - 1) * $perPage;
        }
        $result = array();
        $products = Product::model()->findAllBySql("SELECT * FROM product ORDER BY $property $sort LIMIT $start, $perPage");
        foreach ($products as $product) {
            $result[] = resultArray($product);
        }
        echo json_encode($result , JSON_UNESCAPED_UNICODE);
    }

    public function getProductByKey($param) {
        $key = '';
        if (isset($param[0])) {
            $key = $param[0];
        }
        $result = array();
        $products = Product::model()->findAllBySql("SELECT * FROM product WHERE id LIKE '%$key%' OR name LIKE '%$key%'");
        foreach ($products as $product) {
            $result[] = resultArray($product);
        }
        echo json_encode($result , JSON_UNESCAPED_UNICODE);
    }

    public function getTotalPage() {
        $count = Product::model()->getCount();
        $result = array('count' => $count);
        echo json_encode($result , JSON_UNESCAPED_UNICODE);
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

function resultArray($product) {
    $salePrice = $product->price - ($product->price * $product->sale_off / 100);
    return array('id' => intval($product->id), 'name' => $product->name, 'price' => intval($product->price), 'img' => $product->image, 'salePrice' => intval($salePrice), 'description' => $product->description, 'view' => $product->view, 'sale_off' => $product->sale_off, 'sold' => $product->sold);
}