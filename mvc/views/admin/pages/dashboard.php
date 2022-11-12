<h2>Trang chủ</h2>
<div class="mt-3 d-flex stat-cards">
    <article class="stat-cards-item" style="border-left: 4px solid blue;">
        <div class="stat-cards-info">
            <div class="stat-cards-info__title" style="color: blue">
                Khách hàng
            </div>
            <div class="stat-cards-info__num">
                <?php echo $data['slkh'] ?>
            </div>
        </div>
    </article>

    <article class="ms-3 stat-cards-item" style="border-left: 4px solid green;">
        <div class="stat-cards-info">
            <div class="stat-cards-info__title" style="color: green">
                Sản phẩm
            </div>
            <div class="stat-cards-info__num">
                <?php echo $data['slhh'] ?>
            </div>
        </div>
    </article>

    <article class="ms-3 stat-cards-item" style="border-left: 4px solid yellow;">
        <div class="stat-cards-info">
            <div class="stat-cards-info__title" style="color: yellow">
               Danh mục
            </div>
            <div class="stat-cards-info__num">
                <?php echo $data['sllhh'] ?>
            </div>
        </div>
    </article>
</div>
