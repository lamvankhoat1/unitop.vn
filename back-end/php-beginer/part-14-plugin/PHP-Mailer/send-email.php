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
    //Server settings
    $mail->SMTPDebug = 2;  // 0: không hiển thị lỗi thông báo nào, 2: hiển thị lỗi                     //Enable verbose debug output
    $mail->isSMTP();                                            //config: Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //config: Enable SMTP authentication
    $mail->Username   = 'lamvankhoat1';                     //SMTP username
    $mail->Password   = 'qkhi wfmi mhpx lncn';                               //SMTP password
    $mail->SMTPSecure = 'tsl';            //config: Enable implicit TLS encryption
    $mail->Port       = 587; 
//FIX lỗi: không hiển thị font chữ tiếng Việt
    $mail->CharSet = 'UTF8';                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //config: Recipients
    $mail->setFrom('lamvankhoat1@gmail.com', 'Tran Khoa');
    $mail->addAddress('ktb.phanhoi@gmail.com');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments - Thêm file
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('attachment/rose.jpg', 'hoa-hong.jpg');    //Optional name

    //Content: Nội dung email
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Ảnh Hoa Hồng';
    $mail->Body    = 'Nhớ Thu Uyên <b><3</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}