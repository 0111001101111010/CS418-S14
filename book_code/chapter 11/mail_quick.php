<?php

require 'class.SimpleMail.php';

$postcard = new SimpleMail();

if ($postcard->send("youremail@yourhost.com",
                   "Quick message test",
                   "This is a test using SimpleMail::send!")) {
  echo "Quick message sent successfully!";
}
?>
