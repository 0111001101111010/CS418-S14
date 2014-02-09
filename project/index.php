<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php //include connection
//Check username and password information
$_SESSION['username'] = $_POST['user'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['authuser'] = 0;

if (($_SESSION['username'] == 'test' || 'mweigle' || 'TA') and
    ($_SESSION['userpass'] == 'test')) {
 	 $_SESSION['authuser'] = 1;
} else {

  echo "<br>
<br>
<br>
<br>Sorry, but you don't have permission to view this Forum!<br>
please login";

echo '<form method="post" action="index.php">
  <p>Enter your username: 
    <input type="text" name="user">
  </p>
  <p>Enter your password: 
    <input type="password" name="pass">
  </p>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>';
include 'include/footer.php';
exit();
}
?>

<br>
<br>
<br>

<!-- Needs to spit these out --> 
<!-- Main unit for the board -->
      <div class="thread_view">

        <div class="wrapper wrapper_thread_1">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <img src="view/holder_80_80.png" class="img-circle" style="float:left;padding-right:25px">
                <h1>The Original Internet Forum</h1>
                <p>Description of the said board</p>
              </div>

            </div>
          </div>
        </div>
        <a href="messeges.html">
          <div class="wrapper wrapper_thread">
            <div class="container">
              <div class="row">
                <div class="col-md-10">
                  <h1>Share Your Cats</h1>
                  <p>Feline animals only</p>
                </div>

                <div class="col-md-1">100 Messages</div>
                <div class="col-md-1">502 Viewers</div>
              </div>	
            </div>
          </div>
        </a>
   </div>
<?php 
echo 'Welcome to this forum,'.$_SESSION['username'];
/*
$thread = 10;
for ($i=0; $i < 5; $i++) { 
	# code...

	echo '<p>Forum Item '.$i.'</p>';
  	echo "<a href='thread.php?thread=$thread'>$i</a>";
}
*/
# Perform database query
$query = "SELECT * from thread";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

//$stmt = $conn->prepare('SELECT * from thread');
//$stmt->execute();

 
# Filter through rows and echo desired information
if ($result){
echo '<ul>';
while ($row = mysql_fetch_object($result)) {
    echo '<li>';//thread='.$row->thread_name.
    echo '<a href=replies.php?&thread='
         .urlencode($row->thread_name).
         '&id='.$row->thread_id.'>'
         .$row->thread_name.
         '</a> posted at: '.$row->thread_date.'
          <br>';
    echo '</li>';
}
echo '</ul>';
}
else {
    echo "crud";
}

?>

<?php include 'include/footer.php'; ?>
</body>
<p> built by stanley zheng and lookmai rattana </p>
</html>

