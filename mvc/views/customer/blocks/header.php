<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
        <a class="navbar-brand" href="/LuCamLong_B1809478" style="margin-right: 0">
            <img src="/LuCamLong_B1809478/public/img/logo/logo2.png" alt="logo" width="150px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link navbar-link" aria-current="page" href="/LuCamLong_B1809478">Trang chủ</a>
                </li>

                <li class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Danh mục
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php
                        $arr = json_decode($data['lhh'], true);
                        for ($i = 0; $i < count($arr); $i++) {
                        ?>
                            <li><a class="dropdown-item" href="/LuCamLong_B1809478/customer/home/category/<?php echo $arr[$i]['id']?>"><?php echo $arr[$i]['name']; ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>

            </ul>
            <form action="/LuCamLong_B1809478/customer/home/search/" method="POST" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchName">
                <button class="btn btn-outline-success" type="submit" name="btnSearch">Search</button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/LuCamLong_B1809478/customer/cart">
                        <i class="fas fa-shopping-cart cart"></i>
                        <span class="position-absolute top-10 start-10 translate-middle badge rounded-pill bg-danger">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                echo count($_SESSION['cart']);
                            } else {
                                echo 0;
                            }
                            ?>
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </li>
                <?php
                if (isset($data['result']) && $data['result'] != "") {
                    $_SESSION['name'] = $data['result'];
                }

                if (isset($_SESSION['name'])) {
                ?>
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            echo $_SESSION['name'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/LuCamLong_B1809478/customer/info">Tài khoản của tôi</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/LuCamLong_B1809478/customer/order">Đơn hàng</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="/LuCamLong_B1809478/customer/logout/logoutCustomer">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/LuCamLong_B1809478/customer/register">Đăng ký</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/LuCamLong_B1809478/customer/login">Đăng nhập</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>