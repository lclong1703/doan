<!-- show products -->
<h2>Sản phẩm</h2>
<a href="/LuCamLong_B1809478/admin/product/addProduct" class="mt-3 btn btn-primary">Thêm sản phẩm</a>
<table class="mt-3 table table-striped">
  <thead>
    <tr>
      <th>Tên sản phẩm</th>
      <th>Hình ảnh</th>
      <th>Mô tả</th>
      <th>Số lượng</th>
      <th>Đơn giá</th>
      <th>thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $arr = json_decode($data['hh'], true);
    for ($i = 0; $i < count($arr); $i++) {
    ?>
      <tr>
        <td>
          <?php echo $arr[$i]['name'] ?>
        </td>
        <td>
          <img src="/LuCamLong_B1809478/public/img/product/<?php echo $arr[$i]['image'] ?>" alt="" width="70px">
        </td>
        <td style="width: 300px">
          <?php echo $arr[$i]['description'] ?>
        </td>
        <td>
          <?php echo $arr[$i]['quantity'] ?>
        </td>
        <td>
          <?php echo number_format($arr[$i]['price'], 0, ',', '.') ?> VND
        </td>
        <td>
          <a clasS="mx-2" href="/LuCamLong_B1809478/admin/product/updateProduct/<?php echo $arr[$i]['id'] ?>">
            <i class="fas fa-solid fa-pen"></i>
          </a>
          <a href="/LuCamLong_B1809478/admin/product/deleteProduct/<?php echo $arr[$i]['id'] ?>">
            <i class="fas fa-trash-alt"></i>
          </a>
        </td>

      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
