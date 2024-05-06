<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghi nhận dữ liệu khi đã submit</title>
</head>
<body>
    <style>
        .error {
            color: red;
        }
    </style>
    <?php
    // http://localhost/unitop.vn/back-end/php-beginer/part-11-validation/11.5-reuse-data.php
      if (isset($_POST['btn_login'])) {
        if (!empty($_POST['username'])) {
          $username= $_POST['username'];
        } else {
            $error['username'] = 'Không được để trống tên đăng nhập';
        }

        if (!empty($_POST['password'])) {
            $password= $_POST['password'];
        } else {
            $error['password'] = 'Không được để trống mật khẩu';
        }
        
        if (empty($error)) {
            echo "username: {$username}<br>";
            echo "password: {$password}";
        }
      }
    ?>
    <form action="" method="post">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" value="<?php if (!empty($username)) {
          echo $username;
        } ?>">
        <p class="error"><?php if (!empty($error['username'])) {
            echo $error['username'];
        } ?></p>
        <label for="password">Pasword: </label>
        <input type="password" name="password" id="password">
        <p class="error"><?php if (!empty($error['password'])) {
            echo $error['password'];
        } ?></p>
        <input type="submit" value="Login" name="btn_login">
    </form>
</body>
</html>