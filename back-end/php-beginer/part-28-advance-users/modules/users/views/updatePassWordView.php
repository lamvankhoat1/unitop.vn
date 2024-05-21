<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT MẬT KHẨU</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <form action="" method="post" id="form-login">
        <h1>CẬP NHẬT MẬT KHẨU</h1>
        <input type="password" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
        <?php echo form_error('password'); ?>
        <?php echo form_error('login'); ?>
        <input type="submit" value="CẬP NHẬT MẬT KHẨU" name="btn_update">
    </form>
</body>
</html>