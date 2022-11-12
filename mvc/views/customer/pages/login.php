<div class="form">
    <h2 class="header-form">Đăng nhập</h2>
    <form action="/LuCamLong_B1809478/customer/Login/loginCustomer" method="POST">
        <div class="mb-3 form-group">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
        </div>
        <div class="mb-3 form-group">
            <label class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập password" required>
        </div>
        <button type="submit" name="btnLogin" class="btn btn-primary">Đăng nhập</button>
    </form>

    <?php
    if (isset($data['result'])) {
        if (($data['result'] == '')) { ?>
            <h3 class="mt-2 text-danger">Đăng nhập thất bại</h3>
    <?php
        }
    }
    ?>
</div>