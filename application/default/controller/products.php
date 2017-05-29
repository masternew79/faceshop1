<?php
class Default_Controller_Products extends Default_Controller_Base{

    public function index($param = null){
        $this->view->setLayout('main');
        $this->view->render('index');
    }


    public function get($param) {
    	if (isset($param[0])) {
	    	$product = Product::model()->find('id = :id', array(':id' => $param[0]));
            $salePrice = $product->price - ($product->price * $product->sale_off / 100);
    		$result = array('id' => $product->id, 'name' => $product->name, 'price' => intval($product->price), 'img' => $product->image, 'salePrice' => $salePrice);
    		echo json_encode($result , JSON_UNESCAPED_UNICODE);
    	}
        else
            $this->redirect(HTP::$baseUrl);
    }

    public function getPage($param) {
    	$where = '';
    	$order = '';
    	$sort = '';
        $start = 0;
        if(isset($param[0]))
        {
            if (isset($param[0])) {
                $where = "WHERE cate_id = " . $param[0];
            }
            if (isset($param[1])) {
                $order = "ORDER BY $param[1] ";
            }
            if (isset($param[2])) {
                $sort = $param[2];
            }
            if (isset($param[3])) {
                $start = ($param[3] -1) * 28;
            }
            $products = Product::model()->findAllBySql("SELECT * FROM product $where $order $sort LIMIT $start, 28");
            $result = array();
            foreach ($products as $product) {
                $salePrice = $product->price - ($product->price * $product->sale_off / 100);
                $result[] = array('id' => $product->id, 'name' => $product->name, 'price' => intval($product->price), 'img' => $product->image, 'description' => $product->description, 'view' => $product->view, 'sold' => $product->sold, 'sale_off' => $product->sale_off, 'creat_at' => $product->creat_at, 'salePrice' => $salePrice);
            }
            echo json_encode($result , JSON_UNESCAPED_UNICODE);
        }
        else
            $this->redirect(HTP::$baseUrl);

    }

    public function getTotalPage($param) {
        $where = '';
        if (isset($param[0])) {
            $where = "WHERE cate_id = $param[0]";
        }
        $products = Product::model()->findAllBySql("SELECT * FROM product $where");
        $result = array();
        $i = 0;
        foreach ($products as $product) {
            $i++;
        }
        $result = ['count' => $i];
        echo json_encode($result , JSON_UNESCAPED_UNICODE);
    } 
}