<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidden Field</title>
</head>

<body>
    <?php
      // http://localhost/unitop.vn\back-end\php-beginer\part-10-form\10.6-hidden-field.php
      if (isset($_POST['btn_login'])) {
        // info username and password
        $info = array(
            'username' => 'admin',
            'password' => 'admin!@#',
        );
        // check username
        // check password
        $error = array();
        if (!empty($_POST['username'])) {
          $username = $_POST['username'];
        } else {
            $error['username'] = 'Không được để trống tên đăng nhập';
        }

        if (!empty($_POST['password'])) {
          $password = $_POST['password'];
        } else {
            $error['password'] = 'Không được để trống mật khẩu';
        }

        // Kiểm tra login
        if (!empty($username) && !empty($password)) {
          if ($username == $info['username'] && $password == $info['password']) {
            // chuyển hướng đăng nhập
            $redirect_to = $_POST['redirect_to'];
            header("location: {$redirect_to}");
          } else {
            $error['login'] = 'Thông tin đăng nhập không chính xác';
          }
        }


        echo "<pre>";
        print_r($error);
        echo "</pre>";
      }
    ?>
    <form action="" method="POST">
        <label for="username">Tên đăng nhập</label><br />
        <input type="text" name="username" id="username" /><br />
        <label for="password">Mật khẩu</label><br />
        <input type="password" name="password" id="password" /><br />
        <input type="hidden" name="redirect_to" value="cart.php" /><br />
        <input type="submit" name="btn_login" value="Login" />
    </form>
</body>

</html>