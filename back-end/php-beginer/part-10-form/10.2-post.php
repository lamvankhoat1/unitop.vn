<?php
  // http://localhost\unitop.vn\back-end\php-beginer\part-10-form\index.php
  # check login by server variable
  # Lấy username, password 

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo "{$username} - {$password}";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương thức POST</title>
</head>

<body>
    <form action="" method="POST">
        Name: <input type="text" name='username'><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" name='btn_login' value='Login'>
    </form>
</body>

</html>