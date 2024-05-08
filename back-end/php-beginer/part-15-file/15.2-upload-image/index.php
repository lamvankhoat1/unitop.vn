<?php

if (isset($_POST['btn_upload'])) {
    if (isset($_FILES['file'])) {
        $destination = "upload/{$_FILES['file']['name']}";
        //  CHECK ĐUÔI FILE
        $type_allow = array('png', 'gif', 'jpeg', 'jpg');
        $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if(!in_array(strtolower($type), $type_allow)) {
            $error['file_type'] = 'Không phải là file ảnh';
        } else {
            // CHECK FILE SIZE
            if ($_FILES['file']['size'] > 29000000) {
                $error['file_size'] = 'Kích cỡ ảnh phải dưới 20MB';
            };
            // CHECK FILE TRÙNG TRÊN HỆ THỐNG
            if (file_exists($destination)) {
                $error['file_exists'] = "File đã tồn tại trên hệ thống - Đã tạo tên sao chép";
                $filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                $new_filename = $filename." - Copy";
                $k = 1;
                while (file_exists("upload/{$new_filename}.{$type}")) {
                    echo "run...<br>";
                    $new_filename = $filename." - Copy ({$k})";
                    $k++;
                };
                $destination = "upload/{$new_filename}.{$type}";
                upload_file();
            };
        }

        if (empty($error)) {
            upload_file();
        } else {
            echo "<pre>";
            print_r($error);
            echo "</pre>";
        }
    }
  }

  function upload_file() { 
    $resource = $_FILES['file']['tmp_name'];
    global $destination;
    if (move_uploaded_file($resource, $destination)) {
        echo "upload thành công<br>";
        echo "<a href='{$destination}'>DownLoad</a>";
    } else {
        echo "upload không thành công";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD ẢNH LÊN SERVER</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        UPLOAD ẢNH: <input type="file" name="file"><br>
        <input type="submit" value="Send File" name="btn_upload">
    </form>
</body>
</html>