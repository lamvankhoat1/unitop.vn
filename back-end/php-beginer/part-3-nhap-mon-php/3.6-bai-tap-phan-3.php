<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập phần 3</title>
</head>
<body>
    <!-- 
        BÀI TẬP	
            Xuất nội dung thông tin cá nhân được lưu trữ trong 3 biên $fu11name,	
            Susername, $mail lên giao diện html(mô tả bên dưới)	
            Demo	
            Họ và tên: Phan Văn Cương	
            Username: unitop	
            Email: phancuong.qt@gmail.com	
    -->
    <?php
      $fullName = "Phan Văn Cương";
      $username = "unitop";
      $email = "phancuong.qt@gmail.com";
    ?>

    <pre id="result">
        Họ và tên: <?php echo $fullName; ?>	
        Username: <?php echo $username; ?>	
        Email: <?php echo $email; ?>	
    </pre>
        
</body>
</html>