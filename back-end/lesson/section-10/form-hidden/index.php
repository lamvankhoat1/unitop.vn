<?php
    $user_info = array(
        'username' => 'admin',
        'password' => 123456,
    );

    $error = array();
    $is_valid_username = false;
    $is_valid_password = false;

    if (isset($_POST['btn_login'])) {
        if (!empty($_POST['username'])) {
            $is_valid_username = true;
        } else {
            $error['username'] = "Không được để trống tên đăng nhập";
        }

        if ($is_valid_username) {
            if (!empty($_POST['password'])) {
                $is_valid_password = true;
            } else {
                $error['password'] = "Không được để trống mật khẩu";
            }
        }

        if ($is_valid_password) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $is_true_username = false;
            $is_true_password = false;
            if ($username == $user_info['username']) {
                $is_true_username = true;
            } else {
                $error['username'] = "Sai tên người dùng";
            }

            if ($is_true_username) {
                if ($password == $user_info['password']) {
                    $is_true_password = true;
                }
            } else {
                $error['password'] = "Sai mật khẩu";
            }

            if ($is_true_password) {
                header("Location: {$_POST['redirect']}");
            }

        }
    }

    echo "<pre>";
    print_r($error);
    echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận dữ liệu từ password</title>
</head>

<body>
    <form action="" method="POST">
        <label for="username">Tên đăng nhập</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Mật khẩu</label><br>
        <input type="text" name="password" id="password"><br>
        <input type="hidden" name="redirect" value="cart.php">
        <input type="submit" name="btn_login" value="Login">
    </form>


</body>

</html>