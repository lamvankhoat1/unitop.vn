<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo máng lưu các số lẻ từ 3->150</title>
</head>
<body>
    <?php
    // http://localhost\unitop.vn\back-end\php-beginer\part-7-array\7.9.1-ex1.php
      $list_even = array();
      $a = 1;
      while ($a < 150) {
        $list_even[] = $a;
        $a += 2;
      }
    ?>
</body>
</html>