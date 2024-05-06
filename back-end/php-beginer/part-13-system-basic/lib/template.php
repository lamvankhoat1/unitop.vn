<?php
  function get_header() {
    $path = './inc/header.php';
    if (file_exists($path)) {
        require "{$path}";
    } else {
        echo "Trang này không tồn tại";
    }
  }

  function get_footer() {
    $path = './inc/footer.php';
    if (file_exists($path)) {
        require "{$path}";
    } else {
        echo "Trang này không tồn tại";
    }
  }  

  function get_404() {
    $path = './inc/404.php';
    if (file_exists($path)) {
        require "{$path}";
    } else {
        echo "Trang này không tồn tại";
    }
  }
?>