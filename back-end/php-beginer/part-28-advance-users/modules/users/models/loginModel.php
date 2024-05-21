<?php
  function check_login($username_field, $password_field) {
    // sql user
    // sql password
    // login thành công
      // is_login = true, is_username = username
      // is_login = false
    $username_exist = db_num_rows("SELECT username FROM `tbl_users` WHERE username = '{$_POST[$username_field]}';");
    if($username_exist == 1){
      remove_error('login');
    } else {
      set_error('login', 'Tên người dùng không tồn tại');
      return false;
    }

    $password_exist = db_num_rows("SELECT `password` FROM `tbl_users` WHERE `password` = '".md5($_POST[$password_field])."'");

    // echo md5("Khoa!@#");
    if($password_exist == 1){
      remove_error('login');
    } else {
      set_error('login', 'Sai mật khẩu');
      return false;
    }
    // echo "Đăng nhập thành công";
    return true;
  }

  function get_fullname($username) {
    $sql_string = "SELECT username, fullname FROM `tbl_users` WHERE username = '{$username}';";
    $row = db_fetch_row($sql_string);
    return $row['fullname'];

  }
?>