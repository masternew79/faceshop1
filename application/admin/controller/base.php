<?php

/**
 * @property int defaultRecordPerPage
 */
class Admin_Controller_Base extends HTP_Controller{
    public $allowAccessAction = array();
    public function __construct() {
        parent::__construct();
    }

    //page admin => mọi hoạt động phải login trước
    public function init(){
        HTP_Session::start();
        if($this->authentication()){
            $this->setGlobal();
        }
    }

    private function setGlobal(){
        $this->defaultRecordPerPage = Common::$recordPerPage;
    }

    //kiểm tra xem trong session hiện tại đã login chưa
    private function authentication(){
        //allowAccessAction : mọi action đều cần login, action login được bỏ qua để tránh loop khi redirect
        if(in_array(HTP::$action, $this->allowAccessAction)){
            return true;
        }
        if(HTP_User::logged()){
            if($this->authorization()){
                return true;
            }else{
                $this->redirect(HTP::$baseUrl . '/../');
            }
        }else{
            $this->redirect(HTP::$baseUrl . '/login');
            return false;
        }
    }

    private function authorization(){
        // nếu admin đã login rồi thì kiểm tra xem admin này có tồn tại không, có id không và có quyền quản trị không
        $admin = Admin::model()->find('id = :id', array(':id' => HTP_User::getId()));
        if($admin != false && $admin->id != ''){
            if($admin->priviledge == 1){
                return true;
            }
        }
        return false;
    }
}