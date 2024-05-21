<?php
  function check_email_exist($email) {
    $sql_query = "SELECT email FROM `tbl_users` WHERE email = '{$email}'";
    $row = db_num_rows($sql_query);
    if($row == 1) {return true;}
    return false;
  }

  function get_fullname($username) {
    $sql_string = "SELECT username, fullname FROM `tbl_users` WHERE username = '{$username}';";
    $row = db_fetch_row($sql_string);
    return $row['fullname'];

  }
?>