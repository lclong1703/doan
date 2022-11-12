<?php
class Category extends controller{
    public $categoryModel;

    public function __construct(){
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function admin(){
        $this->view("admin", "master2", [
            "page"=> "category",
            "lhh" => $this->categoryModel->listAll()
        ]);
    }

    public function addCategory(){
        if(isset($_POST["btnAddCategory"])){
            $name = $_POST["name"];
            $this->categoryModel->addCategory($name);
            $this->href("Thêm danh mục thành công", "/LuCamLong_B1809478/admin/category");
        }

        $this->view("admin", "master2", [
            "page"=> "addCategory",
            "lhh" => $this->categoryModel->listAll()
        ]);
    }

    public function updateCategory($id){
        if(isset($_POST["btnUpdateCategory"])){
            $name = $_POST["name"];
            $this->categoryModel->updateCategory($id, $name);
            $this->href("Cập nhật danh mục thành công", "/LuCamLong_B1809478/admin/category");
        }

        $this->view("admin", "master2", [
            "page"=> "updateCategory",
            "lhh" => $this->categoryModel->getCategory($id),
        ]);
    }

    public function deleteCategory($id){
        $this->categoryModel->deleteCategory($id);
        $this->href("Xóa danh mục thành công", "/LuCamLong_B1809478/admin/category");
    }
}
?>
