<?php
  # CHUẨN HOÁ DỮ LIỆU
  $error = array();
  if (isset($_POST['btn_login'])) {
    # VALIDATION USERNAME
    if (!empty($_POST['username'])) {
      $username= $_POST['username'];
      if (!is_username($username)) {
        $error['username'] = 'Tên đăng nhập không đúng định dạng';
      }
    } else {
        $error['username'] = 'Không được để trống tên đăng nhập';
    }

    # VALIDATION PASSWORD
    if (!empty($_POST['password'])) {
        $password= $_POST['password'];
        if (!is_password($password)) {
            $error['password'] = 'Mật khẩu không đúng định dạng';
        }
      } else {
          $error['password'] = 'Không được để trống mật khẩu';
      }

    #LOGIN
    if (empty($error)) {
        if (check_login($username, $password)) {
            session_start();
            ob_start();
            $_SESSION['is_login'] = true;
            $_SESSION['user_login'] = $username;
            if (isset($_POST['remember_me'])) {
              setcookie("is_login", "true", time() + 3600, '/');
              setcookie("user_login", $username, time() + 3600, '/');
            }
            redirect_to("?page=home");
        };
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <form action="" method="post" id="form-login">
        <h1>ĐĂNG NHẬP</h1>
        <input type="text" name="username" id="username" placeholder="username" value="<?php echo set_value('username'); ?>">
        <?php echo show_error('username'); ?>
        <input type="password" name="password" id="password" placeholder="password" value="<?php echo set_value('password'); ?>">
        <?php echo show_error('password'); ?>
        <?php echo show_error('login'); ?>
        <input type="checkbox" name="remember_me" value="remember_me"/> Ghi nhớ đăng nhập
        <input type="submit" value="Đăng nhập" name="btn_login">
        <a href="#" id="lost-pass">Quên mật khẩu</a>
    </form>
</body>
</html>