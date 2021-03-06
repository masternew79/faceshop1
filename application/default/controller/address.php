<?php
class Default_Controller_Address extends Default_Controller_Base{
    public function index(){
        $this->redirect(HTP::$baseUrl);
    }

    public function getProvince()
    {
        $provinces = Province::model()->findAll();
        $result = array();
        foreach ($provinces as $province)
        {
            $result [] = array('id' => $province->provinceid, 'name' => $province->name);
        }
        echo json_encode($result , JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return;
    }

    public function getDistrict($param)
    {
        $province_id = $param[0];
       // $province_id = '01';
        $districts = District::model()->findAll('provinceid = :province_id', array(':province_id' => $province_id));
        $result = array();
        foreach ($districts as $district)
        {
            $result [] = array('id' => $district->districtid, 'name' => $district->name);
        }
        echo json_encode($result , JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return;
    }

    public function getWard($param)
    {
        $district_id = $param[0];
            //$district_id = '009';
        $wards = Ward::model()->findAll('districtid = :district_id', array(':district_id' => $district_id));
        $result = array();
        foreach ($wards as $ward)
        {
            $result [] = array('id' => $ward->wardid, 'name' => $ward->name);
        }
        echo json_encode($result , JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return;
    }

}