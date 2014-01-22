<?php
//connect to MySQL
$connect = mysql_connect("localhost", "bp5am", "bp5ampass") 
  or die("Hey loser, check your server connection.");

//make sure we're using the right database
mysql_select_db("moviesite");

$query = "SELECT movie_name, movietype_label " .
         "FROM movie " .
         "LEFT JOIN movietype " .
         "ON movie_type = movietype_id " .
         "WHERE movie.movie_year>1990 " .
         "ORDER BY movie_type";
$results = mysql_query($query)
  or die(mysql_error());

echo "<table border=\"1\">\n";
while ($row = mysql_fetch_assoc($results)) {
  echo "<tr>\n";
  foreach($row as $value) {
    echo "<td>\n";
    echo $value;
    echo "</td>\n";
  }
  echo "</tr>\n";
}
echo "</table>\n";
?>
