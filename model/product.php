<?php
class Product extends HTP_Model{
     
    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('product');
    }
     
    public function maps(){
        return array(
            'id' => array('id'),// , 'label' => 'Id', 'match' => true, 'operator' => 'AND'
            'cate_id' => array('cate_id', 'match' => false),
            'trademark_id' => array('trademark_id', 'match' => false),
            'name' => array('name'),
            'image' => array('image'),
            'price' => array('price'),
            'status' => array('status'),
            'description' => array('description', 'match' => false),
            'detail' => array('detail', 'match' => false),
            'views' => array('views'),
            'create_at' => array('create_at'),
            'sold' => array('sold'),
            'sale_off' => array('sale_off')
        );
    }
     
    public function rules(){
        return array(
            array('cate_id, trademark_id, name, price', 'required'),
            array('cate_id, trademark_id, price, status, sold, views, sale_off', 'number', 'integerOnly' => true),
            array('image', 'file', 'ext' => array('jpg', 'png', 'gif'), 'minWidth' => 500),
            array('image', 'file', 'ext' => array('jpg', 'png', 'gif'), 'minWidth' => 500, 'allowEmpty' => true, 'on' => 'update')
        );
    }
     
    public function beforeInsert() {
        $this->views = 0;
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