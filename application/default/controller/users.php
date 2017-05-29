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
                        'gender' => $model->gender,
                        'ward' => $model->ward,
                        'district' => $model->district,
                        'province' => $model->province );
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


    public function getOrder()
    {
        if(HTP_Request::post('user_id'))
        {
            $user_id = intval(HTP_Request::post('user_id'));
            $result = array();
            $orders = Order::model()->findAllBySql('SELECT id, status, total FROM `order` WHERE user_id = :uid', array(':uid' => $user_id));
            $listProductName = array();
            foreach ($orders as $order)
            {
                $details = OrderDetail::model()->findAllBySql('select product_id from order_detail where order_id = :oid', array(':oid' => $order->id));
                foreach ($details as $detail)
                {
                    $products = Product::model()->findBySql('select name from product where id = :pid', array(':pid'=>$detail->product_id));
                    array_push($listProductName, $products->name);
                }
                $result [] = array('name' => $listProductName, 'total' => $order->total, 'status' => $order->status);
                $listProductName = array();
            }
            echo '<pre>'.json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT).'</pre>' ;
        }
        else
            $this->redirect(HTP::$baseUrl);
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
            if($user->validate())
            {
                $user->update('id = :id', array(':id'=>$user->id));

                $user->name = Helper::strip_tags_content($user->name);
                $user->address = Helper::strip_tags_content($user->address);
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

}