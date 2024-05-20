<?php
  if (isset($_POST['btn_register'])) {
    $_SESSION['form_error'] = array();
    if (isset($_POST['btn_register'])) {
      validation("fullname");
      validation("email");
      validation("username");
      validation("password");
      show_array($_SESSION['form_error']);
      if(empty($_SESSION['form_error'])) {
        if(!user_exist('username', 'email')) {
          add_user('fullname', 'email', 'username', 'password');
        }
      }
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG KÝ</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
  
    <form action="" method="post" id="form-login">
        <h1>ĐĂNG KÝ</h1>
        <!-- fullname/email -->
        <input type="text" name="fullname" id="fullname" placeholder="Fullname"  value="<?php echo set_value('fullname'); ?>">
        <?php echo form_error('fullname'); ?>
        <input type="email" name="email" id="email" placeholder="Email"  value="<?php echo set_value('email'); ?>">
        <?php echo form_error('email'); ?>

        <input type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
        <?php echo form_error('username'); ?>

        <input type="password" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
        <?php echo form_error('password'); ?>

        <?php echo form_error('user_exist'); ?>
        <?php echo form_error('login'); ?>
        
        <input type="submit" value="ĐĂNG KÝ" name="btn_register">
        <a href="?mod=users&controller=login" id="lost-pass">Đăng nhập</a>
    </form>
</body>
</html>