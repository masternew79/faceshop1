<?php
class Province extends HTP_Model{

    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('province');
    }

    public function maps(){
        return array(
            'provinceid' => array('provinceid'),// , 'label' => 'Id', 'match' => true, 'operator' => 'AND'
            'name' => array('name')
        );
    }
}