<?php
class Order extends controller{
    public $userModel;
    public $orderModel;

    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->orderModel = $this->model("OrderModel");
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function customer(){
        $name = $_SESSION['name'];
        $mskh = json_decode($this->userModel->getMSKH($name), true);
        $this->view("Customer","master2",[
            "page"=>"order",
            "order"=> $this->orderModel->getOrderByMSKH($mskh),
            "lhh"=>$this->categoryModel->listAll(),
        ]);
    }

    public function deleteOrder($id){
        $this->orderModel->deleteDetailOrder($id);
        $this->orderModel->deleteOrder($id);
        $this->href('Xóa đơn hàng thành công', '/LuCamLong_B1809478/customer/order');
    }
}
