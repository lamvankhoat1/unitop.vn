<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textarea</title>
</head>

<body>
    <?php
      // http://localhost/unitop.vn/back-end/php-beginer/part-10-form/10.11-text-area.php
      #check submit
      #check empty textarea
      #show value
      if (isset($_POST['btn_add'])) {
        if (!empty($_POST['detail'])) {
            $detail= $_POST['detail'];
            echo $detail;
        } else {
            echo "Không được để trống nội dung bài viết";
        }
      }
    ?>
    <form action="" method="post">
        <textarea name="detail" cols="50" rows="8"></textarea>
        <input type="submit" value="Thêm bài viết" name="btn_add">
    </form>
</body>

</html>