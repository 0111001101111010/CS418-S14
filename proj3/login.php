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
        <div class="checkbox"><input type="checkbox" value=1 name="checkbox" id="checkbox"> Remember Me</div>
        <hr>
        <div class="centerthing">
        <a class="btn btn-blue" name="signup" href="registration.php">Sign Up</a>
        <button type="submit" class="btn btn-blue" name="submit">Submit</button></div>
      </form>
      <br><br>
            <a href="#" data-toggle="modal" data-target="#forgotpassword">Forgot your password?</a>
    </div>
    <!--
		<div class="login">
        <form role="form" method="post" action="loginCheck.php">
        	<div class="inputs">
          		<input type="text" placeholder="Username" id="myusername"></input><br>
          		<input type="password" placeholder="Password" =myuserid></input>
        	</div>

        	<div class="checkbox"><input type="checkbox" value=1 name="checkbox" id="checkbox"> Remember Me</div>
        	<hr>
        	<center>
        		<a class="btn btn-blue" name="signup" href="registration.php" style="margin-right:20px">Sign up</a> <button type="submit" class="btn btn-blue" name="submit">Submit</button>
        	<br><br>
          	<a href="#" data-toggle="modal" data-target="#forgotpassword">Forgot your password?</a>
        	</center>
        </form>
    </div>-->


	</div>
</div>



<!-- Modal -->
  <div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Forgot Password?</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo 'insert.php?board_id='.$_GET["board_id"]; ?>">
            <input name="user_email" type="email" placeholder="Enter Your Email"></input><br>
            <div class="modal-footer">
              <input type="submit" class="btn btn-blue" value="Send"></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php

?>
<?php include 'include/footer.php'; ?>
