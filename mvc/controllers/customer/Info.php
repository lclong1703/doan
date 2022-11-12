<?php
class Info extends controller{
    public $userModel;

    public function __construct(){
        $this->userModel = $this->model('UserModel');
        $this->categoryModel = $this->model('categoryModel');
    }

    public function customer(){
        $name = $_SESSION['name'];
        if(!$name) header('Location: /LuCamLong_B1809478');
        $this->view('customer', "master2", [
            "page"=>"info",
            "info"=> $this->userModel->infoCustomer($name),
            "lhh"=>$this->categoryModel->listAll()
        ]);
    }

    public function updateInfo(){
        if(isset($_POST['update'])){
            $name = $_SESSION['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $this->userModel-> updateInfoCustomer($name, $email, $phone, $address, $password); 
        }

        $this->view('customer', "master2", [
            "page"=>"info",
            "info"=> $this->userModel->infoCustomer($name)
        ]);
    }
}
