<?php


/*
vagrant/local version
*/

$username = "root";
$password = "root";
$localhost = "localhost:5432";

date_default_timezone_set("UTC");
/*
vagrant/local version
*/
//STWANLEY

$username = "";
$password = "";
$localhost = "127.0.0.1:3306";


/*
production version
*
$username = "szheng";
$password = "dontsqlinjectmebro";
$localhost = "localhost";
*/

# Connect
mysql_connect($localhost, $username, $password) or die('Could not connect: ' . mysql_error());
mysql_select_db('test') or die('Could not select database');

?>
