<html>
<head>
<title>Is it a leap year?</title>
</head>
<body>
<?php
$leapyear = date("L");
if ($leapyear == 1) echo "Hooray! It's a leap year!";
else echo "Aww, sorry, mate. No leap year this year.";
?>
</body>
</html>
