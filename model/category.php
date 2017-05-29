<?php
/**
 * Created by PhpStorm.
 * User: mouse
 * Date: 25/05/2017
 * Time: 9:46 AM
 */
class Category extends HTP_Model{
    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('category');
    }

    public function maps(){
        return array(
            'id' => array('id'),
            'name' => array('name')
        );
    }

    public function rules(){
        return array(
            array('name', 'required')
        );
    }

    public function labels(){
        return array(
            'id' => 'Mã Danh Mục',
            'name' => 'Tên Danh Mục'
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