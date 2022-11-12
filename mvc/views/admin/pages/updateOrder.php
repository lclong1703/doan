<?php
$arr = json_decode($data['dh'], true);
$status = array("Chờ duyệt", "Đã duyệt", "Đã giao");
?>

<h3>Cập nhật đơn hàng</h3>
<form action="/LuCamLong_B1809478/admin/order/updateOrder/<?php echo $arr[0]['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Ngày giao hàng</label>
        <input type="date" class="form-control" name="delivery_date" min="<?php echo date("Y-m-d") ?>" value="<?php echo $arr[0]['delivery_date'] ?>">
    </div>

    <div class="mb-3">
        <select class="form-select" name="status">
            <option selected>Chọn trạng thái</option>
            <?php
            for ($i = 0; $i < count($status); $i++) {
                if (
                    $status[$i] ==
                    $arr[0]['status']
                ) {
            ?>
                    <option selected value="<?php echo $status[$i] ?>">
                        <?php echo $status[$i] ?>
                    </option>
                <?php
                } else {
                ?>
                    <option value="<?php echo  $status[$i] ?>">
                        <?php echo $status[$i] ?>
                    </option>
            <?php
                }
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="btnUpdateOrder">Cập nhật</button>
</form>

<script>
    const arrOptions = document.getElementsByTagName('option');
    for (let i = 0; i < arrOptions.length; i++) {
        arrOptions[i].style.display = 'none';
        if(arrOptions[i].selected == true){
            break;
        }
    }
</script>
