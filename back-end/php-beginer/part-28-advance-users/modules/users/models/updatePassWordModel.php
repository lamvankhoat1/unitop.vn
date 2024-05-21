<?php
  function checkToken($token_reset) {
    $query_string = "SELECT * FROM `tbl_users` WHERE token_reset = '{$token_reset}'";
    $row = db_num_rows($query_string);
    if ($row == 1) {
        return true;
    }
    return false;
  };

  function update_password($password, $token_reset) {
    db_update('tbl_users', array(
        'password' => $password,
    ), "token_reset = '{$token_reset}'");
  }
?>