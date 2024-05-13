<?php
  session_start();
  ob_start();
  // CHECK COOKIE
  if (isset($_COOKIE['is_login'])) {
    $_SESSION['is_login'] = $_COOKIE['is_login'];
    $_SESSION['user_login'] = $_COOKIE['user_login'];
  }
  # kiểm tra nếu người dùng chưa login mà cố tính vào tài nguyên sẽ chặn truy cập
  if (!isset($_SESSION['is_login'])) {
    redirect_to('?page=login');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <a id="logo">UNITOP</a>
            <div id="user_login">
                <p>Xin chào <strong><?php if (is_login()) {
                    echo user_info('fullname') . " - " . user_info('username');
                } else {
                    echo "Khách";
                } ?></strong> (<a href="?page=logout">Thoát</a>)
            </div>
            <ul class="main-menu">
                <li><a href="?page=home">Trang chủ</a></li>
                <li><a href="?page=about">Giới thiệu</a></li>
                <li><a href="?page=contact">Liên hệ</a></li>
                <li><a href="?page=news">Tin tức</a></li>
                <li><a href="?page=product">Sản phẩm</a></li>
                <li><a href="?page=login">Đăng nhập</a></li>
            </ul>
        </div>