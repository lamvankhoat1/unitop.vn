<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tên đăng nhập + Mật khẩu</title>
</head>

<body>
    <!-- 
        # form:
            username
            password
            button
     -->
    <?php
        // http://localhost/unitop.vn/back-end/php-beginer/part-10-form/ex1.php
        $error = array();
        if (isset($_POST['btn_login'])) {
          #username
          if (!empty($_POST['username'])) {
            $username= $_POST['username'];
            echo $username;
          } else {
            $error['username'] = 'Tên đăng nhập không được để trống';
          }
          #password
          if (!empty($_POST['password'])) {
            $password= $_POST['password'];
            echo $password;
          } else {
            $error['password'] = 'Không được để trống mật khẩu';
          }

          echo "<pre>";
          print_r($error);
          echo "</pre>";
        }
     ?>
     <style>
        label, input {
            display: block;
            margin-bottom: 5px;
        }
     </style>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="text" name="password" id="password">
        <input type="submit" value="Đăng nhập" name="btn_login">
    </form>
</body>

</html>