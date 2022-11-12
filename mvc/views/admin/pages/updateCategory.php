<?php
$arrCategory = json_decode($data['lhh'], true);
?>
<h2>Cập nhật danh mục</h2>
<form action="/LuCamLong_B1809478/admin/category/updateCategory/<?php echo $arrCategory[0]['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="name" value="<?php echo $arrCategory[0]['name'] ?>">
    </div>

    <button type="submit" class="btn btn-primary" name="btnUpdateCategory">Cập nhật danh mục</button>
</form>
