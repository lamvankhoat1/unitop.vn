<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truy xuất phần tử</title>
</head>
<body>
    <?php
    // http://localhost\unitop.vn\back-end\php-beginer\part-7-array\7.4-get-value.php
      $info = array(
        'id' => 1,
        'fullname' => 'Phan Văn Cương',
        'email' => 'phancuong.qt@gmail.com'
    );
    $info['phone'] = '0988859692';
    
    ?>
    <div>
        <p>ID: <strong><?php echo "{$info['id']}"; ?></strong></p>
        <p>Họ và tên: <strong><?php echo "{$info['fullname']}"; ?></strong></p>
        <p>Email: <strong><?php echo "{$info['email']}"; ?></strong></p>
    </div>
</body>
</html>