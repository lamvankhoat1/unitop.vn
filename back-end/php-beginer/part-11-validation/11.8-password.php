<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực password</title>
</head>
<body>
    <style>
        .error {
            color: red;
        }
    </style>
    <?php
     // http://localhost/unitop.vn/back-end/php-beginer/part-11-validation/11.8-password.php
      if (isset($_POST['btn_login'])) {
        // username
        if (!empty($_POST['username'])) {
          $username= $_POST['username'];
          if (!(6<= strlen($username) && strlen($username) <= 32)) {
            $error['username'] = 'Tên đăng nhập phải từ 6 đến 32 ký tự';
          } else {
            $pattern = "/^[A-Za-z0-9\._]{6,32}$/";
            if (!preg_match($pattern, $username, $matches)) {
                $error['username'] = 'Tên đăng nhập không đúng định dạng';
            }
          }
        } else {
            $error['username'] = 'Không được để trống tên đăng nhập';
        }

        // password

        if (!empty($_POST['password'])) {
            $password= $_POST['password'];
            if (!(6<= strlen($password) && strlen($password) <= 32)) {
                $error['password'] = 'Mật khẩu phải từ 6 đến 32 ký tự';
              } else {
                $pattern = "/^[A-Z]{1}([\w_\.!@#$%&*()]+){5,31}$/";
                if (!preg_match($pattern, $password, $matches)) {
                    $error['password'] = 'Mật khẩu không đúng định dạng';
                }
              }
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