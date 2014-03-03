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
		<div class="login">
			<div class="inputs">
				<form role="form" method="post" action="loginCheck.php">
					<div class="form-group">
						<label for="text">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Enter your username" name="username">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
					</div>
					<a class="btn btn-blue" name="signup" href="index2.html">Sign Up</a>
					<button type="submit" class="btn btn-blue" name="submit">Submit</button>
				</form>
			</div>
			<div class="checkbox"><input type="checkbox" value=""> Remember Me</div>
	</div>
</div>
<?php

?>
<?php include 'include/footer.php'; ?>
