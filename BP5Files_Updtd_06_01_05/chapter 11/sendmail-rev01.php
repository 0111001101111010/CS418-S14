<html>
<head>
<title>Mail Sent!</title>
</head>
<body>
<?php
$to = $_POST["to"];
$from = $_POST["from"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$headers = "From: " . $from . "\r\n";
$mailsent = mail($to, $subject, $message, $headers);
if ($mailsent) {
  echo "Congrats! The following message has been sent: <br><br>";
  echo "<b>To:</b> $to<br>";
  echo "<b>From:</b> $from<br>";
  echo "<b>Subject:</b> $subject<br>";
  echo "<b>Message:</b><br>";
  echo $message;
} else {
  echo "There was an error...";
}
?>
</body>
</html>
