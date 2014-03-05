<?php
session_start();
include 'include/connect_database.php';
$db_name="test"; // Database name
$tbl_name="users"; // Table name

// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];
$remember=$_POST['checkbox'];
//if (isset($_POST['checkbox']) && is_array($_POST['checkbox'])) { echo implode(' ', $_POST['checkbox']); }

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
// Register $myusername, $mypassword and redirect to file "login_success.php"

if(($count==1 )&&(isset($_POST['checkbox']))){
      //rememberme
      $_SESSION['myusername']=$myusername;
      setcookie("remember", 1, time()+3600);
      setcookie("user", $myusername, time()+3600);
      header("location:index.php");
      }
else if($count==1){
      //dont remember me
      session_start();
      setcookie("remember", 1, time()+60);
      setcookie("user", $myusername, time()+60);
      $_SESSION['myusername']=$myusername;
      //var_dump($_COOKIE["user"]);
      //die();
      header("location:index.php");
}
else {
      header( "refresh:5;url=login.php" );
      include 'include/nav.php';
      include 'include/connect_database.php';
      include 'include/header.php';
      echo "Wrong Username or Password";
      echo '<div class="content"><div class="container">You must be logged in to access the forum. <br>
      <h6>Click <a href="index.php">here</a> if you are not redirected.</h6></div></div>';

      include 'include/footer.php';
      exit();
}
//setcookie("TestCookie","fuck", time()+10);
//echo $_COOKIE["TestCookie"];
//ini_set('session.gc_maxlifetime', 10); //30 secondsh
//-echo ini_get("session.gc_maxlifetime");
//ini_set("session.cookie_lifetime","10");
?>
