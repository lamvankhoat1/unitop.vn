<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tấp 1</title>
</head>
<body>
    <?php
    // http://localhost\unitop.vn\back-end\php-beginer\part-9-library\ex1.php
      $total_row = 43;
      $num_per_page = 5;
      $num_page = ceil($total_row/$num_per_page);
      echo "{$num_page}"; //9
    ?>
</body>
</html>