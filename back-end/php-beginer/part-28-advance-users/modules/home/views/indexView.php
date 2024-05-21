<?php get_header(); ?>
<div id="main">
  Trang chủ
  <?php
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
  ?>
</div>
<?php get_footer(); ?>