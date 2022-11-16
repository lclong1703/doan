<!-- sidebar -->
<h2>Danh mục</h2>
<ul class="list-group">
  <li class="list-group-item" aria-current="true" style="background-color: #0d6efd94;">
    <a href="/LuCamLong_B1809478/">Tất cả</a>
  </li>
  <?php 
  for ($i = 0; $i < count($arr); $i++) {
  ?>
    <li class="list-group-item">
      <a href="/LuCamLong_B1809478/customer/home/category/<?php echo $arr[$i]['id']?>"><?php echo $arr[$i]['name']; ?></a>
    </li>
  <?php
  }
  ?>
</ul>
