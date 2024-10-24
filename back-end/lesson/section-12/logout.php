<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng xuất</title>
</head>
<body>
    <?php
        unset($_SESSION['is_login']);
        setcookie('is_login', true, time() - 3600, "/");
        header("Location: index.php");
    ?>
</body>
</html>