<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1</title>
</head>

<body>
    <!-- 1.	Tạo mảng lưu các số lẻ từ 3->150 -->
     <?php
        $list_even = array();
        for ($i=3; $i <= 150 ; $i+=2) { 
            $list_even[] = $i;
        }
        echo "<pre>";
        print_r($list_even);
        echo "</pre>";
        
     ?>
</body>

</html>