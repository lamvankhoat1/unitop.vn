<?php
# ?mod=users&controller=register

  function construct() {
    load("lib", "validation");
    load_model("register");
  };

  function indexAction() {
    load_view("register");
  };

  // ===============
  // VALIDATION
  // ===============
  function set_error($field, $content) {
    $_SESSION['form_error'][$field] = $content;
  }

  function remove_error($field) {
    unset($_SESSION['form_error'][$field]);
  }

  function is_empty($field) {
    if (empty($_POST[$field])) {
        set_error($field, "Không được để trống trường này");
        return true;
    } else {
        remove_error($field);
        return false;
    }
  }

  function validation($field) {
    $function_name = "validation_".$field;
    if (function_exists($function_name)) {
        $function_name();
    }
  }

  function validation_fullname() {
    $field = 'fullname';
    $fullname = $_POST[$field];
    if (!is_empty($field)) {
        if (strlen($fullname) <= 1) {
            set_error($field, 'Độ dài tên phải trên 1 ký tự');
        } else {
            remove_error($field);
        }
    };
  }

  function validation_email() {
    $field = 'email';
    $email = $_POST[$field];
    if (!is_empty($field)) {
        if(!is_email($email)){
            set_error($field, "Email bạn nhập không đúng định dạng");
        } else {
            remove_error($field);
        }
    }
  }

  function validation_username() {
    $field = 'username';
    $username = $_POST[$field];
    if (!is_empty($field)) {
        if(!is_username($username)){
            set_error($field, "username bạn nhập không đúng định dạng");
        } else {
            remove_error($field);
        }
    }
  }

  function validation_password() {
    $field = 'password';
    $password = $_POST[$field];
    if (!is_empty($field)) {
        if(!is_password($password)){
            set_error($field, "password bạn nhập không đúng định dạng");
        } else {
            remove_error($field);
        }
    }
  }


  
  
  
  
?>