<?php
class Default_Controller_Users extends Default_Controller_Base{

    public function index(){
        $this->view->setLayout('other');
    }
    

    public function getInfo($param) {
    	$result = HTP_User::getInfo();
    	echo json_encode($result , JSON_UNESCAPED_UNICODE);
    }

    public function login($param) {
        $this->view->error = '';
        //use jquery ajax to login
        if(isset($param[0])){
            $user = new User('login');
            $data = array('email' => $param[0], 'password' => $param[1], 'capt' => $param[2]);
            $user->load($data);
            if($user->capt == HTP_Session::get("security_code")){
                if($user->login()){
                	$model = $user->modelUser;
                    $result = array('code' => 1, 'message' => 'Đăng nhập thành công', 'name' => $model->name, 'email' => $model->email, 'address' => $model->address, 'mobile' => $model->mobile, 'dob' => $model->dob, 'gender' => $model->gender, );
                    echo json_encode($result , JSON_UNESCAPED_UNICODE);
                }else{
                    $result = array('code' => 2, 'message' => $user->errorLogin);
                    echo json_encode($result , JSON_UNESCAPED_UNICODE);
                }
            }
            else{
                $result = array('code' => 3, 'message' => 'Mã bảo mật không chính xác');
                echo json_encode($result , JSON_UNESCAPED_UNICODE);
            }
        }
    }

}