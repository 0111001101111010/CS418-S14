<?php
session_start();

//check to see if user has logged in with a valid password
if ($_SESSION['authuser'] != 1) {
  echo "Sorry, but you don't have permission to view this 
       page, you loser!";
  exit();
}
?>
<html>
<head>
<title>My Movie Site</title>
</head>
<body>
<?php include "header.php"; ?>
<?php
$favmovies = array("Life of Brian",
                   "Stripes",
                   "Office Space",
                   "The Holy Grail",
                   "Matrix", 
                   "Terminator 2", 
                   "Star Wars", 
                   "Close Encounters of the Third Kind",
                   "Sixteen Candles", 
                   "Caddyshack");

if (isset($_REQUEST['favmovie'])) {
  echo "Welcome to our site, ";
  echo $_SESSION['username'];
  echo "! <br>";
  echo "My favorite movie is ";
  echo $_REQUEST['favmovie'];
  echo "<br>";
  $movierate = 5;
  echo "My movie rating for this movie is: ";
  echo $movierate;
} else {
  echo "My top ". $_POST["num"] . " movies are:<br>";
     
  if (isset($_REQUEST['sorted'])) {
    sort($favmovies);
  }

  //list the movies
  $numlist = 1;
  while ($numlist <= $_POST["num"]) {
    echo $numlist;
    echo ". ";
    echo pos($favmovies);
    next($favmovies);
    echo "<br>\n";
    $numlist = $numlist + 1;
  }          
     
  //delete these lines
  foreach ($favmovies as $currentvalue) {
    echo $currentvalue;
    echo "<br>\n";
  }     
  //end of deleted lines
}     
?>
</body>
</html>
