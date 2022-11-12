<?php
class Cart extends controller
{
    public $userModel;
    public $cartModel;
    public function __construct()
    {
        $this->userModel = $this->model("UserModel");
        $this->cartModel = $this->model("CartModel");
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function customer()
    {
        $this->view("customer", "master2", [
            "page" => "cart",
            "lhh" => $this->categoryModel->listAll(),
        ]);
    }

    public function addCart($id)
    {
        $arr = json_decode($this->cartModel->getProduct($id), true);

        $id = $arr[0]['id'];
        $name = $arr[0]['name'];
        $description = $arr[0]['description'];
        $quantity = $arr[0]['quantity'];
        $price = $arr[0]['price'];
        $image = $arr[0]['image'];

        if (!empty($_SESSION["cart"])) {
            $cart = $_SESSION['cart'];
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array(
                    'id' => $id,
                    'tenhinh' => $image,
                    'name' => $name,
                    'soluong' => (int)$cart[$id]['soluong'] + 1,
                    'gia' => $price
                );
            } else {
                $cart[$id] = array(
                    'id' => $id,
                    'tenhinh' => $image,
                    'name' => $name,
                    'soluong' => 1,
                    'gia' => $price
                );
            }
        } else {
            $cart[$id] = array(
                'id' => $id,
                'tenhinh' => $image,
                'name' => $name,
                'soluong' => 1,
                'gia' => $price
            );
        }
        $_SESSION['cart'] = $cart;

        $this->href('','/LuCamLong_B1809478/customer/cart');
    }

    public function deleteItemCart($id)
    {
        unset($_SESSION['cart'][$id]);
        $this->href('','/LuCamLong_B1809478/customer/cart');
    }


    public function updateItemCart()
    {
        foreach ($_SESSION['cart'] as $key => $value) {
            $quantityNew = $_POST['quantity' . $_SESSION['cart'][$key]['id']];

            $arr = json_decode($this->cartModel->getProduct($_SESSION['cart'][$key]['id']), true);
            $name = $arr[0]['name'];
            $quantity = $arr[0]['quantity'];


            if ($quantityNew <= $quantity) {
                $cart[$_SESSION['cart'][$key]['id']] = array(
                    'id' => $_SESSION['cart'][$key]['id'],
                    'tenhinh' => $_SESSION['cart'][$key]['tenhinh'],
                    'name' => $_SESSION['cart'][$key]['name'],
                    'soluong' => $quantityNew,
                    'gia' => $_SESSION['cart'][$key]['gia']
                );
            } else {
                $cart[$_SESSION['cart'][$key]['id']] = array(
                    'id' => $_SESSION['cart'][$key]['id'],
                    'tenhinh' => $_SESSION['cart'][$key]['tenhinh'],
                    'name' => $_SESSION['cart'][$key]['name'],
                    'soluong' => $_SESSION['cart'][$key]['soluong'],
                    'gia' => $_SESSION['cart'][$key]['gia']
                );
                echo "<script>alert('Sản phẩm " . $name . " không vượt quá " . $quantity . "');</script>";
                break;
            }
        }
        $_SESSION['cart'] = $cart;

        $this->href('','/LuCamLong_B1809478/customer/cart');
    }

    public function checkOut()
    {
        if (isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
            $mskh = json_decode($this->userModel->getMSKH($name), true);
            $msnv = 1;
            $order_date = date("Y-m-d");           
            $delivery_address = json_decode($this->userModel->getAddress($mskh), true);

            if (isset($_SESSION['cart']) || $_SESSION['cart'] != null) {
                $soDonDH = json_decode($this->cartModel->insertCheckOut($mskh, $msnv, $order_date, $delivery_address), true);
                foreach ($_SESSION['cart'] as $key => $value) {
                    $id = $_SESSION['cart'][$key]['id'];
                    $soLuong = $_SESSION['cart'][$key]['soluong'];
                    $price = $_SESSION['cart'][$key]['soluong'] * $_SESSION['cart'][$key]['gia'];
                    $this->cartModel->insertDetailCheckOut($soDonDH, $id, $soLuong, $price);
                }
                unset($_SESSION['cart']);
                $this->href('Đặt hàng thành công', '/LuCamLong_B1809478/customer/cart');
            }
        } else {
            $this->href('Vui lòng đăng nhập!', '/LuCamLong_B1809478/customer/login');
        }
    }

    public function action()
    {
        if (isset($_POST['btnUpdateCart'])) {
            $this->updateItemCart();
        } else if (isset($_POST['btnCheckOut'])) {
            $this->checkOut();
        }
    }
}
