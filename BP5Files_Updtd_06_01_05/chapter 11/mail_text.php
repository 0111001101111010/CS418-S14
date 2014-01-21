<?php
require 'class.SimpleMail.php';

$postcard = new SimpleMail();

$postcard->to = "youremail@yourhost.com";
$postcard->subject = "Testing text email";
$postcard->body = "This is a test using plain text email!";

if ($postcard->send()) {
  echo "Text email sent successfully!";
}
?>
