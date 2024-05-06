<?php
  require './inc/header.php';
?>
<div id="content">
    <!-- http://localhost\unitop.vn\back-end\php-beginer\part-12-include\12.1\index.php -->
    CONTENT
    <?php
      require './lib/data.php';
      show_array(array(1,2,3));
    ?>
</div>
<?php
  require './inc/footer.php';
?>