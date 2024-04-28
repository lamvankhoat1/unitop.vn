<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoá mảng</title>
</head>
<body>
    <?php
      $info = array(
        'id' => 1,
        'fullname' => 'Phan Văn Cường',
        'email' => 'phancuong.qt@gmail.com',
        'website' => 'unitop.vn'
    );
    unset($info['website']);
    echo "<pre>";
    print_r($info);
    echo "</pre>";
    // http://localhost\unitop.vn\back-end\php-beginer\part-7-array\7.5-delete-array.php
    ?>
</body>
</html>