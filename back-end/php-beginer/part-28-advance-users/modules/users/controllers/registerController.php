<?php
# ?mod=users&controller=register

  function construct() {
    load("lib", "email");
    load("lib", "validation");
    load("helper", "url");
    load_model("validation");
    load_model("register");
  };

  function indexAction() {
    load_view("register");
  };

  function registerAction() {
    load_view("register");
    if (isset($_POST['btn_register'])) {
      $_SESSION['form_error'] = array();
      validation("fullname");
      validation("email");
      validation("username");
      validation("password");
      show_array($_SESSION['form_error']);
      if(empty($_SESSION['form_error'])) {
        if(!user_exist('username', 'email')) {
          $token = md5($_POST['password'].time());
          add_user($token,'fullname', 'email', 'username', 'password');
          send_email_to_verify($_POST['email'], $_POST['fullname'], $token);
        }
      }
    }
  };
  
  

  function verifyAction() {
    $token = $_GET['token'];
    if (check_token($token) == 1) {
        // KÍCH HOẠT TÀI KHOẢN
        db_update('tbl_users', array(
          'is_active' => 1
        ), "token = '{$token}'");
        redirect_to("?mod=users&controller=registerSuccess");
    } else {
      echo "Kích hoạt tài khoản không thành công";
    }
  };

  // ===============
  // SEND EMAIL
  // ===============
  function send_email_to_verify($email, $fullname, $token) {
    $subject = "Kích hoạt tài khoản trên UNITOP.VN";
    $content = "Xin chào <b>{$fullname}</b>!<br>Vui lòng nhấn vào link này để xác thực tài khoản trên UNITOP:<br>"
    ."http://localhost/unitop.vn/back-end/php-beginer/part-28-advance-users/?mod=users&controller=register&action=verify&token={$token}\"";
    send_email($email, $fullname, $subject, $content);
  }


  
  
  
  
?>