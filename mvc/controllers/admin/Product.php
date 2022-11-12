<?php
class Product extends controller{
    public $userModel;
    public $productModel;
    public $categoryModel;

    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->productModel = $this->model("ProductModel");
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function admin(){
        $this->view("admin", "master2", [
            "page"=> "product",
            "hh"=> $this->productModel->listAll(),
            "lhh"=> $this->categoryModel->listAll()
        ]);
    }
    
    public function addProduct(){
        if(isset($_POST['btnAddProduct'])){
            $name = $_POST['name'];
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $id = $_POST['id'];

            $this->productModel->addProduct($name, $description, $quantity, $price, $image, $id);

            move_uploaded_file($image_tmp,  $_SERVER['DOCUMENT_ROOT'] .'/LuCamLong_B1809478/public/img/product/'.$image);

            $this->href("Thêm sản phẩm thành công", "/LuCamLong_B1809478/admin/product");
        }else{
            $this->view("admin", "master2", [
                "page"=> "addProduct",
                "lhh" => $this->categoryModel->listAll()
            ]);
        }
        
    }

    public function updateProduct($id){
        if(isset($_POST['btnUpdateProduct'])){
            $name = $_POST['name'];
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            if($image != ''){
                $arr = json_decode($this->productModel->getProduct($id), true);
                move_uploaded_file($image_tmp, $_SERVER['DOCUMENT_ROOT'] .'/LuCamLong_B1809478/public/img/product/'.$image);
                $this->productModel->updateProduct($id, $name, $description, $quantity, $price, $image, $category_id);

                unlink($_SERVER['DOCUMENT_ROOT'] .'/LuCamLong_B1809478/public/img/product/'.$arr[0]['image']);

                $this->href("Cập nhật thành công", "/LuCamLong_B1809478/admin/product/");
            }else{
                $this->productModel->updateProductNoImg($id, $name, $description, $quantity, $price, $category_id);
                $this->href("Cập nhật thành công", "/LuCamLong_B1809478/admin/product/");
            }
        }else{
            $this->view("admin", "master2", [
                "page"=> "updateProduct",
                "hh"=> $this->productModel->getProduct($id),
                "lhh" => $this->categoryModel->listAll()
            ]);
        }
    }

    public function deleteProduct($id){
        $arr = json_decode($this->productModel->getProduct($id), true);
        $image = $arr[0]['image'];
        unlink($_SERVER['DOCUMENT_ROOT'] .'/LuCamLong_B1809478/public/img/product/'. $image);
        $this->productModel->deleteProduct($id);
        $this->href("Xóa sản phẩm thành công", "/LuCamLong_B1809478/admin/product");
    }

}
