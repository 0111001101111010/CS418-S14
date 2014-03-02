<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php include 'include/header.php';?>
<?php //include connection
//Check username and password information
//$_SESSION['myusername']; //= $_POST['myusername'];
//$_SESSION['myuserpass']; //= $_POST['myuserpass'];
//$_SESSION['authuser'] = 0;
var_dump($_SESSION);
var_dump($_POST);
//die();

if ( isset( $_SESSION['myusername'] ) ){

}else {

  echo '<div class="content"><div class="container">You must be logged in to access the forum. <br>
  <h6>Click <a href="index.php">here</a> if you are not redirected.</h6></div></div>';

include 'include/footer.php';
exit();
}
?>

<!-- Needs to spit these out -->
<!-- Main unit for the board -->
<div class="content">
  <div class="container">

<?php
/*
$thread = 10;
for ($i=0; $i < 5; $i++) {
	# code...

	echo '<p>Forum Item '.$i.'</p>';
  	echo "<a href='thread.php?thread=$thread'>$i</a>";
}
*/
# Perform database query
$query = "SELECT * from thread order by thread_id DESC";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

//$stmt = $conn->prepare('SELECT * from thread');
//$stmt->execute();




# Filter through rows and echo desired information
if ($result){
  while ($row = mysql_fetch_object($result)) {
      echo $thread=<<<EOD
        <div class="thread">
          <h3><a href="replies.php?&thread=$row->thread_name&id=$row->thread_id">$row->thread_name</a></h3>
          <h6>OP: <a href="profile.html">username</a></h6> <h6>Comments: # of comments</h6> <h6>Posted on $row->thread_date</h6>
        </div>
EOD;
  }
}
else {
    echo "crud";
}
// adding new thread will go here lol



?>

<?php include 'include/footer.php'; ?>
</body>
<p> built by stanley zheng and lookmai rattana </p>
</html>
