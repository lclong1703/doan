<!-- show products -->
<h3>Sản phẩm mới nhất</h3>
<div class="row">
        <?php
        $arr = json_decode($data['hh'], true);
        for ($i = 0; $i < count($arr); $i++) {
        ?>
                <div class="col-6 col-sm-3 product-item bg-light rounded" style="border: 2px solid #a9dfef">
                        <a href="/LuCamLong_B1809478/customer/detail/detailProduct/<?php echo $arr[$i]['id'] ?>">
                                <img src="/LuCamLong_B1809478/public/img/product/<?php echo $arr[$i]['image'] ?>" alt="" width="170px" height="170px" class="product-img">
                                <h5 class="product-name"><?php echo $arr[$i]['name'] ?></h5>
                                <strong class="product-price"><?php echo number_format($arr[$i]['price'], 0, ",", ".") ?> VND</strong>
                        </a>
                </div>
        <?php
        }
        ?>

</div>
