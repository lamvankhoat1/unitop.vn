<?php
    session_start();
    ob_start();
?>
<?php require 'lib/layout.php'; ?>
<?php require 'lib/url.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<body>
    <?php get_header() ?>
    <h1>Xin chào bạn, bạn đã đăng nhập thành công</h1>
    <a href="logout.php">Đăng xuất</a>
    <?php
        if ($_SESSION['is_login']  == false) {
           redirect_to("header-location.php");
        }
        echo $_COOKIE['is_login'];
    ?>
    <?php get_footer() ?>
</body>
</html>