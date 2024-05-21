<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<?php
  $fullname = "Khách";

  if (isset($_SESSION['form'])) {
    $fullname = $_SESSION['form']['fullname'];
  }
?>
<body>
    <div id="wrapper">
        <div id="header">
            <a id="logo">UNITOP</a>
            <div id="user_login">
                <p>Xin chào <b><?php echo $fullname; ?></b></strong> (<a href="?mod=users&controller=logout">Thoát</a>)
            </div>
            <ul class="main-menu">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Tin tức</a></li>
                <li><a href="#">Sản phẩm</a></li>
                <li><a href="?mod=users&controller=index&action=login">Đăng nhập</a></li>
            </ul>
        </div>