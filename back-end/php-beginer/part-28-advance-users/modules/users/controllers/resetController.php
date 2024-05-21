<?php
  function construct() {
    load("lib", "email");
    load("lib", "validation");
    load("helper", "url");
    load_model("validation");
  };

  function indexAction() {

  };
  
  function resetAction() {
    load_model("reset");
    load_view("reset");
    
    if (isset($_POST['btn_reset'])) {
        $_SESSION['form_error'] = array();
        validation("email");
        if(empty($_SESSION['form_error'])) {
            $email = $_POST['email'];
            if(check_email_exist($email)) {
                $token_reset = md5(time().$email);
                send_email_reset($email, $token_reset);
                db_update('tbl_users', array(
                    'token_reset' => $token_reset
                ), "email = '{$email}'");
                return true;
            }
            set_error("email", "Email không tồn tại");
        }
    }
  };

  function send_email_reset($email, $token_reset) {
    $email_subject = "KHÔI PHỤC MẬT KHẨU | UNITOP";
    $base_url = "http://localhost/unitop.vn/back-end/php-beginer/part-28-advance-users/";
    $link_reset_password = $base_url."?mod=users&controller=updatePassWord&action=updatePassWord&token_reset=".$token_reset;

    $email_body_html = "Xin chào bạn,<br>
        Vui lòng nhấn vào link này để khôi phục lại mật khẩu của bạn:  {$link_reset_password}
    ";
    send_email($email, $email, $email_subject, $email_body_html);
  };

  function resetSuccessAction() {
    load_view("resetSuccess");
  };
  
  
  
?>