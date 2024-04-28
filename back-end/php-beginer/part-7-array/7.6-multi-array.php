<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng đa chiều</title>
</head>
<body>
    <?php
    // http://localhost\unitop.vn\back-end\php-beginer\part-7-array\7.6-multi-array.php
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

        echo "<pre>";
        print_r($list_users);
        echo "</pre>";
        # thêm phần tử
        $list_users[3] = array(
            'id' => 3,
            'fullname' => 'Lam Truường',
            'email' => 'lamtruong@gmail.com'
        );
        echo "<pre>";
        print_r($list_users);
        echo "</pre>";

        # lấy thông tin
        echo "<pre>";
        print_r($list_users[3]);
        echo "</pre>";
        echo "{$list_users[3]['email']}";

    ?>
</body>
</html>