<?php
class Admin_Controller_Category extends Admin_Controller_Base{

    public function init(){
        //$this->allowAccessAction = array('login');
        parent::init();
    }

    public function index()
    {
        if(HTP_Request::post('menu'))
        {
            $category = Category::model()->findAll();
            $result = array();
            foreach ($category as $cat) {
                $result[] = array('id' => $cat->id, 'name' => $cat->name);
            }
            echo json_encode($result , JSON_UNESCAPED_UNICODE);
        }
        else
            $this->redirect(HTP::$baseUrl);

    }
}