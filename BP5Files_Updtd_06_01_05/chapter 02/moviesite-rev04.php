<html>
<head>
<title>My Movie Site - <?php echo $_REQUEST['favmovie']; ?></title>
</head>
<body>
<?php
  echo "My favorite movie is ";
  echo $_REQUEST['favmovie'];
  echo "<br>";
  $movierate = 5;
  echo "My movie rating for this movie is: ";
  echo $movierate;
?>
</body>
</html>
