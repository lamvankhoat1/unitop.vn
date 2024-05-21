<?php
 function construct() {
  load("lib", "email");
  load("lib", "validation");
  load("helper", "url");
  load_model("validation");
  load_model("login");
};
  function indexAction() {
    load_view("login");
  };

  function loginAction() {
        // check cookie remember me
    if(isset($_COOKIE['is_login'])) {
      $_SESSION['form']['is_login'] = true;
      $_SESSION['form']['username'] = $_COOKIE['username'];
      $_SESSION['form']['fullname'] = get_fullname($_COOKIE['username']);
      redirect_to("?mod=home&controller=index");
    } else {
      //remove cookie
      setcookie('is_login', 'true', time()-3600, '/');
    }


    if (isset($_POST['btn_login'])) {
        $_SESSION['form_error'] = array();
        if (isset($_POST['btn_login'])) {
          validation("password");
          validation("username");
          show_array($_SESSION['form_error']);

          if(empty($_SESSION['form_error'])) {
            if(check_login('username', 'password')) {
              // chuyển hướng đăng nhập
              unset($_SESSION['form_error']);
              $_SESSION['form']['is_login'] = true;
              $_SESSION['form']['username'] = $_POST['username'];
              $_SESSION['form']['fullname'] = get_fullname($_POST['username']);
              // check remember me
              if (isset($_POST['remember_me'])) {
                setcookie('is_login', 'true', time()+3600, '/');
                setcookie('username', $_POST['username'], time()+3600, '/');
                setcookie('fullname', get_fullname($_POST['username']), time()+3600, '/');
              }

              redirect_to("?mod=home&controller=index");
            }
          }

        }

    }

    load_view("login");
  };
  
  
  

?>