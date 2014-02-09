<?php 


/* 
vagrant/local version 
*/ 
$username = "";
$password = "";
$localhost = "127.0.0.1"; 

/*
production version
*

/*
 * Anti-Pattern
 */
 
# Connect
mysql_connect($localhost, $username, $password) or die('Could not connect: ' . mysql_error());
 
# Choose a database
mysql_select_db('test') or die('Could not select database');
 /*
# Perform database query
$query = "SELECT * from users";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
 
# Filter through rows and echo desired information
if ($result){
echo '<ul>';
while ($row = mysql_fetch_object($result)) {
    echo '<li>'.$row->FirstName."</li><br>";
}
echo '</ul>';
}
else {
    echo "crud";
}
*/
?>
