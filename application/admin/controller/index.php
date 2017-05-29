<?php
class Admin_Controller_Index extends Admin_Controller_Base{

    public function init(){
        $this->allowAccessAction = array('login');
        parent::init();
    }

    public function index()
    {
        $this->view->setLayout('main');
        $this->view->render('index');
    }

    public function login(){
        $this->view->setLayout('login');
        $this->view->error = '';

        if(HTP_Request::post('Admin')){
            //scenario : kịch bản để check rules khi validate model
            $admin = new Admin('login');

            //load -> nạp các properties (username, password, captcha...)được gủi từ post vào model admin
            $admin->load(HTP_Request::post('Admin'));
            if($admin->captcha == HTP_Session::get('security_code')){
                if($admin->validate() && $admin->verify()){
                    $this->redirect(HTP::$baseUrl);
                }else{
                    $this->view->error = $admin->getErrorLogin();
                }
            }
            else{
                $this->view->error = 'Mã bảo mật không đúng!';
            }


        }
        $this->view->render('login');
    }

    public function logout(){
        if(HTP_User::logout()){

            $this->redirect(HTP::$baseUrl . '/login');
        }else{
            HTP_Session::destroy();
            $this->redirect(HTP::$baseUrl .'/../');
        }
    }
}