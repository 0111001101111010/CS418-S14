<?php //login
session_start();
$_SESSION['username'] = $_POST['user'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['authuser'] = 0;


?>
<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>

<div class="content">
	<div class="container">
		<h1>Admin Page</h1><hr>
		
		<h3>Users:</h3>
		<ul class="users">
			<li><span>Username</span><i class="fa fa-pencil" data-toggle="modal" data-target="#edituser"></i></li>
			<li><span>Username</span><i class="fa fa-pencil"></i></li>
			<li><span>Username</span><i class="fa fa-pencil"></i></li>
			<li><span>Username</span><i class="fa fa-pencil"></i></li>
			<li><span>Username</span><i class="fa fa-pencil"></i></li>
			<li><span>Username</span><i class="fa fa-pencil"></i></li>
			<li><span>Username</span><i class="fa fa-pencil"></i></li>
		</ul>

			
	</div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">User Role</h4>
        </div>
        <div class="modal-body">
          <h4>Board:</h4>
          <form>
            <select class="form-control">
			  <option value="1">Board 1</option>
			  <option value="2">Board 2</option>
			  <option value="3">Board 3</option>
			</select>
          </form>

          <h4>Role:</h4>
          <form>
            <select class="form-control">
			  <option value="1">Normal User</option>
			  <option value="2">Moderator</option>
			  <option value="3">Admin</option>
			</select>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-blue">Save</a>
        </div>
      </div>
    </div>
  </div>


<?php

?>
<?php include 'include/footer.php'; ?>
