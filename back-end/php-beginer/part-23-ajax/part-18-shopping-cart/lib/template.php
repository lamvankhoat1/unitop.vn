<?php
  // function get_header() {
  //   $path = './inc/header.php';
  //   if (file_exists($path)) {
  //       require "{$path}";
  //   } else {
  //       echo "Trang này không tồn tại";
  //   }
  // }

  function get_header($mod = "") {
    if (!empty($mod)) {
      $path = "./inc/header-{$mod}.php";
    } else {
      $path = './inc/header.php';
    }

    if (file_exists($path)) {
        require "{$path}";
    } else {
        echo $path;
        echo "Trang header này không tồn tại";
    }
  }

  function get_footer($mod = "") {
    if (!empty($mod)) {
      $path = "./inc/footer-{$mod}.php";
    } else {
      $path = './inc/footer.php';
    }

    if (file_exists($path)) {
        require "{$path}";
    } else {
        echo "Trang này không tồn tại";
    }
  } 
  
  function get_sidebar() {
    require './inc/sidebar.php';
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