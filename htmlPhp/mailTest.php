<?php
//https://sofree.cc/php-smtp-mail/
//https://www.php.net/manual/en/function.mail.php
  $to =""; //收件者
  $subject = "testMailFunction"; //信件標題
  $msg = "This is a mail for test mail function";//信件內容
  $headers = "From: not-replyMNELMeetingsystem@nfu.edu.tw"; //寄件者
  
  if(mail("$to", "$subject", "$msg", "$headers"))
   echo "成功";
  else
   echo "失敗";