<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập phần 4</title>
</head>
<body>
    <?php
    //   BÀI TẬP PHẦN 4	
    //   1. Tạo biền lưu trữ danh sách thành viên	
    //   2. Tạo biến lưu trữ danh sách sản phẩm	
    //   3. Hiển thị thông tin cá nhân(Các thông tin được lưu ở dạng biến)	
    //   Tôi là Cương, sinh năm 1988, cân nặng 62.5kg	
    $list_user = array(
        1 => array(
            'name' => 'Phan Văn Cương',
            'age' => '32'
        ),
        2 => array(
            'name' => 'Nguyễn Quang Anh',
            'age' => '20'
        )
    );
    echo "<pre>";
    print_r($list_user);
    echo "</pre>";

    $list_product = array(
        1 => array(
            'name' => 'iphone',
            'price' => 200,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur, incidunt?'
        ),
        2 => array(
            'name' => 'samsung',
            'price' => 300,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur, incidunt?'
        ),
    );
    echo "<pre>";
    print_r($list_product);
    echo "</pre>";

    $info = array(
        'name' => 'Cương',
        'born' => 1988,
        'weight' => 63.5,
    );
    echo "<pre>";
    print_r($info);
    echo "</pre>";

    echo "Tôi là {$info['name']}, sinh năm {$info['born']}, cân nặng {$info['weight']}kg";
    ?>


</body>
</html>