<?php
class Logout extends controller{
    public $userModel;
    public function __construct(){
        $this->userModel = $this->model("UserModel");
    }

    public function logoutAdmin(){
        unset($_SESSION['admin']);
        $this->href("Đăng xuất thành công", "/LuCamLong_B1809478/admin/login");
    }
}
?>
