<?php
/**
 * Created by PhpStorm.
 * User: mouse
 * Date: 23/05/2017
 * Time: 8:50 AM
 */
class OrderDetails extends HTP_Model{

    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('order_detail');
    }

    public function maps(){
        return array(
            'order_id' => array('order_id'),
            'product_id' => array('product_id'),
            'price' => array('price'),
            'count' => array('count'),
            'total' => array('total')
        );
    }

    public function rules(){
        return array(
            array('order_id, product_id, count, total', 'required')
        );
    }

    public function beforeInsert() {
        $this->inserted = date('Y-m-d H:i:s');
        $this->inserter = HTP_User::getId();
        $this->updated = date('Y-m-d H:i:s');
        $this->updater = HTP_User::getId();
    }

    public function beforeUpdate() {
        $this->updated = date('Y-m-d H:i:s');
        $this->updater = HTP_User::getId();
    }
}