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
        <?php echo form_error('username'); ?>
        <input type="password" name="password" id="password" placeholder="password" value="<?php echo set_value('password'); ?>">
        <?php echo form_error('password'); ?>
        <?php echo form_error('login'); ?>
        <input type="checkbox" name="remember_me" value="remember_me"/> Ghi nhớ đăng nhập
        <input type="submit" value="Đăng nhập" name="btn_login">
        <a href="?mod=users&controller=reset&action=reset" id="lost-pass">Quên mật khẩu</a> | <a href="?mod=users&controller=register&action=register">Đăng ký</a>
    </form>
</body>
</html>