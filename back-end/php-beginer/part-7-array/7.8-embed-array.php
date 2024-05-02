<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhúng mảng vô HTML</title>
</head>
<body>
    <?php
      $list_prime = array(2, 3, 5, 7);
    ?>
    
    <table border='1'>
	<thead>
		<tr>
			<td align="center" width="50">STT</td>
			<td align="center" width="200">Số nguyên tố</td>
		</tr>
	</thead>
	<tbody>
        <?php
        // http://localhost\unitop.vn\back-end\php-beginer\part-7-array\7.8-embed-array.php
          foreach ($list_prime as $key => $value) {
            $order = $key + 1;
            echo "<tr>";
            echo "<td>{$order}</td><td>{$value}</td>";
            echo "</tr>";
          }
        ?>
	</tbody>
</table>

    <?php
      $list_users = array(
        1 => array(
            'id' => 1000,
            'fullname' => 'Phan Văn Cương',
            'email' => 'phancuong.qt@gmail.com'
        ),
        2 => array(
            'id' => 1068,
            'fullname' => 'Nguyễn Hoàng Anh',
            'email' => 'hoanganh@gmail.com')
        );
    ?>
    <?php if (!empty($list_users)) { ?>
    <table border='1'>
        <thead>
            <tr>
                <td align="center" width="50">STT</td>
                <td align="center" width="50">ID</td>
                <td align="center" width="200">Họ và tên</td>
                <td align="center" width="200">Email</td>
            </tr>
        </thead>
        <tbody>
        <!-- CODE PHP -->
        <?php
        foreach ($list_users as $key => $user) {
            # code...
            $order = $key;
            echo "<tr>";
            echo "    <td>{$order}</td>";
            echo "    <td>{$user['id']}</td>";
            echo "    <td>{$user['fullname']}</td>";
            echo "    <td>{$user['email']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <?php } else {?>
        <p>Dữ liệu không tồn tại</p>
    <?php } ?>
</body>
</html>