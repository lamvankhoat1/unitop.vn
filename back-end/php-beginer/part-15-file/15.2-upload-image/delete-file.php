<?php
  if (isset($_GET['file'])) {
    $path = $_GET['file'];
    if (unlink($path)) {
        echo "Xóa file thành công";
    } else {
        header("Location: index.php");
    }
  }
?>