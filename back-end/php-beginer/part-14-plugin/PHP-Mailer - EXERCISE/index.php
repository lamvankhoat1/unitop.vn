<?php
# ĐÃ HOẠT ĐỘNG THÀNH CÔNG

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

#namespace tránh để xung đột
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    require 'config.php';
    require 'send-email.php';
    send_mail('ktb.phanhoi@gmail.com', 'Thư được gửi bằng hàm', 'Hay không nào', 'attachment/rose.jpg');
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}