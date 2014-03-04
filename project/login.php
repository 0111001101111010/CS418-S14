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
			<form role="form" method="post" action="loginCheck.php">
				<div class="centerthing">
					<input type="text" id="username" placeholder="Enter your username" name="username">
					<input type="password" id="password" placeholder="Password" name="password">
				</div>
				<div class="checkbox"><input type="checkbox" value=""> Remember Me</div>
				<hr>
				<div class="centerthing">
				<a class="btn btn-blue" name="signup" href="index2.html">Sign Up</a>
				<button type="submit" class="btn btn-blue" name="submit">Submit</button></div>
			</form>
		</div>
			
	</div>
</div>
<?php

?>
<?php include 'include/footer.php'; ?>
