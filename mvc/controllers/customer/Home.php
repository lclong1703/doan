<?php
class Home extends Controller{
    public $categoryModel;
    public $productModel;

    public function __construct(){
        $this->categoryModel = $this->model("CategoryModel");
        $this->productModel = $this->model("ProductModel");
    }
    public function customer(){
        $this->view("Customer","master1",[
            "page"=>"product",
            "lhh"=> $this->categoryModel->ListAll(),
            "hh"=> $this->productModel->ListAll()
        ]);
    }

    public function category($id){
        $this->view("customer","master1", [
            "page"=>"product",
            "lhh"=> $this->categoryModel->ListAll(),
            "hh" => $this->productModel->getProductByCategory($id)
        ]);
    }

    public function search(){
        if(isset($_POST['btnSearch'])){
            $searchName = $_POST['searchName'];

            $this->view("customer","master1", [
                "page"=>"product",
                "lhh"=> $this->categoryModel->ListAll(),
                "hh" => $this->productModel->getProductBySearch($searchName)
            ]);
        }

    }
}
?>