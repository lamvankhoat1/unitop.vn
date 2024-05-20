<?php
  
  function is_not_empty($label) {
   global $error;
   if (!empty($_POST[$label])) {
    #nếu không rỗng
    return true;
} else {
    #nếu rỗng
    $error[$label] = 'Không được để trống trường này';
    return false;
   }
  };

  function show_error($label) {
    global $error;
    if (isset($error[$label])) {
      return $error[$label];
    } else {
        return "";
    }
  }

  function set_value($label) {
    global $$label;
    if (!empty($$label)) {
        return $$label;
    };
    return "";
  }

  function is_username($username) {
    $pattern = "/^[A-Za-z0-9\._]{6,32}$/";
    if (!preg_match($pattern, $username, $matches)) {
      global $error;
      $error['username'] = 'Tên đăng nhập không đúng định dạng';
      return false;
    } else {
        return true;
    }
  }

  function is_password($password) {
    $pattern = "/^[A-Z]{1}([\w_\.!@#$%&*()]+){5,31}$/";
    if (!preg_match($pattern, $password, $matches)) {
      global $error;
      $error['password'] = 'Mật khẩu không đúng định dạng';
      return false;
    } else {
        return true;
    }
  }

  function is_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        global $error;
        $error['email'] = 'Email không đúng định dạng';
        return false;
    }
    return true;
  }

  function is_fullname($fullname) {
    global $error;
    if (strlen($fullname) < 5) {
        $error['fullname'] = "Tên phải lớn hơn 5 ký tự";
        return false;
    } else {
        return true;
    }
  }
?>