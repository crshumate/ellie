<?php 

$to      = 'crshumate@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: chris@chris-shumate.com' . "\r\n" .
    'Reply-To: chris@chris-shumate.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>