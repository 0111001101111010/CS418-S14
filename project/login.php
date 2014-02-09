<?php //login 
session_start();
$_SESSION['username'] = $_POST['user'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['authuser'] = 0;


?>
<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>

<br>
<br>
<br>
<br>

<form method="post" action="index.php">
  <p>Enter your username: 
    <input type="text" name="user">
  </p>
  <p>Enter your password: 
    <input type="password" name="pass">
  </p>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>
<?php

?>
<?php include 'include/footer.php'; ?>