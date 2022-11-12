<?php
class Order extends controller{
    public $userModel;
    public $orderModel;

    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->orderModel = $this->model("OrderModel");
    }

    public function customer(){
        $name = $_SESSION['name'];
        $mskh = json_decode($this->userModel->getMSKH($name), true);
        $this->view("Customer","master2",[
            "page"=>"order",
            "order"=> $this->orderModel->getOrderByMSKH($mskh),
        ]);
    }

    public function deleteOrder($sodondh){
        $this->orderModel->deleteDetailOrder($sodondh);
        $this->orderModel->deleteOrder($sodondh);
        $this->href('Xóa đơn hàng thành công', '/LuCamLong_B1809478/customer/order');
    }
}
