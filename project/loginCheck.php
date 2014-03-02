<?php

$host="127.0.0.1"; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="users"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE user_name='$myusername' and user_password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
$_SESSION['myusername']=$myusername;
$_SESSION['myuserpass']=$mypassword;
$_POST['myusername']=$myusername;
$_POST['myuserpass']=$mypassword;
header("location:forum.php");
}
else {
echo "Wrong Username or Password";
echo '<div class="content"><div class="container">You must be logged in to access the forum. <br>
<h6>Click <a href="index.php">here</a> if you are not redirected.</h6></div></div>';

include 'include/footer.php';
exit();
}
?>
