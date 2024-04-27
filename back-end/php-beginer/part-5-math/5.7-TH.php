<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thực hành bài 5</title>
</head>
<body>
    <?php
    //   BÀI TẬP PHẦN 5	
    //   Tạo biến số nguyên $a, nếu $a là số nguyên dương chẵn thì tiến hành cộng thêm	
    //   một đơn vị và xuất kết quả ra người dùng	
    $a = 8;
    if ($a % 2 == 0 && $a > 0) {
        $a++;
        echo $a;
    }
    ?>
</body>
</html>