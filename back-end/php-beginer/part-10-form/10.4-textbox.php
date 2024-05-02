<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy dữ liệu từ textbox</title>
</head>
<?php
// http://localhost/unitop.vn\back-end\php-beginer\part-10-form\textbox.php

if (isset($_POST['btn_login'])) {
    if (empty($_POST['username'])) {
        echo "Tên đăng nhập không được để trống";
    } else {
        echo "{$_POST['username']}";
    }
}
?>

<body>
    <form action="" method="POST">
        <label for="username">Tên đăng nhập</label><br />
        <input type="text" name="username" id="username" /><br />
        <label for="password">Mật khẩu</label><br />
        <input type="text" name="password" id="password" /><br />
        <input type="submit" name="btn_login" value="Login" />
    </form>
</body>

</html>