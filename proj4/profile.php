<?php //login
session_start();
$_SESSION['username'] = $_POST['user'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['authuser'] = 0;


?>
<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?
  $user = $_GET['user'];

  //get # of posts
  # Perform database count user  boards
  $queryCount = "select * from reply where reply_user ='".$user."';";
  $resultCount = mysql_query($queryCount) or die('Query failed: ' . mysql_error());
  $posts = mysql_num_rows($resultCount);

  //date joined
  $queryDate = "SELECT * from users where user_name=".'"'.$user."\";";
  $resultDate = mysql_query($queryDate) or die('Query failed: ' . mysql_error());
  $date = mysql_fetch_object($resultDate)->user_date;

  if(!empty($_POST)){ // Checks if the form is submitted or not
     unlink("uploads/".$user.".jpg");
     $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
     $file="uploads/".$user.'.'.$ext;//.$_FILES["image"]["name"];
       move_uploaded_file($_FILES["image"]["tmp_name"],$file);
       echo"<font size = '5'><font color=\"#0CF44A\">SAVED<br></font>";
       //extention
       $sql="INSERT INTO image (image_id, user, path) VALUES (null,'$username','$file')" or die('Error: ' . mysql_error());;
       $img = create_cropped_thumbnail($file, 200, 200,'');
       if (!mysql_query($sql))
       {
          die('Error: ' . mysql_error());
        }
  }
?>

    </head>

    <body>

      <div class="content">
        <div class="container">
          <div class="board">
            <h3 style="display:inline"><?php echo $user; ?></h3> <a href="registration.html"><h4 style="display:inline">Edit Profile</h4></a>
            <hr>
            <div class="userbasic" style="padding:20px;background-color:#f4f4f4;margin-bottom:20px">
              <img src="uploads/<?php echo $user?>"style="border:3px solid #5CCDCC;vertical-align:top">
              <div class="info" style="display:inline-block;margin-left:10px">
                <h3 style="margin:0"></i> <?php echo $user ?></h3>
                <h6 style="margin-top:0"> <?php echo "Joined ".$date." |  Total Posts: ".$posts;  ?></h6>
                <?php
if($_COOKIE["user"]==$user){
echo $breadcrumb = <<< EOD
<form method="POST" class="form-horizontal" role="form" action="profile.php?&user=$user"  enctype="multipart/form-data">
  <label name="Profile picture" value = "profile"> profile picture, JPG, GIF, or PNG only please. </label>
  <input name="image" type="file" id="image" accept="image/gif,image/jpeg,image/png">
  <button type="submit" class="btn">Submit</button>
</form>
EOD;
}
?>
              </div>
            </div>

            <h3 style="display:inline">Recent Posts</h3> <hr>
            <div class="recentposts" style="height:300px;overflow:auto;border:1px solid #d4d4d4;">
              <div style="background-color:#fff;padding:12px;">
                <a href="">FriendFinder for ODU students</a>
                <h6 style="margin-top:0">Original Posts: <a href="">szheng</a> | Posted on April 1, 2014 | Board: <a href="">Cool Ideas</a></h6>
                <p>Sounds like a great idea!</p>
              </div>
              <div style="background-color:#eee;padding:12px;">
                <a href="">FriendFinder for ODU students</a>
                <h6 style="margin-top:0">Original Posts: <a href="">szheng</a> | Posted on April 1, 2014 | Board: <a href="">Cool Ideas</a></h6>
                <p>Sounds like a great idea!</p>
              </div>
            </div>
          </div>


        </div>
      </div>

    </body>
</html>

<?php include 'include/footer.php'; ?>
