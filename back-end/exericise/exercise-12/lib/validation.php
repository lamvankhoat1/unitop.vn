<?php
    function is_username($username) {
        $pattern = "/^[A-Za-z0-9_.]{6,32}$/";
        if (preg_match($pattern, $username, $matches)) {
            return true;
        } else {
            return false;
        };
    }

    function is_password($password) {
        $pattern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        if (preg_match($pattern, $_POST['password'], $matches)) {
            return true;
        } else {
            return false;
        }
    }

    function set_value($label) {
        global $$label;
        if (!empty($$label)) {
            return $$label;
        } else {
            return "";
        }
    }

    function is_phone($phone) {
        $pattern = "/^(032|033|034|035|036|037|038|039|096|097|098|086|083|084|085|081|082|088|091|094|070|079|077|076|078|090|093|089|056|058|092|059|099)[0-9]{7}$/";
        if (preg_match($pattern, $phone, $matches)) {
            return true;
        } else {
            return false;
        }
    }

    function form_error($label) {
        global $error;
        if (!empty($error[$label])) {
            return "<p class=\"error\">{$error[$label]}</p>";
        } else {
            return "";
        }
    }
?>