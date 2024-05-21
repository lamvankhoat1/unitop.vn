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
        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
        <?php echo form_error('email'); ?>
        <?php echo form_error('login'); ?>
        <input type="submit" value="GỬI YÊU CẦU" name="btn_reset">
        <a href="?mod=users&controller=rest" id="lost-pass">Quên mật khẩu</a> | <a href="?mod=users&controller=register&action=register">Đăng ký</a>
    </form>
</body>
</html>