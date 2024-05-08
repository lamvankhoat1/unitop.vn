<?php
//   xây dựng hàm send_mail()
function send_mail($recipient, $subject, $content, $attachment) {
    global $mail;
    $mail->setFrom('lamvankhoat1@gmail.com', 'Tran Khoa');
    $mail->addAddress($recipient);     //Add a recipient
    if (isset($attachment)) {
        $mail->addAttachment($attachment); 
    }
    $mail->isHTML(true); 
    $mail->Subject = $subject;
    $mail->Body    = $content;
  
};
?>