<?php
class Trademark extends HTP_Model{
     
    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('trademark');
    }
     
    public function maps(){
        return array(
            'id' => array('id'),
            'cate_id' => array('cate_id', 'match' => false),
            'name' => array('name')
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