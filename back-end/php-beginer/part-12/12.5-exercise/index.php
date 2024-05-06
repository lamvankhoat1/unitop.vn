<?php
  include './lib/page.php';
  get_header();
?>
<div id="content">
    <!-- http://localhost\unitop.vn\back-end\php-beginer\part-12-include\12.1\index.php -->
    CONTENT
    <?php
      require './lib/data.php';
      show_array(array(1,2,3));
      redirect_to("product.php");
    ?>
</div>
<?php
  get_footer();
?>