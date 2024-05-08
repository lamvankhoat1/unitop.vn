<?php
  # check isset file
  # upload file => show info file
  # di chuyển file vô uploadS
  if (isset($_POST['btn_upload'])) {
    if (isset($_FILES['file'])) {
        $resource = $_FILES['file']['tmp_name'];
        $destination = "upload/{$_FILES['file']['name']}";
        if (move_uploaded_file($resource, $destination)) {
            echo "upload thành công<br>";
            echo "<a href='{$destination}'>DownLoad</a>";
        } else {
            echo "upload không thành công";
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD FILE LÊN SERVER</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        Send this file: <input type="file" name="file"><br>
        <input type="submit" value="Send File" name="btn_upload">
    </form>
</body>
</html>