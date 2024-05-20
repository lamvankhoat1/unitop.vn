<?php
  function is_username($username) {
    $pattern = "/^[A-Za-z0-9\._]{6,32}$/";
    if (!preg_match($pattern, $username, $matches)) {
      return false;
    };
    return true;
  }

  function is_password($password) {
    $pattern = "/^[A-Z]{1}([\w_\.!@#$%&*()]+){5,31}$/";
    if (!preg_match($pattern, $password, $matches)) {
      return false;
    };
    return true;
  };

  function is_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return false;
    } else {
      return true;
    }

  }

  function set_value($label) {
    if (isset($_POST[$label])) {
      return $_POST[$label];
    } else {
      return false;
    }
  }

  function form_error($label) {
    global $error;
    if (isset($_SESSION['form_error'][$label])) {
      return "<p class='error'>".$_SESSION['form_error'][$label]."</p>";
    } else {
      return "";
    }
  }
?>