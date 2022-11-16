<!-- show information -->
<div class="row mt-4">
    <div class="col-3">
        <h3>Thông tin cá nhân</h3>
    </div>
    <div class="col-9">
        <form action="/LuCamLong_B1809478/customer/info/updateInfo" method="post">
            <?php
            $arr = json_decode($data['info'], true);
            ?>
            <div class="mb-3">
                <label class="form-label">Họ và tên</label>
                <input type="text" class="form-control" disabled value="<?php echo $_SESSION['name']?>">               
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $arr[0]['email']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" readonly name="phone" value="<?php echo $arr[0]['phone']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" name="password" value="<?php echo $arr[0]['password']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="address" value="<?php echo $arr[0]['address']?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Cập nhật</button>
        </form>
    </div>
</div>
