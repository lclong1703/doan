<?php
class Register extends controller{
    public $categoryModel;
    public $userModel;
    public function __construct(){
        $this->categoryModel = $this->model("CategoryModel");
        $this->userModel = $this->model("UserModel");
    }

    public function customer(){
        $this->view("Customer", "master1",[
            "page"=>"register",
            "lhh"=>$this->categoryModel->ListAll()
        ]);
    }

    public function registerCustomer(){
        if(isset($_POST["btnRegister"])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $password = $_POST['password'];
   
            $kq = $this->userModel->insertNewUser($name, $email, $phone, $address, $password);
            $this->view("Customer", "master1",[
                "page"=>"register",
                "lhh"=>$this->categoryModel->ListAll(),
                "result"=>$kq
            ]);
        }
    }


}
?>