<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phần tử cho mảng</title>
</head>
<body>

    <?php
    // http://localhost/unitop.vn/back-end/php-beginer/part-7-array/7.3-add-element.php
    # case 1
    $info = array(
        'id' => 1,
        'fullname' => 'Phan Văn Cương',
        'email' => 'phancuong.qt@gmail.com'
    ); 
    echo "<pre>";
    print_r($info);
    echo "</pre>";
    
    $info['phone'] = '0988859692';

    echo "<pre>";
    print_r($info);
    echo "</pre>";

    # case 2
    $list_prime = array(2, 3, 5, 7);
    echo "<pre>";
    print_r($list_prime);
    echo "</pre>";
    $list_prime[] = 11;
    echo "<pre>";
    print_r($list_prime);
    echo "</pre>";
    ?>
</body>
</html>