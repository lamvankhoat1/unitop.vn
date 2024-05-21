<?php
  function construct() {
    load("helper", "url");
};

function indexAction() {
    // cookie không có unset
    setcookie('is_login', 'true', time()-3600, '/');
    unset($_SESSION['form']['is_login']);
    // chuyển hướng đến login
    redirect_to("?mod=users&controller=index&action=login");
  };
  
  
?>