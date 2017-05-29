<?php
class Admin extends HTP_Model{
    public $errorsLogin;
    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('admin');
    }

    public function verify(){
        if(isset($this->username) && isset($this->password)){
            $model = $this->find('username = :username', array(':username' => $this->username));
            if($model && isset($model->username)){
                if($model->password == sha1($this->password)){
                    HTP_User::setId($model->id);
                    HTP_User::setInfo($model);
                    // $this->updateByColumns('status = :status', 'id = :id', array(':status' => 1,':id' => $model->id));
                    return true;
                }
                else{
                    $this->errorsLogin = "Sai mật khẩu!";
                    return false;
                }
            }
            else{
                $this->errorsLogin = "Sai tên đăng nhập!";
                return false;
            }
        }
        return false;
    }

    public function maps(){
        return array(
            'id' => array('id'),
            'username' => array('username'),
            'password' => array('password'),
            'name' => array('roles'),
            'priviledge' => array('priviledge'),
            'status' => array('status')
        );
    }

    public function rules(){
        return array(
            // 'email' là data cần validate, 'email', 'allowEmpty' => true, 'on' => 'login' là loại validate
            array('username, password, email', 'required'),
            array('email', 'email'),
            array('email', 'email', 'allowEmpty' => true, 'on' => 'login')
        );
    }

    public function labels(){
        return array(
            'username' => 'Tên đăng nhập',
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
        return $this->errorsLogin;
    }
}