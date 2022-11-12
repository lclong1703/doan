<h1 class="mt-5 mb-3 text-center">Đơn hàng</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr class="text-center text-primary" style="font-size: 18px;">
            <th>Tên sản phẩm</th>
            <th>Giá tiền</th>
            <th>Số lượng</th>
            <th>Ngày đặt hàng</th>
            <th>Ngày giao hàng</th>
            <th>Trạng thái</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $arr = json_decode($data['order'], true);
        for ($i = 0; $i < count($arr); $i++) {
        ?>
            <tr>
                <td>

                    <?php echo $arr[$i]['name']; ?>

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
                    <?php echo $arr[$i]['quantity'] ?>
                </td>
                <td>
                    <?php echo $arr[$i]['order_date'] ?>
                </td>
                <td>
                    <?php echo $arr[$i]['delivery_date'] ?>
                </td>
                <td id="status">
                    <?php echo $arr[$i]['status'] ?>                    
                </td>
                <td id="delete">
                    <a href="/LuCamLong_B1809478/customer/order/deleteOrder/<?php echo $arr[$i]['id']?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    const arrStatus = document.querySelectorAll('#status');
    const arrDelete = document.querySelectorAll('#delete');
    length = arrStatus.length;
    for(let i = 0; i < length; i++) {
        if(arrStatus[i].innerText == 'Đã giao'){
            arrDelete[i].innerText = 'Không thể xóa đơn';
        }
    }
</script>
