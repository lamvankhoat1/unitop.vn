<?php
  function set_value($label) {
    global $$label;
    if (!empty($$label)) {
      return $$label;
    } else {
        return "";
    }
  };

  function form_error($label) {
    global $error;
    if (!empty($error[$label])) {
      return '<p class=\'error\'>'.$error[$label].'</p>';
    } else {
        return "";
    }
  }


  function is_fullname($fullname) {
    global $error;
    if (!empty($fullname)) {
      return true;
    };
    return false;
  };

  function  is_username($username) {
    $pattern = "/^[A-Za-z0-9\._]{6,32}$/";
    if (preg_match($pattern, $username, $matches)) {
      return true;
    };
    return false;
  };

  function is_password($password) {
    $pattern = "/^[A-Z]{1}([\w_\.!@#$%&*()]+){5,31}$/";
    if (!preg_match($pattern, $password, $matches)) {
      return false;
    };
    return true;
  }

  function is_phone_number($phone) {
    $pattern = "/^(032|033|034|035|036|037|038|039|096|097|098|086|083|084|085|081|082|088|091|094|070|079|077|076|078|090|093|089|056|058|092|059|099)[0-9]{7}$/";
    if (!preg_match($pattern, $phone, $matches)) {
      return false;
    };
    return true;
  }


?>