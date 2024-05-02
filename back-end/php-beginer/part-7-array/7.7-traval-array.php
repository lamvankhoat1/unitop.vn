<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyệt mảng</title>
</head>
<body>
    <?php
    // http://localhost\unitop.vn\back-end\php-beginer\part-7-array\7.7-traval-array.php
      $list_prime = array(2, 3, 5, 7);
      foreach ($list_prime as $key => $number) {
        echo "key: {$key} - number: {$number} <br>";
      };

      $list_users = array(
        1 => array(
            'id' => 1,
            'fullname' => 'Phan Văn Cương',
            'email' => 'phancuong.qt@gmail.com'
        ),
        2 => array(
            'id' => 2,
            'fullname' => 'Nguyễn Hoàng Anh',
            'email' => 'hoanganh@gmail.com')
        );
        foreach ($list_users as $user) {
            echo "id: {$user['id']} - ";
            echo "fullname: {$user['fullname']} - ";
            echo "email: {$user['email']} <br> ";
        }
    ?>
</body>
</html>