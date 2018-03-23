<?php

$to = $_POST["to"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$headers = 'From: noreply@connectx.com' . "\r\n" .
    'Reply-To: no@connectx.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>