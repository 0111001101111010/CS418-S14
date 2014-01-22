<?php

define('SQL_HOST','localhost');
define('SQL_USER','bp5am');
define('SQL_PASS','bp5ampass');
define('SQL_DB','comicsite');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
  or die('Could not connect to the database; ' . mysql_error());

mysql_select_db(SQL_DB, $conn)
  or die('Could not select database; ' . mysql_error());

?>
