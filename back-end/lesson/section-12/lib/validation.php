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

    function form_error($label) {
        global $error;
        if (!empty($error[$label])) {
            return "<p class=\"error\">{$error[$label]}</p>";
        } else {
            return "";
        }
    }
?>