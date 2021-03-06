<?php
header('Content-Type', 'application/json');
class Default_Controller_Index extends Default_Controller_Base{
    public function index(){
        $this->view->category = Category::model()->findAllBySql("SELECT * FROM category");
        $this->view->render('index');
    }

    public function category($param) {
        if (isset($param[0])) {
            $cateId = $param[0];
        }
        $this->view->delay = 0.2;
        $this->view->category = Category::model()->findAllBySql("SELECT * FROM category");
        $this->view->trademarks = Trademark::model()->findAllBySql("SELECT * FROM trademark WHERE cate_id = $cateId");
        $this->view->render('category');
    }

    public function product($param) {
        $id = 1;
        if (isset($param[0])) {
            $id = $param[0];
        }
        $this->view->category = Category::model()->findAllBySql("SELECT * FROM category");
        $this->view->product = Product::model()->findAllBySql("SELECT * FROM product where id = $id");
        $this->view->render('product');
    }

    public function checkout()
    {
        $this->view->category = Category::model()->findAllBySql("SELECT * FROM category");
        $this->view->render('checkout');
    }

    public function userInfo() {
        $this->view->category = Category::model()->findAllBySql("SELECT * FROM category");
        $this->view->render('userInfo');
    }

    public function userBill() {
        $this->view->category = Category::model()->findAllBySql("SELECT * FROM category");
        $this->view->render('userBill');
    }

    public function bill() {

        $this->view->render('bill');
    }

    public function checkEmailValid() {
        if(HTP_Request::post('email'))
        {
            $user = User::model()->find('email = :email', array(':email' => HTP_Request::post('email')));
            if($user != false && $user->id != ''){
                echo true;
            }
            echo false;
        }
        $this->redirect(HTP::$baseUrl);
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
                    $result = array('code' => 1, 'message' => 'Đăng nhập thành công', 'name' => $user->name, 'email' => $user->email, 'address' => $user->address, 'mobile' => $user->mobile, 'dob' => $user->dob, 'gender' => $user->gender, );
                    echo json_encode($result);
                }else{
                    $result = array('code' => 2, 'message' => $user->errorLogin);
                    echo json_encode($result , JSON_UNESCAPED_UNICODE);
                }
            }
            else{
                $result = array('code' => 3, 'message' => $user->getErrorLogin());
                echo json_encode($result , JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function search($param)
    {
        if(isset($param[0]))
            $page = intVal($param[0]) == 0 ? 1 : intVal($param[0]);
        else
            $page = 1;

        $sodong = HTP::$config['recordPerPage'];
        $x = ($page - 1) * $sodong;
        if(HTP_Request::get('search'))
        {
            $key = HTP_Request::get('search');
            $this->view->category = Category::model()->findAllBySql("SELECT * FROM category");
            $product = Product::model()->findAllBySql("select * from product where name LIKE N'$key%' limit ".$x.", ".$sodong);
            $this->view->products = $product;
            $this->view->key = $key;
            $this->view->page = $page;
            $this->view->sodong = $sodong;
            $this->view->totalPage = Product::model()->getCount('*', "name like N'$key%'");
            $this->view->render('search');
        }
        else
            $this->redirect(HTP::$baseUrl);
    }

    public function logout() {
        HTP_Session::delete('ID');
        $result = array('message' => 'Đăng xuât thành công');
        echo json_encode($result , JSON_UNESCAPED_UNICODE);
        $this->redirect(HTP::$baseUrl);
    }
}