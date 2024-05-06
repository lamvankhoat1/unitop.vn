<?php
  session_start();
  unset($_SESSION['is_login']);
  unset($_SESSION['user_login']);

  // logout
  setcookie('is_login', true, time()-3600, '/');
  setcookie('user_login', 'lamvankhoat1', time()-3600, '/');

  header("Location: index.php");
?>