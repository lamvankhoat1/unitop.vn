<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bài tập phần 4</title>
    </head>
    <body>
        <!-- 1.	Tạo biển lưu trữ danh sách thành viên -->
        <?php
        $list_user = array(
            1 => array(
                'fullname' => 'Phan Văn Cương',
                'age' => '30',
                'weight' => '60',
            ),
            2 => array(
                'fullname' => 'Nguyễn Văn Nam',
                'age' => '20',
                'weight' => '55',
            )
                )
        ?>
        <!-- 2.	Tạo biến lưu trữ danh sách sản phẩm -->
        <?php
        $list_product = array(
            1 => array(
                'id' => '1',
                'productName' => 'apple',
                'productPrice' => 15000000,
            ),
            2 => array(
                'id' => '2',
                'productName' => 'samsung',
                'productPrice' => 7500000,
            )
                )
        ?>
        <!-- 3.	Hiền thị thông tin cá nhân (Các thông tin được lưu ở dạng biến) -->
        <?php
            $info = array(
                'fullname' => 'Phan Văn Cương',
                'born' => 1988,
                'weight' => 62.5,
            );
            echo "Tôi là {$info['fullname']}, sinh năm {$info['born']}, cân nặng {$info['weight']}kg";
        ?>
    </body>
</html>