<?php
$arr = json_decode($data['lhh'], true);

$arrProduct = json_decode($data['hh'], true);
?>
<h2>Cập nhật sản phẩm</h2>
<form action="/LuCamLong_B1809478/admin/product/updateProduct/<?php echo $arrProduct[0]['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Tên hàng hóa</label>
        <input type="text" class="form-control" name="name" value="<?php echo $arrProduct[0]['name'] ?>">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Hình ảnh</label>
        <input class="form-control" type="file" name="image">
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" rows="5" name="description"><?php echo $arrProduct[0]['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Số lượng hàng</label>
        <input type="number" class="form-control" name="quantity" value="<?php echo $arrProduct[0]['quantity'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Đơn giá</label>
        <input type="text" class="form-control" name="price" value="<?php echo $arrProduct[0]['price'] ?>">
    </div>

    <div class="mb-3">
        <select class="form-select" name="category_id">
            <option selected>Chọn mã loại hàng</option>
            <?php
            for ($i = 0; $i < count($arr); $i++) { 
                if ($arrProduct[0]['category_id'] == $arr[$i]['id']) {
            ?>
                    <option selected value="<?php echo $arr[$i]['id'] ?>">
                        <?php echo $arr[$i]['name'] ?>
                    </option>
                <?php
                } else {
                ?>
                    <option value="<?php echo $arr[$i]['id'] ?>">
                        <?php echo $arr[$i]['name'] ?>
                    </option>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="btnUpdateProduct">Cập nhật sản phẩm</button>
</form>