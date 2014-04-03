<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>

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
  $query = "SELECT * from board limit ". $start.','.$end;;
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
          <div class="info"><b>Moderators</b>
EOD;

      //print the moderators
      $query2 = "SELECT * from moderator where moderator_board_id=". $row->board_id." and moderator_user_level=5";
      //.$row->board_id;
      $result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());

      while ($record = mysql_fetch_object($result2)) {
        echo " " .$record->moderator_name_id. " ";
      }

      //if you're an admin
      if($_COOKIE['user']=='admin')
        echo '<div class="setting pull-right"><a href=""><i class="fa fa-pencil"></i></a> <a href=delete.php?board_id="'.$row->board_id.'"><i class="fa fa-times"></i></a></div>';

      echo "</div></div>";
    }

  }

  else {
      echo "crud";
  }

  if ($_COOKIE['user']=='admin'){
   echo '<button class="btn btn-blue pull-right" data-toggle="modal" data-target="#newboard" >Create Board <i class="fa fa-plus-square"></i></button>';
  }

?>
  <!-- Modal -->
  <div class="modal fade" id="newboard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">New Board</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="insert.php">
            <input name="board" type="text" placeholder="Enter Board Title"></input><br>
            <textarea name="board_info" placeholder="Enter Description"></textarea>

        <div class="modal-footer">
              <input type="submit" name="Submit" value="Create" class="btn btn-blue pull-right">
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>


  </div>
</div>
<?php
//paginatinn at the bottom
$queryCount = "SELECT * from board";
$resultCount = mysql_query($queryCount) or die('Query failed: ' . mysql_error());
$count = mysql_num_rows($resultCount);

echo'<ul class="pagination">';
for ($i = 0; $i < ($count/$page_setting); $i++) {
echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
  }
echo '</ul>';


 include 'include/footer.php';?>
