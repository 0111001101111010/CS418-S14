<?php //login
session_start();
$_SESSION['username'] = $_POST['user'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['authuser'] = 0;


?>
<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php
	# Perform database query for users
	$query = "SELECT * from users";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	# Perform database query boards
	$query2 = "SELECT * from board";
	$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());

?>

<div class="content">
	<div class="container">
		<h1>Admin Page</h1><hr>

<?php

# Filter through rows and echo desired information
if ($result && $result2){

echo '<h3>Users:</h3>
	<table class="users table table-striped"><tr><th>Username</th><th>
	Date Joined
	</th><th style="text-align:center"># Posts</th><th style="text-align:center"># Threads Created</th><th>Last Posted</th><th>Action</th></tr>';
while ($row = mysql_fetch_object($result)) {
	# Perform database user boards
	$query3 = "select * from reply where reply_user ='".$row->user_name."';";
	$result3 = mysql_query($query3) or die('Query failed: ' . mysql_error());
	$posts = mysql_num_rows($result3);

	//threads
	$query4 = "select * from thread where thread_user ='".$row->user_name."';";
	$result4 = mysql_query($query4) or die('Query failed: ' . mysql_error());
	$threads = mysql_num_rows($result4);

	//date last time
	$query5 = "select * from reply where reply_user ='".$row->user_name."' "."ORDER BY reply_date DESC;";
	$result5 = mysql_query($query5) or die('Query failed: ' . mysql_error());
	$lastTime = mysql_fetch_array($result5);

	// var_dump($query5);
	// var_dump($result5);
	// var_dump($lastTime["reply_date"]);
	//die();
	if ($lastTime["reply_date"] !=NULL)
		$time = $lastTime["reply_date"];
	else
		$time = "Not avaliable";

	echo '<tr><td><span>'.$row->user_name.'</span></td><td>'.$row->user_date.'</td><td style="text-align:center">'.$posts.'</td><td style="text-align:center">'.$threads.'</td><td>'.$time.'</td><td><i class="fa fa-pencil edituser" data-toggle="modal" data-target="#edituser" data-id="'.$row->user_name.'"></i>
	<a href="editUser.php?action=ban&user='.$row->user_id.'">
	<i class="fa fa-ban edituser"></i></a>
	<a href="editUser.php?action=delete&user='.$row->user_id.'">
	<i class="fa fa-trash-o edituser"></i></a>
	</td></tr>';
}
echo '</table></div></div>';
}
else {
		echo "crud";
}
?>
<!-- Modal -->
<script>
  $(document).on("click", ".edituser", function () {
     var username = $(this).data('id');
     //$(".modal-body #myModalLabel").val( username );
     document.getElementById("myModalLabel").innerHTML = "User Role: " + username;
		 $('input#user').val(username);
		console.log($('input#user').val());
});
</script>



  <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel" value=""></h4>
        </div>
        <div class="modal-body">
          <h4>Board:</h4>
			<form  method="post" action="updateadmin.php">
			<!-- THIS IS YOUR USER -->
			<input id="user" type="hidden" name="user" value="2" />
			<select name="board" class="form-control">
				<?php
					# Filter through rows and echo desired information
					if ($result2){
						while ($row = mysql_fetch_object($result2)) {
							echo '<option name="board" value="'.$row->board_id.'">'.$row->board_title.'</option>';

						}
					}
				?>
			</select>
          <h4>Role:</h4>
      <select name="level" class="form-control">
			  <option value="0">Normal User</option>
			  <option value="5">Moderator</option>
	  </select>
	  <br>
        <input type="radio" name="admin" value="true" checked="checked"> Administrator Status:<b>True</b><br>
        <input type="radio" name="admin" value="false"> Administrator Status:<b>False</b><br>
		<div class="modal-footer">
			<input type="submit" class="btn btn-blue" value="Update"></a>
		</div>
          </form>
        </div>
      </div>
    </div>
  </div>


<?php

?>
<?php include 'include/footer.php'; ?>
