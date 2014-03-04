<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
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
          <p>$row->board_description<p>
          <h3><a href="replies.php?&thread=$row->thread_name&id=$row->thread_id">$row->thread_name</a></h3>
          <h6>OP: <a href="profile.html">username</a></h6> <h6>Comments: # of comments</h6> <h6>Posted on $row->thread_date</h6>
        </div>
EOD;
  }
}
else {
    echo "crud";
}


?>
      <div class="content">
        <div class="container">
          <div class="board">
            <h2><a href="board.html">Programming Shit</a></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <div class="info"><b>Moderators</b>: mweigle, szheng</div>
          </div>

          <div class="board">
            <h2><a href="board.html">UX/UI Shit</a></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <div class="info"><b>Moderators</b>: mweigle, szheng</div>
          </div>

          <div class="board">
            <h2><a href="board.html">Ideas Shit</a></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <div class="info"><b>Moderators</b>: mweigle, szheng</div>
          </div>

        </div>
      </div>
<?php include 'include/footer.php';?>
