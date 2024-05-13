<?php
    require './data/users.php';
    function check_login($username, $password) {
        global $list_users;
        global $error;
        foreach ($list_users as $user) {
            if ($user['username'] == $username) {
                if ($user['password'] == md5($password)) {
                    return true;
                } else {
                    $error['login'] = 'Sai mật khẩu';
                    return false;
                }
            } else {
                $error['login'] = 'Sai tên người dùng';
                return false;
            }
        }
  }
?>