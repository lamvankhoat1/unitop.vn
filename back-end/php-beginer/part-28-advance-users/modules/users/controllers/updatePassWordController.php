<?php
  function construct() {
    load("lib", "email");
    load("lib", "validation");
    load("helper", "url");
    load_model("validation");
  };

  function updatePassWordAction() {   
    load_model("updatePassWord");
    if (isset($_POST['btn_update'])) {
        $_SESSION['form_error'] = array();
        validation("password");
        if(empty($_SESSION['form_error'])) {
            $token_reset = $_GET['token_reset'];
            if (checkToken($token_reset)) {
                update_password(md5($_POST['password']), $token_reset);
                redirect_to("?mod=users&controller=reset&action=resetSuccess");
            }
        }
      }
    load_view("updatePassWord");
  }
?>