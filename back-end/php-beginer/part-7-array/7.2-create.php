<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo mảng</title>
</head>
<body>
    <?php
      $error = array();
      $error['username'] = 'Bạn chưa nhập tên đăng nhập';

      echo "<pre>";
      print_r($error);
      echo "</pre>";

      $list_odd = array(1,3,5,7,9);
      echo "<pre>";
      print_r($list_odd);
      echo "</pre>";

      $user = array(
        'id' => 1,
        'fullname' => 'Phan Văn Cương',
        'age' => 30,
      );

      echo "<pre>";
      print_r($user);
      echo "</pre>";
      // http://locahost\unitop.vn\back-end\php-beginer\part-7-array\7.2-create.php
    ?>
</body>
</html>