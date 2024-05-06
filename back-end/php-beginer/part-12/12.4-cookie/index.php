<?php
  session_start();
  if (isset($_SESSION['is_login'])) {
    echo "Chào mừng {$_SESSION['user_login']} đến trang chủ<br>";
    echo "<a href='logout.php'>Đăng xuất</a>";
  } else {
    header("Location: login.php");
  }
?>