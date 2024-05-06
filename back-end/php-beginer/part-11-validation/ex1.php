<?php
  require 'lib/validation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập</title>
</head>
<body>
    <style>
        label {
            display: block;
        }

        .error {
            color: red;
        }


    </style>
    <?php
      // http://localhost/unitop.vn/back-end/php-beginer/part-11-validation/ex1.php
      if (isset($_POST['btn_reg'])) {
          $error = array();
        // fullname
        if (is_fullname($_POST['fullname'])) {
          $fullname= $_POST['fullname'];
          if (strlen($fullname) <= 1) {
            $error['fullname'] = 'Tên phải lớn hơn 1 ký tự';
          }
        } else {
            $error['fullname'] = 'Vui lòng nhập đầy đủ họ và tên';
        }
        //username
        if (!empty($_POST['username'])) {
            if(is_username($_POST['username'])) {
                $username= $_POST['username'];
            } else {
                $error['username'] = 'Vui lòng nhập tên đăng nhập đúng định dạng';
            }
        } else {
            $error['username'] = 'Không được để trống tên đăng nhập';
        }

        //password
        if (!empty($_POST['password'])) {
            if(is_password($_POST['password'])) {
                $password= $_POST['password'];
            } else {
                $error['password'] = 'Vui lòng nhập mật khẩu đúng định dạng';
            }
        } else {
            $error['password'] = 'Không được để trống mật khẩu';
        }

        //phone
        if (!empty($_POST['phone'])) {
            if(is_phone_number($_POST['phone'])) {
                $phone= $_POST['phone'];
            } else {
                $error['phone'] = 'Vui lòng nhập số điện thoại đúng định dạng';
            }
        } else {
            $error['phone'] = 'Không được để trống số điện thoại';
        }

      }
    ?>
    <form action="" method="post">
        <label for="fullname">Họ và tên</label>
        <input type="text" name="fullname" id="fullname" value="<?php echo set_value('fullname'); ?>">
        <?php echo form_error('fullname'); ?>
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>">
        <?php echo form_error('username'); ?>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password">
        <?php echo form_error('password'); ?>
        <label for="phone">Số điện thoại</label>
        <input type="tel" name="phone" id="phone" value="<?php echo set_value('phone'); ?>">
        <?php echo form_error('phone'); ?><br><br>
        <input type="submit" name="btn_reg" value="Đăng ký">
    </form>
</body>
</html>