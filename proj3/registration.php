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
  $register = $_GET['register'];
//var_dump(!empty($_POST));
  if($register == 1 && !empty($_POST)){ // Checks if the form is submitted or not
    //retrieve all submitted data from the form

    $flag = 0;

    $username = $_POST['username'];
    $username = strip_tags($username); //strip tags are used to take plain text only, in case the register-er inserts dangours scripts.
    $username = str_replace(' ', '', $username); // to remove blank spaces

    $password = $_POST['password'];
    $password = strip_tags($password);

    $email = $_POST['email'];
    if ($_POST['emailOptions']=='email1')
        $type  = "text/html";
    else
        $type  = "text/plain";
      //  die();
      //die();

    $sql = "SELECT user_id FROM users WHERE user_name='$username'"; // checking username already exists
    $qry = mysql_query($sql);
    $num_rows = mysql_num_rows($qry);

    $sql2 = "SELECT user_id FROM users WHERE user_email='$email'"; // checking username already exists
    $qry2 = mysql_query($sql2);
    $num_rows2 = mysql_num_rows($qry2);

    //alert if username already exists
    if($num_rows > 0) {
      echo '
      <div class="alert" id="1">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>username already exists!</strong> please choose another username
      </div>
      ';
      $flag++;
    }

    //alert if email already exists
    if($num_rows2 > 0) {
      echo '
      <div class="alert" id="2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>email already exists!</strong> please use another email or click \'forgot password\' to retrieve your password
      </div>
      ';
      $flag++;
    }

    if ($flag == 0){
      // if username doesn't exist insert new records to database
       $sql = "INSERT INTO users (user_id, user_name,user_password,user_email,user_date,user_suspended,user_preference) values (null,'$username', '$password', '$email',NOW(),FALSE,'$type')";
       $success = mysql_query($sql);
       // $qry = mysql_query($success);
      // var_dump($sql);
      // var_dump($success);// or die ("Error in query: $success. ".mysql_error());
     //s  die();
       //messages if the new record is inserted or not
      if($success) {
        echo '
        <div class="alert alert-success">
          Registration Successful ! please login to your account
        </div>';
             if  ($type == "text/plain"){
                    mail($email,
                     "Welcome to HackChat!",
                     "Congrats and junks...?");
            }
            else
            {
                    mail($email,
                     "Welcome to HackChat!",
                     "<h1>Congrats and junks...?</h1>");
            }
                    echo "Email sent woot.";

      }
      else {

        echo '
        <div class="alert" id="3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Registration Unsuccessful! </strong> please try again
        </div>
        ';
      }
    }
  }

;?>


<div class="content">
  <div class="container">
    <div class="board">
      <h2>New User Registration:</h2><br>
      *Please fill out every field. We only accept ODU's CS email at this time.
      <hr>
      <form method="POST" class="form-horizontal" role="form" action="registration.php?register=1">
        <input type="text" name="username" class="form-control" id="inputUsername" placeholder="User Name"><br>
        <input class="form-control" name="email" id="inputEmail" placeholder="CS Email"><br>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password"><br>
        <input type="password" class="form-control" id="inputPassword_confirm" placeholder="Confirm Password"><br>

        <input type="radio" name="emailOptions" value="email1" checked="checked"> Recieve email as text/html<br>
        <input type="radio" name="emailOptions" value="email2"> Recieve email as text/plain<br>

        <hr>
        <button type="submit" class="btn btn-blue">Submit</button>
      </form>
    </div>


  </div>
</div>

<!-- client side script for live form validation -->
<script type='text/javascript'>
  var inputUsername = new LiveValidation( "inputUsername", { validMessage: "Valid Username", wait: 500 } );
  inputUsername.add( Validate.Presence, { failureMessage: "Username Required" } );
  inputUsername.add( Validate.Length, { minimum: 6});

  var inputEmail = new LiveValidation( "inputEmail", { validMessage: "Valid Email!", wait: 500 } );
  inputEmail.add( Validate.Presence, { failureMessage: "Email Required" } );
  inputEmail.add( Validate.Email, { failureMessage: "Invalid email address!" } );
  inputEmail.add( Validate.Format, { pattern: /cs.odu.edu/i, failureMessage: "CS Email Only" } );

  var inputPassword = new LiveValidation( "inputPassword", { validMessage: "Valid Password!", wait: 500 } );
  inputPassword.add( Validate.Presence, { failureMessage: "Password Required" } );

  var inputPassword_confirm = new LiveValidation( "inputPassword_confirm", { validMessage: "Valid Password!", wait: 500 } );
  inputPassword_confirm.add( Validate.Presence, { failureMessage: "Password Comfirmation Required" } );
  inputPassword_confirm.add( Validate.Comfirmation, {match: 'inputPassword'});

</script>




<?php include 'include/footer.php'; ?>