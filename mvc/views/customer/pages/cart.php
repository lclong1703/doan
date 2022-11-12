<?php
if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
?>
    <p class="text-center">Không có sản phẩm nào trong giỏ hàng</p>
    <div class="text-center">
        <a href="/LuCamLong_B1809478" class="btn btn-primary">Tiếp tục mua hàng</a>
    </div>
<?php
} else {
?>
    <form action="/LuCamLong_B1809478/customer/cart/action" method="POST" class="row" style="margin-top: 30px;">

        <div class="col-9">
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $total += $_SESSION['cart'][$key]['gia'] * $_SESSION['cart'][$key]['soluong'];
            ?>

                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <img src="/LuCamLong_B1809478/public/img/product/<?php echo $_SESSION['cart'][$key]['tenhinh'] ?>" alt="" width="70px">
                    </div>

                    <div>
                        <a href="/LuCamLong_B1809478/customer/detail/detailProduct/<?php echo $_SESSION['cart'][$key]['id'] ?>" style="display: block;  width: 400px;">
                            <strong style="color: #428bca; font-weight: bold;"><?php echo $_SESSION['cart'][$key]['name'] ?></strong>
                        </a>
                    </div>

                    <div>
                        <input type="number" name="quantity<?php echo $key ?>" id="totalAmt<?php echo $key ?>" min="1" value="<?php echo $_SESSION['cart'][$key]['soluong'] ?>" style="width: 50px; text-align: center;">
                    </div>

                    <div>
                        <p><?php
                            echo number_format($_SESSION['cart'][$key]['gia'] * $_SESSION['cart'][$key]['soluong'], 0, ",", ".")
                            ?> VND</p>
                    </div>

                    <div>
                        <a href="/LuCamLong_B1809478/customer/cart/deleteitemcart/<?php echo $_SESSION['cart'][$key]['id'] ?>">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="col-3">
            <h3>Giỏ hàng</h3>
            <div class="d-flex justify-content-between">
                <h5>Tổng tiền:</h5>
                <span class="text-primary" style="font-size: 20px;"><?php echo number_format($total, 0, ",", ".") ?>VND</span>
            </div>
            <div class="d-grid gap-2 mt-2">
                <button type="submit" class="btn btn-primary" name="btnUpdateCart">Cập nhật</button>
                <button type="submit" class="btn btn-primary" name="btnCheckOut">Đặt hàng</button>
            </div>
        </div>
    </form>
<?php
}
?>
