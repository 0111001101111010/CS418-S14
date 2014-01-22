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
?>
