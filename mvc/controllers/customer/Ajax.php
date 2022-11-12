<?php
class Ajax extends controller{
    public $userModel;

    public function __construct(){
        $this->userModel = $this->model("UserModel");
    }

    public function checkEmailCustomer(){
        $email = $_POST['email'];
        if(json_decode($this->userModel->checkEmailCustomer($email), true)){
            echo "Email đã tồn tại!";
        }else{
            echo "";
        }
    }

    public function checkPhoneCustomer(){
        $phone = $_POST['phone'];
        if(json_decode($this->userModel->checkPhoneCustomer($phone), true)){
            echo "Số điện thoại đã tồn tại!";
        }else{
            echo "";
        }
    }
}
