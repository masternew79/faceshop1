<?php
class District extends HTP_Model{

    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('district');
    }

    public function maps(){
        return array(
            'districtid' => array('districtid'),// , 'label' => 'Id', 'match' => true, 'operator' => 'AND'
            'name' => array('name')
        );
    }
}