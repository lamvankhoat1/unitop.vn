<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form đăng ký</title>
</head>
<body>
    <!-- 
        Họ và tên
        Tên đăng nhập
        Mật khẩu
        Email
        Số điện thoại
        Giới tính
     -->
     <?php
       // http://localhost/unitop.vn/back-end/php-beginer/part-10-form/ex2.php
       $error =array();
       if (isset($_POST['btn_reg'])) {
           #fullname
           if (!empty($_POST['fullname'])) {
               $fullname= $_POST['fullname'];
            } else {
            $error['fullname'] = 'Họ và tên không được để trống';
        }
        #username
        if (!empty($_POST['username'])) {
            $username= $_POST['username'];
          } else {
              $error['username'] = 'Tên người dùng không được để trống';
        }

        #password
        if (!empty($_POST['password'])) {
            $password= $_POST['password'];
          } else {
              $error['password'] = 'Mật khẩu không được để trống';
        }

        #email
        if (!empty($_POST['email'])) {
            $email= $_POST['email'];
          } else {
              $error['email'] = 'Email không được để trống';
        }

        #phone
        if (!empty($_POST['phone'])) {
            $phone= $_POST['phone'];
          } else {
              $error['phone'] = 'Phone không được để trống';
        }

        #gender
        if (!empty($_POST['gender'])) {
            $gender= $_POST['gender'];
          } else {
              $error['gender'] = 'Giới tính không được để trống';
        }


          #check error
          if (empty($error)) { 
            echo $fullname."<br>";
            echo $username."<br>";
            echo $password."<br>";
            echo $email."<br>";
            echo $phone."<br>";
            echo $gender."<br>";
          } else {
            echo "<pre>";
            print_r($error);
            echo "</pre>";
          }
       }
     ?>
     <style>
        label, input {
            display: block;
            margin-bottom: 5px;
        }

        input[type='radio'] {
            display: inline-block;
        }
     </style>
     <form action="" method="post">
        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone">
        <label for="gender" style="display: inline-block;">Giới tính:</label>
        <input type="radio" name="gender" id="male" value="male"><label for="male" style="display: inline-block;">Nam</label>
        <input type="radio" name="gender" id="female" value="female"><label for="female" style="display: inline-block;">Nữ</label>
        <input type="submit" value="Đăng ký" name="btn_reg">
     </form>
</body>
</html>