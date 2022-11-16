<!-- nav -->
<?php
if (isset($data['result']) && $data['result'] != '') {
    $_SESSION['admin'] = $data['result'];
}
?>
<div class="mt-3 d-flex justify-content-end">
    <div class="dropdown">
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            if (isset($_SESSION['admin'])) {
                echo $_SESSION['admin'];
            } else {
                header('Location: /LuCamLong_B1809478/admin/login');
            } ?>
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="/LuCamLong_B1809478/admin/info">Tài khoản</a></li>
            <li><a class="dropdown-item" href="/LuCamLong_B1809478/admin/logout/logoutAdmin">Đăng xuất</a></li>          
        </ul>
    </div>

</div>
