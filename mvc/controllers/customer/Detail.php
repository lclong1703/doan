<?php
class Detail extends controller{
    public $productModel;
    public $categoryModel;
    public function __construct(){
        $this->productModel = $this->model("ProductModel");
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function detailProduct($id){
        $arr = json_decode($this->productModel->getProduct($id), true);

        $id =  $arr[0]['id'];
        $category_id = $arr[0]['category_id'];
        $this->view("Customer","master2",[
            "page"=>"detail",
            "product"=> $this->productModel->getProduct($id),
            "related"=> $this->productModel->relatedProducts($category_id, $id),
            "lhh"=> $this->categoryModel->listAll(),
        ]);
    }

}
?>