<?php
  function is_login() {
    if (isset($_SESSION['user_login'])) {
        return true;
    }  elseif (isset($_SESSION['user_login'])) {
        return true;
    }
    return false;
  };

  function user_info($field) {
    global $list_users;
    foreach ($list_users as $user) {
        if ($user['username'] == $_SESSION['user_login']) {
            if (array_key_exists($field, $user)) {
                return $user[$field];
            } else {
                return false;
            }
        }
    }
  }
?>