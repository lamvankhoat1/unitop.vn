<?php
session_start();
ob_start();
  unset($_SESSION['user_login']);
  unset($_SESSION['is_login']);
  setcookie("is_login", "true", time() - 3600, '/');
  setcookie("user_login", $username, time() - 3600, '/');
  redirect_to("?page=login")
?>