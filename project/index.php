<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php //include connection
//Check username and password information
$_SESSION['username'] = $_POST['user'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['authuser'] = 0;

if (($_SESSION['username'] == 'test') and
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
?> 
    <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>
<?php 
for ($i=0; $i < 5; $i++) { 
	# code...
	echo '<p>Forum Item '.$i.'</p>';
}
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



<?php include 'include/footer.php'; ?>
</body>
<p> built by stanley zheng and lookmai rattana </p>
</html>

