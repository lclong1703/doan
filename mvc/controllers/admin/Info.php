<?php
class Info extends controller{
    public $userModel;

    public function __construct(){
        $this->userModel = $this->model("UserModel");
    }

    public function admin(){
        $name = $_SESSION['admin'];
        $this->view("admin", "master2", [
            "page" => "info",
            "info" => $this->userModel->infoAdmin($name)
        ]);
    }

    public function updateInfo(){
        if(isset($_POST['btnUpdateInfo'])){
            $name = $_POST['name'];
            $address  = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            $this->userModel->updateInfoAdmin($name, $address, $phone, $email);
            $this->href("Cập nhật thông tin thành công", "LuCamLong_B1809478/admin/info");
        }

        $this->view('admin', "master2", [
            "page"=>"info",
            "info"=> $this->userModel->infoAdmin( $_SESSION['admin'])
        ]);
    }
}
?>
