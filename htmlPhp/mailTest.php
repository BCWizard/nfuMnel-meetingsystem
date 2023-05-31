<?php
//https://sofree.cc/php-smtp-mail/
//https://www.php.net/manual/en/function.mail.php
//https://github.com/Synchro/PHPMailer

ini_set('SMTP','msa.hinet.net');
ini_set('smtp_port',25);
  $to =""; //收件者
  $subject = "testMailFunction"; //信件標題
  $msg = "This is a mail for test mail function";//信件內容
  $headers = "From:not-replyMNELMeetingsystem@nfu.edu.tw"; //寄件者
  
  if(mail("$to", "$subject", "$msg", "$headers"))
   echo "成功";
  else
   echo "失敗";

/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'nfu.edu.tw';                           // Specify main and backup SMTP servers
    
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                                 // SMTP username
    $mail->Password = '';                                 // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('');
    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('');                                // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');


    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'testMailFunction';
    $mail->Body    = 'This is a mail for test mail function <b>HTML.ver</b>';
    $mail->AltBody = 'This is a mail for test mail function <b>non-HTML.ver</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
*/