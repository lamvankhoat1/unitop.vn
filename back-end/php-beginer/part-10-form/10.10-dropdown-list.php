<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DropDown</title>
</head>

<body>
    <?php
      #check btn_order
      #check not empty pay
      #show value

      // http://localhost/unitop.vn/back-end/php-beginer/part-10-form/10.10-dropdown-list.php
      if (isset($_POST['btn_order'])) {
        if (!empty($_POST['pay'])) {
            $pay= $_POST['pay'];
            echo "{$pay}";
        } else {
            $error['pay'] = 'Vui lòng chọn hình thức thanh toán';
            echo "{$error['pay']}";
        }
      }
    ?>
    <form action="" method="post">
        <select name="pay">
            <option value="">-- Chọn --</option>
            <option value="code" selected="selected">Thanh toán tại nhà</option>
            <option value="banking">Thanh toán qua thẻ tín dụng</option>
        </select>
        <button name="btn_order" type="submit">Đặt hàng</button>
    </form>
</body>

</html>