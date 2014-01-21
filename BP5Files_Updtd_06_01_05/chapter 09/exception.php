<?php
//$x = "";		//Throws null Exception
//$x = "500";		//Throws less than Exception
$x = "1000";		//Throws NO Exception

try {
  if ($x == "") {
    throw new Exception("Variable cannot be null");
  }
  if ($x < 1000) {
    throw new Exception("Variable cannot be less than 1000");
  }
  echo "Validation Accepted!";
}
catch (Exception $exception) {
  echo $exception->getMessage();
  echo " - Validation Denied!";
}
?>
