<?php
class Order extends controller{
    public $userModel;
    public $productModel;
    public $categoryModel;
    public $orderModel;
    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->productModel = $this->model("ProductModel");
        $this->categoryModel = $this->model("CategoryModel");
        $this->orderModel = $this->model("OrderModel");
    }

    public function admin(){
        $this->view("admin", "master2", [
            "page"=> "order",
            "dh"=> $this->orderModel->listAll()
        ]);
    }

    public function updateOrder($id){
        if(isset($_POST['btnUpdateOrder'])){

            $delivery_date = $_POST['delivery_date'];
            $status = $_POST['status'];
            $this->orderModel->updateOrder($id, $delivery_date, $status);
            $this->href("Cập nhật đơn hàng thành công", "/LuCamLong_B1809478/admin/order/");
        }else{
            $this->view("admin", "master2", [
                "page" => "updateOrder",
                "dh" => $this->orderModel->getOrderBySodondh($id)
            ]);
        }

    }

    public function deleteOrder($id){
        $this->orderModel->deleteDetailOrder($id);
        $this->orderModel->deleteOrder($id);
        $this->href("Xóa đơn hàng thành công", "/LuCamLong_B1809478/admin/order/");

    }
}
?>
