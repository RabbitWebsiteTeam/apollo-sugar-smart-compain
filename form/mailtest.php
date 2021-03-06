<?php

require 'Mailer/Exception.php';
require 'Mailer/PHPMailer.php';
require 'Mailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'corporate@callhealth.com';                 // SMTP username
    $mail->Password = 'Hindol@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('corporate@callhealth.com', 'CallHealth');
    $mail->addAddress('tarun.agarwal@rabbitdigital.in', 'Tarun Agarwal');     // Add a recipient
 //   $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('corporate@callhealth.com', 'CallHealth');
//    $mail->addCC('cc@example.com');
 //   $mail->addBCC('bcc@example.com');
//
   //Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}