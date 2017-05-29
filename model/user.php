<?php
class User extends HTP_Model{
    protected $errorLogin;
    protected $modelUser;

    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('user');
    }

    public function login(){
        if(isset($this->email) && isset($this->password)) {
            $model = $this->find('email = :email', array(':email' => $this->email));
            if($model && isset($model->email)){
                if($model->password == sha1($this->password)){
                    $this->modelUser = $model;
                    HTP_User::setId($model->id);
                    HTP_User::setInfo($model);
                    return true;
                }
                else{
                    $this->errorLogin = 'Mật khẩu không đúng';
                    return false;
                }
            }
            else{
                $this->errorLogin = 'Tài khoản không tồn tại!';
                return false;
            }
        }
        return false;
    }

    public function maps(){
        return array(
            'id' => array('id'),
            'email' => array('email'),
            'password' => array('password'),
            'name' => array('name'),
            'address' => array('address'),
            'mobile' => array('mobile'),
            'dob' => array('dob'),
            'gender' => array('gender')
        );
    }

    public function rules(){
        return array(
            array('email, password, name, mobile', 'required', 'on' => 'register'),
            array('email, password', 'required', 'on' => 'login'),
            array('email', 'email', 'allowEmpty' => false, 'on' => 'login')
        );
    }

    public function labels(){
        return array(
            'email' => 'Tên đăng nhập',
            'password' => 'Mật khẩu'
        );
    }

    public function beforeInsert() {
        $this->inserted = date('Y-m-d H:i:s');
        $this->inserter = HTP_User::getId();
        $this->updated = date('Y-m-d H:i:s');
        $this->updater = HTP_User::getId();
    }

    public function beforeUpdate() {
        $this->updated = date('Y-m-d H:i:s');
        $this->updater = HTP_User::getId();
    }

    public function getErrorLogin(){
        return $this->errorLogin;
    }
}