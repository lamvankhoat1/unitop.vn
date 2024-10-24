<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<body>
    <h1>Xin chào bạn, bạn đã đăng nhập thành công</h1>
    <a href="logout.php">Đăng xuất</a>
    <?php
        if ($_SESSION['is_login']  == false) {
           header("Location: header-location.php");
        }
        echo $_COOKIE['is_login'];
    ?>
</body>
</html>