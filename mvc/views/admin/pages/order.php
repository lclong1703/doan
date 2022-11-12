<h2>Đơn hàng</h2>

<table class="mt-3 table table-striped">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá đặt hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Ngày giao hàng</th>
            <th>Địa chỉ</th>
            <th>Trạng thái giao hàng</th>
            <th>thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $arr = json_decode($data['dh'], true);
        for ($i = 0; $i < count($arr); $i++) {
        ?>
            <tr>
                <td>
                    <?php echo $arr[$i]['name'] ?>
                </td>
                <td>
                    <?php echo $arr[$i]['quantity'] ?>
                </td>
                <td>
                    <?php
                    $arrPrice = explode(",", $arr[$i]['price']);
                    foreach ($arrPrice as $price) {
                        echo number_format($price, 0, ",", ".") . " VND";
                        echo "<br/>";
                    }
                    ?>
                </td>
                <td>
                    <?php echo $arr[$i]['order_date'] ?>
                </td>
                <td>
                    <?php echo $arr[$i]['delivery_date'] ?>
                </td>
                <td>
                    <?php echo $arr[$i]['delivery_address']?>
                </td>
                <td>
                    <?php echo $arr[$i]['status']?>
                </td>
                <td>
                    <a clasS="mx-2" href="/LuCamLong_B1809478/admin/order/updateOrder/<?php echo $arr[$i]['id']?>">
                        <i class="fas fa-solid fa-pen"></i>
                    </a>
                    <a href="/LuCamLong_B1809478/admin/order/deleteOrder/<?php echo $arr[$i]['id'] ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
