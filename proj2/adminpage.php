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
	# Perform database query
	$query = "SELECT * from users";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	# Perform database query
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
	<ul class="users">';
while ($row = mysql_fetch_object($result)) {
	echo '';
	echo '<li><span>'.$row->user_name.'</span><i class="fa fa-pencil edituser" data-toggle="modal" data-target="#edituser" data-id="'.$row->user_name.'"></i></li>';
}
echo '</ul></div></div>';
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
			  <option value="10">Admin</option>
			</select>
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
