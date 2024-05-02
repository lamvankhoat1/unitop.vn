<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy dữ liệu mật khẩu</title>
</head>

<body>
    <?php
    // http://localhost\unitop.vn\back-end\php-beginer\part-10-form\10.5-password.php
      if (isset($_POST['btn_login'])) {
        if (empty($_POST['password'])) {
            echo "Không được để trống mật khẩu";
        } else {
            echo "Mật khẩu: {$_POST['password']}";
        }
      };
    ?>
    <form action="" method="POST">
        <label for="username">Tên đăng nhập</label><br />
        <input type="text" name="username" id="username" /><br />
        <label for="password">Mật khẩu</label><br />
        <input type="password" name="password" id="password" /><br />
        <input type="submit" name="btn_login" value="Login" />
    </form>
</body>

</html>