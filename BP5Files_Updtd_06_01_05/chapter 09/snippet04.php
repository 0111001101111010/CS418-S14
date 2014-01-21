<?php
//create your error handler function
function handler($error_type, 
                 $error_message, 
                 $error_file, 
                 $error_line) {
     
  echo "<h1>Page Error</h1>";
  echo "Errors have occurred while executing this page. Contact the ";
  echo "<a href=\"mailto:admin@yourdomain.com\">administrator</a> " .
       "to report errors<br><br>";
  echo "<b>Information Generated</b><br><br>";
  echo "<b>Error Type:</b> $error_type<br>";
  echo "<b>Error Message:</b> $error_message<br>";
  echo "<b>Error Filename:</b> $error_file<br>";
  echo "<b>Error Line:</b> $error_line";
}

//set the error handler to be used
set_error_handler("handler");

//set string with "Wrox" spelled wrong
$string_variable = "Worx books are great!";

//try to use str_replace to replace Worx with Wrox
//this will generate an E_WARNING
//because of wrong parameter count
str_replace("Worx", "Wrox");
?>
