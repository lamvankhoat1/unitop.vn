<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Checkbox</title>
</head>

<body>
    <?php
      // http://localhost/unitop.vn/back-end/php-beginer/part-10-form/19.9-list-checkbox.php
      #check btn add
      #check cat[]
      #show
      if (isset($_POST['btn_add'])) {
          if (isset($_POST['cat'])) {
           echo implode(",", $_POST['cat']);
        }
      }
    ?>
    <form action="" method="POST">
        <input type="checkbox" name="cat[]" value="1" id="cat_1" />
        <label for="cat_1">Thể thao</label><br /><br />
        <input type="checkbox" name="cat[]" value="2" id="cat_2" />
        <label for="cat_2" />Xã hội</label><br /><br />
        <input type="submit" name="btn_add" value="Thêm bài viết" />
    </form>
</body>

</html>