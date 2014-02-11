<?php //login 
session_start();
$_SESSION['username'] = $_POST['user'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['authuser'] = 0;


?>
<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>


<div class="wrapper wrapper_login">
	<div class="row">
	  <div class="col-md-4 col-md-offset-4">
	    <h2>Log in</h2>
	    <form role="form" method="post" action="forum.php">
	      <div class="form-group">
	        <label for="text">Username</label>
	        <input type="text" class="form-control" id="text" placeholder="Enter your username" name="user">
	      </div>
	      <div class="form-group">
	        <label for="exampleInputPassword1">Password</label>
	        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
	      </div>
	      
	      <button type="submit" class="btn btn-default" name="submit">Submit</button>
	    </form>
	    
	  </div>

	</div>
</div>


<?php

?>
<?php include 'include/footer.php'; ?>