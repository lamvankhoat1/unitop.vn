<?php
  $list_product = array(
    '1' => array(
        'title' => 'Trend Following – Cách thức để kiếm được VẬN MAY LỚN và GIÀU CÓ trong các thị trường BÒ, GẤU và các sự kiện THIÊN NGA ĐEN',
        'price' => '599.000',
    ),
    '2' => array(
        'title' => 'Sổ kế hoạch planner 18 tháng 2023-2024 SDstationery DREAM CRAFTER 48 trang 16,5x20,5cm',
        'price' => '19.500',
    ),
    '3' => array(
        'title' => 'Cổ Tích Việt Nam Bằng Thơ (Ấn Bản Kỉ Niệm 60 Năm NXB Kim Đồng)',
        'price' => '117.950',
    ),
  )
?>
<?php
  require 'lib/template.php';
  get_header(); 
?>
<div id="main">
    <h1>Sản phẩm</h1>
    <?php
      foreach ($list_product as $product) {
        echo "<a href=''>{$product['title']}</a>";
        echo "<p>{$product['price']}đ</p>";
      }
    ?>
</div>
<?php get_footer(); ?>