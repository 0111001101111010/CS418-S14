<?php
session_start();
include 'include/connect_database.php';
?>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hackchat</title>
<!--<script src="bower_components/jquery/jquery.min.js" type="text/javascript" charset="utf-8" async defer></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.js" type="text/javascript"></script>
</head>
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<link href="view/dist/css/style.css" rel="stylesheet">

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script type='text/javascript' src="js/livevalidation.js"></script>
</head>
<body>
 <div class="navbar navbarBlue navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="view/logo_white_30.png"> HackChat</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        <!--
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>-->
        </ul>
        <?php
if (isset( $_COOKIE['user'])){
    $user = $_COOKIE["user"];
    //check if they're an admin
    if(user){
        $queryAdmin = "SELECT * from users where user_name=".'"'.$user."\";";
        $resultAdmin = mysql_query($queryAdmin) or die('Query failed: ' . mysql_error());
        $admin = mysql_fetch_object($resultAdmin)->user_admin;
    }
        if ($admin){
          echo '<ul class="nav navbar-nav navbar-right">
                    <a href="index.php">Welcome '. $user .'</a><br>
                    <a href="adminpage.php" style="color:yellow">Admin Panel</a>
                    <a href="Logout.php">Logout</a>
                  </ul>
            </div>';
        }
        else{
          echo '<ul class="nav navbar-nav navbar-right">
                    <a href="index.php">Welcome '. $user .'</a><br>
                    <a href="Logout.php">Logout</a>
                  </ul>
            </div>';
        }
      }
        else {
          echo '<ul class="nav navbar-nav navbar-right">
            <a href="login.php">Log In</a>
               </ul>';
        }

            ?>
      </div><!--/.nav-collapse -->
    </div>
  </div>
