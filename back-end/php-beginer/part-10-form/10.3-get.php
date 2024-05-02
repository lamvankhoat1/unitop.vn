<?php
  // http://localhost\unitop.vn\back-end\php-beginer\part-10-form\get.php
    if (isset($_GET['q'])) {
      echo "{$q}";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương thức GET</title>
</head>

<body>
    <form action="" method="GET">
        Tìm Kiếm: <input type="text" name="q">
        <input type="submit" name="btn_search" value="Search">
    </form>
</body>

</html>