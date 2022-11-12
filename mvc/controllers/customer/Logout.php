<?php
class Logout extends controller{
    public $categoryModel;
    public $userModel;
    
    public function __construct(){
        $this->categoryModel = $this->model("CategoryModel");
        $this->userModel = $this->model("UserModel");
    }

    public function logoutCustomer(){
        unset($_SESSION['name']);
        session_destroy();
        $this->view("Customer", "master1",[
            "page"=>"login",
            "lhh"=>$this->categoryModel->ListAll(),
        ]);
    }
}
?>
