<?php
$arr = json_decode($data['info'], true);
?>
<h3>Thông tin tài khoản</h3>
<form action="/LuCamLong_B1809478/admin/info/updateInfo" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Họ và tên</label>
        <input type="text" class="form-control" name="name" value="<?php echo $arr[0]['name'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Chức vụ</label>
        <input type="text" class="form-control" name="role" value="<?php echo $arr[0]['role'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" name="address" value="<?php echo $arr[0]['address'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" name="phone" value="<?php echo $arr[0]['phone'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $arr[0]['email'] ?>" readonly>
    </div>

    <button type="submit" class="btn btn-primary" name="btnUpdateInfo">Cập nhật</button>
</form>
