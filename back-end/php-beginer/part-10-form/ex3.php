<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 3</title>
</head>
<body>
    <?php
    // http://localhost/unitop.vn/back-end/php-beginer/part-10-form/ex3.php?mod=product&act=main
    if (!empty($_GET['mod'])) {
        echo $_GET['mod'];
    }
    if (!empty($_GET['act'])) {
        echo $_GET['act'];
    }
    ?>
</body>
</html>