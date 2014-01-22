<?php
$conn = mysql_connect("localhost", "bp5am", "bp5ampass") 
  or die(mysql_error()); 
$db = mysql_select_db("registration") 
  or die(mysql_error());
?>
