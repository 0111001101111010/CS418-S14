<?php include 'include/connect_database.php';?>
<?php include 'include/nav.php';?>
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
  {  //get settings for pagination first encapsulate
  $query5 = "SELECT * from settings";
  $result5 = mysql_query($query5) or die('Query failed: ' . mysql_error());
  $row5 = mysql_fetch_array($result5);
  $page_setting = $row5["setting_value"];

  //calculate num pages;
  //to and from
  $start = $_GET[page]*$page_setting;
  $end   = $page_setting;
  }

# Perform database query
$query = "SELECT * from thread where thread_board_id=".$board_id." order by thread_id DESC limit ". $start.','.$end;
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
    if($count==1){
        $moderator=true;
    }
}

echo "<h1>".$result2->board_title."</h1>";


# Filter through rows and echo desired information
if ($result){
  while ($row = mysql_fetch_object($result)) {
 //var_dump($row);
      // if thread is already locked, echo unlock icon
//
$replyQuery = "SELECT * from reply where reply_thread_id=".$row->thread_id;
$replyResult = mysql_query($replyQuery) or die('Query failed: ' . mysql_error());
$replyCount = mysql_num_rows($replyResult);

if ($replyCount<2)
    $threadSuffix= " Comment";
else
    $threadSuffix = " Comments";
      if ($row->thread_frozen == false){
        echo $thread= <<< EOD
        <div class="frozen">This thread is locked!</div>
        <div class="thread">
          <h3><a href="replies.php?&thread=$row->thread_name&id=$row->thread_id&page=0">$row->thread_name</a></h3>
          <h6>OP: <a href="">$row->thread_user</a></h6> <h6>$replyCount $threadSuffix</h6> <h6>Posted on $row->thread_date</h6>
EOD;
if ($moderator){
        echo'<div class="setting pull-right">
            <a href=freeze.php?thread_id='.$row->thread_id.'><i class="fa fa-unlock"></i></a>
            <a href=delete.php?thread_id="'.$row->thread_id.'"><i class="fa fa-times"></i></a></div>';
        }
    }
      // else echo lock icon
      else{
        echo $thread=<<<EOD
        <div class="thread">
          <h3><a href="replies.php?&thread=$row->thread_name&id=$row->thread_id&page=0">$row->thread_name</a></h3>
          <h6>OP: <a href="">$row->thread_user</a></h6> <h6>$replyCount $threadSuffix</h6> <h6>Posted on $row->thread_date</h6>
EOD;
if ($moderator){
        echo'<div class="setting pull-right">
            <a href=freeze.php?thread_id='.$row->thread_id.'><i class="fa fa-lock"></i></a>
            <a href=delete.php?thread_id="'.$row->thread_id.'"><i class="fa fa-times"></i></a></div>';
          }
      }

echo'</div>';


}
}
else {
    echo "crud";
}
// adding new thread will go here lol



?>
<?php
//paginatinn at the bottom
$queryCount = "SELECT * from thread where thread_board_id=".$board_id;
$resultCount = mysql_query($queryCount) or die('Query failed: ' . mysql_error());
$count = mysql_num_rows($resultCount);

echo'<ul class="pagination">';
for ($i = 0; $i < ($count/$page_setting); $i++) {
echo '<li><a href="forum.php?board_id='.$board_id.'&page='.$i.'">'.$i.'</a></li>';
  }
echo '</ul>';
if (isset($_COOKIE['user']))
    $moderator=true;

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
          <form method="post" action="<?php echo 'insert.php?board_id='.$_GET["board_id"]; ?>">
            <input name="thread_name" type="text" placeholder="Enter Title"></input><br>
            <textarea name="thread_description" placeholder="Enter Description"></textarea>
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
