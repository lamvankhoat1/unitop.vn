<?php

  function user_exist($field_username, $field_email) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $query_string = "SELECT username, email FROM `tbl_users` WHERE username = '{$username}' OR password = '{$email}';";
    $result =  db_fetch_row($query_string);
    if(empty($result)) {
        remove_error('user_exist');
        return false;
    }
    set_error("user_exist", "Tên người dùng hoặc email đã tồn tại");
    return true;
  }

  function add_user($token, ...$field_list) {
    foreach($field_list as $field) {
        $$field = $_POST[$field];
    };
    db_insert('tbl_users', array(
        'fullname' => $fullname,
        'username' => $username,
        'email' => $email,
        'password' => md5($password),
        'user_id' => NULL,
        'gender' => 'male', //demo
        'is_active' => 0,
        'token' => $token
    ));
  }

  function check_token($token) {
    $row = db_num_rows("SELECT token, is_active FROM `tbl_users` WHERE token = '{$token}' AND is_active = 0;");
    return $row;
  }
?>