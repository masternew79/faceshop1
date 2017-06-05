<?php
class Admin_Controller_User extends Admin_Controller_Base{

    public function init(){
        $this->allowAccessAction = array('login');
        parent::init();
    }

    public function index()
    {
        $this->view->user = User::model()->findAll();
        $this->view->setLayout('main');
        $this->view->render('index');
    }

    public function delete($param)
    {
        if(isset($param[0]))
        {
            $id = intval($param[0]);
            $page = isset($param[1]) ? intval($param[1]) : 1;
            User::model()->delete('id = :id', array(':id'=>$id));
            $this->redirect(HTP::$baseUrl.'/user/'. $page);
        }
    }

    public function getUsers() {
        $user = User::model()->findAll();
        echo json_encode($user , JSON_UNESCAPED_UNICODE);
    }
}