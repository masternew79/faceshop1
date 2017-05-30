<?php
/**
 * Created by PhpStorm.
 * User: mouse
 * Date: 23/05/2017
 * Time: 8:40 AM
 */
class Order extends HTP_Model{

    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('`order`');
    }

    public function maps(){
        return array(
            'id' => array('id'),
            'user_id' => array('user_id'),
            'name' => array('name'),
            'mobile' => array('mobile'),
            'email' => array('email'),
            'address' => array('address'),
            'create_date' => array('create_date'),
            'payment_type' => array('payment_type'),
            'delivery_type' => array('delivery_type'),
            'status' => array('status'),
            'hash' => array('hash')
        );
    }

    public function rules(){
        return array(
            array('name, address, email, mobile, user_id', 'required'),
            array('status', 'number', 'user_id', 'integerOnly' => true)
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