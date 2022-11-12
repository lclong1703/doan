<h2>Danh mục</h2>
<a href="/LuCamLong_B1809478/admin/category/addCategory" class="mt-3 btn btn-primary">Thêm danh mục</a>
<table class="mt-3 table table-striped">
  <thead>
    <tr>
      <th>Tên danh mục</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $arr = json_decode($data['lhh'], true);
    for ($i = 0; $i < count($arr); $i++) {
    ?>
      <tr>
        <td>
          <?php echo $arr[$i]['name'] ?>
        </td>
        <td>
          <a clasS="mx-2" href="/LuCamLong_B1809478/admin/category/updateCategory/<?php echo $arr[$i]['id'] ?>">
            <i class="fas fa-solid fa-pen"></i>
          </a>
          <a href="/LuCamLong_B1809478/admin/category/deleteCategory/<?php echo $arr[$i]['id'] ?>">
            <i class="fas fa-trash-alt"></i>
          </a>
        </td>

      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
