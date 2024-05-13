<?php get_header('product'); ?>
<?php
  $cat_id = "";
  if (isset($_GET['cat_id'])) {
    $cat_id = (int)$_GET['cat_id'];
  }
?>
<div id="main">
    Trang danh mục sản phẩm - Danh mục <?php echo $cat_id; ?>
</div>
<?php get_footer('product'); ?>