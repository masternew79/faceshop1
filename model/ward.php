<?php
class Ward extends HTP_Model{

    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('ward');
    }

    public function maps(){
        return array(
            'wardid' => array('wardid'),// , 'label' => 'Id', 'match' => true, 'operator' => 'AND'
            'name' => array('name')
        );
    }
}