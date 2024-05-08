<?php
      //Server settings
      $mail->SMTPDebug = 0;  // 0: không hiển thị lỗi thông báo nào, 2: hiển thị lỗi                     //Enable verbose debug output
      $mail->isSMTP();                                            //config: Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //config: Enable SMTP authentication
      $mail->Username   = 'lamvankhoat1';                     //SMTP username
      $mail->Password   = 'qkhi wfmi mhpx lncn';                               //SMTP password
      $mail->SMTPSecure = 'tsl';            //config: Enable implicit TLS encryption
      $mail->Port       = 587; 
  //FIX lỗi: không hiển thị font chữ tiếng Việt
      $mail->CharSet = 'UTF8';                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
?>