<?php
  $id= $_GET['id'];
  db_delete('tbl_users', "user_id = {$id}");
  redirect_to("?mod=users&act=main");
//   $sql = "DELETE FROM tbl_users WHERE user_id = {$id}";
//   if (mysqli_query($conn, $sql)) {
//     redirect_to("?mod=users&act=main");
//   }
?>