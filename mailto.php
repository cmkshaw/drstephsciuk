<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = "stephsciuknd@gmail.com";
$subject = $name . " at " . $email . " has e-mailed you.";
$message = $message;
$from = $email ;
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "sent";

?>