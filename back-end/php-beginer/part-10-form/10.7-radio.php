<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Radio</title>
</head>
<body>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
    </style>
    <?php
      // http://localhost/unitop.vn\back-end\php-beginer\part-10-form\10.7-radio.php
      $show_gender = array(
        'male' => 'Nam',
        'female' => 'Nữ',
      );
      $error = array();
      if (isset($_POST['btn_reg'])) {
        if (!empty($_POST['gender'])) {
          $gender= $_POST['gender'];
          echo "{$show_gender[$gender]}";
        } else {
            $error['gender'] = 'Chưa chọn giới tính';
        }
      }
    ?>
    <form action="" method="post">
        <label>
            <input type="radio" name="gender" value="male" <?php if (!empty($gender) && $gender == 'male') {
              echo 'checked="checked"';
            } ?>>Nam
        </label>
        <label>
            <input type="radio" name="gender" value="female" <?php if (!empty($gender) && $gender == 'female') {
              echo 'checked="checked"';
            } ?>>Nữ
        </label>
        <?php if (!empty($error['gender'])) {
          echo "<p style=\"color: red\">{$error['gender']}</p>";
        }?>
        <input type="submit" value="Đăng ký" name="btn_reg">
    </form>
</body>
</html>