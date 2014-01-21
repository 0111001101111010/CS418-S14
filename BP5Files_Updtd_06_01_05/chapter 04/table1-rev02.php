<?php
<?php
$link = mysql_connect("localhost","bp5am","bp5ampass") 
  or die(mysql_error());
mysql_select_db("moviesite") 
  or die (mysql_error());
  
$query = "SELECT movie_name, movie_director, movie_leadactor " .
         "FROM movie";
     
$result = mysql_query($query, $link) 
  or die(mysql_error());
$num_movies = mysql_num_rows($result);

$movie_header=<<<EOD     
<h2><center>Movie Review Database</center></h2>
<table width="70%" border="1" cellpadding="2" 
       cellspacing="2" align="center">
  <tr>
    <th>Movie Title</th>
    <th>Year of Release</th>
    <th>Movie Director</th>
    <th>Movie Lead Actor</th>
    <th>Movie Type</th>
  </tr>
</table>
EOD;
    
$movie_details = '';
while ($row = mysql_fetch_array($result)) {
  $movie_name = $row['movie_name']; 
  $movie_director = $row['movie_director'];
  $movie_leadactor = $row['movie_leadactor'];

  $movie_details .=<<<EOD
  <tr>
    <td>$movie_name</td>
    <td>$movie_director</td>
    <td>$movie_leadactor</td>
  </tr>
EOD;
}     

$movie_details .=<<<EOD
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Total :$num_movies Movies</td>
  </tr>
EOD;
?>
