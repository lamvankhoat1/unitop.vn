<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
</head>
<body>
    <?php
        if (isset($_POST['btn_login'])) {
          if (!empty($_POST['username'])) {
            echo "Tên đăng nhập là: {$_POST['username']}";
          } else {
            echo "Không được để trống tên đăng nhập";
          }
          if (!empty($_POST['password'])) {
            echo "Tên đăng nhập là: {$_POST['password']}";
          } else {
            echo "Không được để trống mật khẩu";
          }
        }
    ?>
</body>
</html>