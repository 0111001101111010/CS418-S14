<?php
$link = mysql_connect("localhost","bp5am","bp5ampass")
  or die(mysql_error());
mysql_select_db("moviesite") 
  or die (mysql_error());

/* Function to calculate if a movie made a profit, 
loss or broke even */
function calculate_differences($takings, $cost) {
  $difference = $takings - $cost;
          
  if ($difference < 0) {     
    $difference = substr($difference, 1);
    $font_color = 'red';
    $profit_or_loss = "$" . $difference . "m";
  } elseif ($difference > 0) {
    $font_color ='green';
    $profit_or_loss = "$" . $difference . "m";
  } else {
    $font_color = 'blue';
    $profit_or_loss = "Broke even";
  }
  return "<font color=\"$font_color\">" . $profit_or_loss . "</font>";
}

/* Function to get the director's name from the people table */
function get_director() {
  global $movie_director;
  global $director;

  $query_d = "SELECT people_fullname " .
             "FROM people " .
             "WHERE people_id='$movie_director'";
  $results_d = mysql_query($query_d) 
    or die(mysql_error());
  $row_d = mysql_fetch_array($results_d);
  extract($row_d);
  $director = $people_fullname;
}


/* Function to get the lead actor's name from the people table */
function get_leadactor() {
  global $movie_leadactor;
  global $leadactor;

  $query_a = "SELECT people_fullname " .
             "FROM people " .
             "WHERE people_id='$movie_leadactor'";
  $results_a = mysql_query($query_a) 
    or die(mysql_error());
  $row_a = mysql_fetch_array($results_a);
  extract($row_a);
  $leadactor = $people_fullname;
}

$query = "SELECT * FROM movie " .
         "WHERE movie_id ='" . $_GET['movie_id'] . "'";
                         
$result = mysql_query($query, $link) 
  or die(mysql_error());     

$movie_table_headings=<<<EOD
  <tr>
    <th>Movie Title</th>
    <th>Year of Release</th>
    <th>Movie Director</th>
    <th>Movie Lead Actor</th>
    <th>Movie Running Time</th>
    <th>Movie Health</th>
  </tr>
EOD;
     

while ($row = mysql_fetch_array($result)) {
  $movie_name = $row['movie_name'];
  $movie_director = $row['movie_director'];
  $movie_leadactor = $row['movie_leadactor'];
  $movie_year = $row['movie_year'];
  $movie_running_time = $row['movie_running_time']." mins";
  $movie_takings = $row['movie_takings'];
  $movie_cost = $row['movie_cost']; 

  //get director's name from people table
  get_director();

  //get lead actor's name from people table
  get_leadactor();

}     

?>
