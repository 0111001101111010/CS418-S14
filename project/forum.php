<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php include 'include/header.php';?>
<?php //include connection
//Check username and password information
//$_SESSION['myusername']; //= $_POST['myusername'];
//$_SESSION['myuserpass']; //= $_POST['myuserpass'];
//$_SESSION['authuser'] = 0;
//var_dump($_SESSION);
//var_dump($_POST);
//die();
$board_id = $_GET['board_id'];

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
$query = "SELECT * from thread where thread_board_id=".$board_id." order by thread_id DESC";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

//$stmt = $conn->prepare('SELECT * from thread');
//$stmt->execute();
$query2 = "SELECT * from board where board_id=".$board_id;
$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
$result2 = mysql_fetch_object($result2);


//Am I a moderator or admin?
if ( isset( $_COOKIE['user']) ){
$query3 = "SELECT * from moderator where moderator_name_id=".'"'.$_COOKIE['user'].'" and moderator_board_id ='.$board_id;

$result3 = mysql_query($query3) or die('Query failed: ' . mysql_error());
//$result3 = mysql_fetch_object($result3);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result3);
    if($count==1)
        $moderator=true;
}

echo "<h1>".$result2->board_title."</h1>";


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
<?php

  if ($moderator)
    echo '<button class="btn btn-blue pull-right" data-toggle="modal" data-target="#newboard" >New Thread <i class="fa fa-plus-square"></i></button>';
?>

  <!-- Modal -->
  <div class="modal fade" id="newboard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">New Thread</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="submitThread.php?boardid="<?php echo $board_id;?>>
            <input id="thread_name" type="text" placeholder="Enter Title"></input><br>
            <textarea id="thread_description" placeholder="Enter Description"></textarea>
            <div class="modal-footer">
              <input type="submit" class="btn btn-blue" value="Create"></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include 'include/footer.php'; ?>
</body>
</html>
