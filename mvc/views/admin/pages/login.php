<!-- form login -->
<div class="d-flex  flex-column align-items-center">
    <div class="row" style="width: 400px">
    <h1 class="mt-3 text-center">Đăng nhập</h1>
    <p class="text-center">Vui lòng đăng nhập để tiếp tục</p>
    <form action="/LuCamLong_B1809478/admin/Login/loginAdmin" method="POST">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Nhập email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input class="form-control flex-grow-1" type="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <button class="btn btn-primary" type="submit" name="btnAdminLogin">Đăng nhập</button>
    </form>
    </div>
</div>
