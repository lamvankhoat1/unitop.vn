<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 3</title>
</head>
<body>
    <?php
    //   Hiển thị danh mục đa cấp
    # Xây dựng dữ liệu mảng đa cấp
    $list_category = array(
        'Giáo dục' => array(
            'Khuyến học', 'Du học'
        ),
        'Thể thao' => array(
            'Châu Âu',
            'Châu Á' => array(
                'Việt Nam', 'Vleague'
                )
                )
            );
    # xử lý
            # - Duyệt mảng: Nếu phần tử con là 1 mảng thì sử dụng vòng lặp
    $level = 0;

    create_multi_level($list_category, $level);

    function create_multi_level($data, $level) {
        $level_string = "";
        if($level !== 0) {
            $level_string = str_repeat(' - ', $level);
        }
        if(is_array($data)) {
            global $level;
            $level += 1;
            foreach ($data as $key => $value) {
                if(is_array($value) == true) {
                    echo $level_string."{$key}<br>";
                }
                create_multi_level($value, $level);
                }
            } else {
                echo $level_string."{$data}<br>";
            }
        }

    // http://localhost/unitop.vn\back-end\php-beginer\part-9-library\ex3.php
    ?>
</body>
</html>