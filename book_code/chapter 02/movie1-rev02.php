<html>
<head>
<title>Find my Favorite Movie!</title>
</head>
<body>
<?php
  //add this line:
  $myfavmovie = urlencode("Life of Brian");

//change this line:
  echo "<a href='moviesite.php?favmovie=$myfavmovie'>";
  echo "Click here to see information about my favorite movie!";
  echo "</a>";
?>
</body>
</html>
