<?php
class Login extends controller{
    public $userModel;
    public $productModel;
    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->productModel = $this->model("ProductModel");
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function admin(){
        $this->view("admin", "master1", []);
    }

    public function loginAdmin(){
        if(isset($_POST['btnAdminLogin'])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $kq = $this->userModel->accountAdminLogin($email, $password);
            $name = json_decode($kq,true);

            $soluongkh = $this->userModel->countCustomer();
            $soluongkh = json_decode($soluongkh,true);
            
            $soluonghh = $this->productModel->countProduct();
            $soluonghh = json_decode($soluonghh,true);

            $soluonglhh = $this->categoryModel->countCategory();
            $soluonglhh = json_decode($soluonglhh,true);

            $this->view("admin", "master2",[
                "page" => "dashboard",
                "result"=>$name,
                "slkh" => $soluongkh,
                "slhh" => $soluonghh,
                "sllhh" => $soluonglhh
            ]);
        }
    }
}
?>