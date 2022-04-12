<?php
if(isset( $_POST['firstname']))
  $first_name = $_POST['firstname'];
if(isset($_POST['lastname']))
  $last_name = $_POST['lastname'];
if(isset( $_POST['email']))
  $email = $_POST['email'];
if(isset( $_POST['message']))
  $message = $_POST['message'];

  

$subject = "New Message";
$content="From: $first_name $last_name\n\n Email: $email\n\n Message: $message";
$recipient = "dylanmoyer184@dylanmoyer.net";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");

header('location: thankYou.html')

?>