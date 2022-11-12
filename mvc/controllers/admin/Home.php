<?php
class Home extends controller{
    public $userModel;
    public $productModel;
    public $categoryModel;

    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->productModel = $this->model("ProductModel");
        $this->categoryModel = $this->model("CategoryModel");
    }
    
    public function admin(){
        $soluongkh = $this->userModel->countCustomer();
        $soluongkh = json_decode($soluongkh,true);
        
        $soluonghh = $this->productModel->countProduct();
        $soluonghh = json_decode($soluonghh,true);

        $soluonglhh = $this->categoryModel->countCategory();
        $soluonglhh = json_decode($soluonglhh,true);

        $this->view("admin", "master2",[
            "page" => "dashboard",
            "slkh" => $soluongkh,
            "slhh" => $soluonghh,
            "sllhh" => $soluonglhh
        ]);
    }
}
?>