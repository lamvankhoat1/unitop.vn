<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểu mảng</title>
</head>
<body>
    <?php
      // ===============
      // KIỂU DỮ LIỆU MẢNG
      // ===============

      # Mảng 1 chiều
      $list_even = array(0, 2, 4, 6, 8, 10);
      echo "<pre>";
      print_r($list_even);
      echo "</pre>";
      # Mảng nhiều chiều
      $list_user = array(
        1 => array(
            'name' => 'Phan Văn Cương',
            'age' => 30
        ),
        2 => array(
            'name' => 'Nguyễn Văn Anh',
            'age' => 20
        )
      );
      echo "<pre>";
      print_r($list_user);
      echo "</pre>";
    ?>
</body>
</html>