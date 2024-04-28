<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật giá trị</title>
</head>
<body>
    <?php
    // http://localhost/unitop.vn\back-end\php-beginer\part-7-array\7.5-update.php
      $info = array(
        'id' => 1,
        'fullname' => 'Phan Văn Cường',
        'email' => 'phancuong.qt@gmail.com'
    );
    echo "<pre>";
    print_r($info);
    echo "</pre>";
    // cập nhật lại fullname
    $info['fullname'] = 'Phan Văn Cương';
    echo "<pre>";
    print_r($info);
    echo "</pre>";
    ?>
</body>
</html>