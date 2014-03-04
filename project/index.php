<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>

<div class="content">
  <div class="container">

<?php
# Perform database query
$query = "SELECT * from board";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

//$stmt = $conn->prepare('SELECT * from thread');
//$stmt->execute();




# Filter through rows and echo desired information
if ($result){
  while ($row = mysql_fetch_object($result)) {
      echo $thread=<<<EOD
        <div class="board">
          <h2><a href="forum.php?&board_id=$row->board_id">$row->board_title</a></h2>
          <p>$row->board_description<p>
          <div class="info"><b>Moderators</b>: name, name</div>
        </div>
EOD;
  }
}
else {
    echo "crud";
}


?>


  <button class="btn btn-blue pull-right" data-toggle="modal" data-target="#newboard" >Create Board <i class="fa fa-plus-square"></i></button>


  <!-- Modal -->
  <div class="modal fade" id="newboard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">New Board</h4>
        </div>
        <div class="modal-body">
          <form>
            <input type="text" placeholder="Enter Board Title"></input><br>
            <textarea placeholder="Enter Description"></textarea>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-blue">Create</a>
        </div>
      </div>
    </div>
  </div>


  </div>
</div>
<?php include 'include/footer.php';?>
