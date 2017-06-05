<?php
class Default_Controller_Users extends Default_Controller_Base{

    public function index(){
        $this->view->setLayout('other');
    }
    public function getInfo($param) {
    	$model = HTP_User::getInfo();
    	$result = array('id'=> $model->id,
            'name'=> $model->name,
            'email'=> $model->email,
            'address'=> $model->address,
            'mobile'=> $model->mobile,
            'gender'=> $model->gender,
            'dob'=> $model->dob,
            'province'=> $model->province,
            'district'=> $model->district,
            'ward'=> $model->ward,
            'status'=>$model->status,);
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
                    $result = array(
                        'code' => 1, 
                        'message' => 'Đăng nhập thành công', 
                        'name' => $model->name, 
                        'email' => $model->email, 
                        'address' => $model->address, 
                        'mobile' => $model->mobile, 
                        'dob' => $model->dob, 
                        'gender' => $model->gender
                        );
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


    public function checkPassword()
    {
        if(HTP_Request::post('password') && HTP_Request::post('id'))
        {
            $id = intval(HTP_Request::post('id'));
            $password = HTP_Request::post('password');

            $model = User::model()->find('id = :id', array(':id' => $id));
            if($model && isset($model->password)){
                if($model->password == sha1($password)){
                    echo 'true';
                    return;
                }
                else{
                    echo 'false';
                    return;
                }
            }
            else{
                echo 'false';
                return;
            }
        }
        else
            $this->redirect(HTP::$baseUrl);
    }

    public function updateInfo()
    {
        if(HTP_Request::post('User')){
            //scenario : kịch bản để check rules khi validate model
            $user = new User();
            $user->load(HTP_Request::post('User'));
            if(isset($user->password))
                $user->password = sha1($user->password);


            if($user->validate())
            {
                $user->name = Helper::strip_tags_content($user->name);
                $user->address = Helper::strip_tags_content($user->address);


                $user->update('id = :id', array(':id'=>$user->id));
                echo json_encode($user, JSON_UNESCAPED_UNICODE);
            }
            else
            {
                echo 'false';
            }
        }
        else
            $this->redirect(HTP::$baseUrl);
    }


    public function resetPassword($param)
    {
//        echo  HTP_Request::post('email') . HTP_Request::post('captcha') . HTP_Session::get("security_code");
//        return;
        if($param[0])
        {
            $email = $param[0];
            
                if(Helper::checkMailExists($email))
                {
                    $md5_hash = md5(rand(0, 999));
                    $pass = substr($md5_hash, 0, 10);

                    $body = '<h1>FaceShop - Reset pasword</h1><br>';
                    $body .= '<p>Quý khách đã yêu cầu reset mật khẩu, hệ thống đã tự động đổi mật khẩu mới cho quý khách</p>';
                    $body .= '<p>Vui lòng sử dụng mật khẩu:  <b>' .$pass . '</b>  để đăng nhập hệ thống</p>';
                    $body .= '<p>Để đảm bảo an toàn, sau khi đăng nhập hệ thống, quý khách vui lòng cập nhật mật khẩu của mình.</p>';

                    $subject = 'FaceShop - Reset pasword';
                    $user = new User();
                    $user->password = sha1($pass);
                    $user->update('email = :email', array(':email' => $email));
                    if(Helper::sendmail($email, $body, $subject))
                    {
                        echo json_encode(array('code'=>'success', 'message'=>'Reset mật khẩu thành công. Vui lòng kiểm tra email để nhận mật khẩu mới.'), JSON_UNESCAPED_UNICODE);
                        return;
                    }
                    else
                    {
                        echo json_encode(array('code'=>'fail', 'message'=>'Reset mật khẩu thất bại, vui lòng thử lại'), JSON_UNESCAPED_UNICODE);
                        return;
                    }
                }
                else
                {
                    echo json_encode(array('code'=>'fail', 'message'=>'Email không tồn tại, vui lòng nhập email đúng!'), JSON_UNESCAPED_UNICODE);
                    return;
                }
        }
        else
            $this->redirect(HTP::$baseUrl);
    }

    public function register()
    {
        if(HTP_Request::get('User')){
            //scenario : kịch bản để check rules khi validate model
            $user = new User('register');
            $user->load(HTP_Request::get('User'));
            if($user->validate())
            {
                $user->name = Helper::strip_tags_content($user->name);
                $user->address = Helper::strip_tags_content($user->address);
                $user->password = sha1($user->password);
                try
                {
                    $id = $user->insert();
                    $user->id = $id;
                    echo json_encode($user, JSON_UNESCAPED_UNICODE);
                    return;
                }
                catch (Exception $ex)
                {
                    echo json_encode(array('code'=>2, 'message'=>'Đăng ký thất bại'), JSON_UNESCAPED_UNICODE);
                    return;
                }
            }
            else
            {
                echo json_encode(array('code'=>1, 'message'=>'Đăng ký thất bại'), JSON_UNESCAPED_UNICODE);
                return;
            }
        }
        else
            $this->redirect(HTP::$baseUrl);
    }
}