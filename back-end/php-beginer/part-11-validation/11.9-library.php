<?php
  require 'lib/validation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo hàm xử lý</title>
</head>
<body>
    <style>
        .error {
            color: red;
        }
    </style>
    <?php
     // http://localhost/unitop.vn/back-end/php-beginer/part-11-validation/11.9-library.php
      if (isset($_POST['btn_login'])) {
        // username
        if (!empty($_POST['username'])) {
          $username= $_POST['username'];
          if (!(6<= strlen($username) && strlen($username) <= 32)) {
            $error['username'] = 'Tên đăng nhập phải từ 6 đến 32 ký tự';
          } else {
            if (!is_username($username)) {
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
                if (!is_password($password)) {
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
        <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>"><br>
        <?php echo form_error('username') ?>
        <label for="password">Pasword: </label>
        <input type="password" name="password" id="password"><br><?php echo form_error('password') ?>
        <input type="submit" value="Login" name="btn_login">
    </form>
</body>
</html>