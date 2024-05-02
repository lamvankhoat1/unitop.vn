<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 2</title>
</head>
<body>
    <?php
    // http://localhost\unitop.vn\back-end\php-beginer\part-9-library\ex2.php
    //   Xuất 1 mảng số nguyên chẵn từ mảng số nguyên cho trước 
    // array_filter()
    $list_number = array(2, 6,3, 7, 9, 11, 16, 31, 52, 68, 29);
    $list_odd = array_filter($list_number, 'odd_filter');
    echo "<pre>";
    print_r($list_odd);
    echo "</pre>";

    function odd_filter($number) {
      return $number%2 == 0;
    }
    ?>
</body>
</html>