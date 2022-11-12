<?php
$arr = json_decode($data['lhh'], true);
?>
<h3>Thêm sản phẩm</h3>
<form action="/LuCamLong_B1809478/admin/product/addProduct" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Tên hàng hóa</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Hình ảnh</label>
        <input class="form-control" type="file" name="image" id="image" >
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" rows="5" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Số lượng hàng</label>
        <input type="number" class="form-control" name="quantity" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Đơn giá</label>
        <input type="text" class="form-control" name="price" required>
    </div>

    <div class="mb-3">
        <select class="form-select" name="id" required>
            <option selected value="">Chọn mã loại hàng</option>
            <?php
            for ($i = 0; $i < count($arr); $i++) {
            ?>
                <option value="<?php echo $arr[$i]['id'] ?>">
                    <?php echo $arr[$i]['name'] ?>
                </option>
            <?php
            }           
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="btnAddProduct">Thêm sản phẩm</button>
</form>