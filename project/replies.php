<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php
session_start();
$query = "SELECT * from reply where reply_thread_id =".$_REQUEST['id'];
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
?>

  <div class="content">
    <div class="container">

      <div class="post">
        <h3><?php echo $_REQUEST['thread']?></h3>
        <h6>OP: <a href="profile.html">username</a></h6> <h6>Comments: # of comments</h6> <h6>Posted on mmm d, yyyy</h6>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>

      <hr>



<?php
    # Filter through rows and echo desired information
    if ($result){
      while ($row = mysql_fetch_object($result)) {
          echo '<div class="post"><h3>'.$row->reply_title.'</h3><h6>OP: <a href="profile.html">'.$row->reply_user.'</a></h6> <h6>Comments: # of comments</h6>         <h6>Posted on '.$row->reply_date.'</h6>
    <p>'.$row->reply_post.'</p></div>'.
    '<p><a href="replyTo.php?foo=bar&bar=foo">Reply To</a>';

      }
    }
    else {
        echo "There are no replies yet, Add one now!g";
    }

//print_r($_GET);
//print_r($_POST);
$js = <<< EOD

  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({selector:'textarea'});
  </script>
EOD;
echo $js;

  echo '<div class="wrapper wrapper_post" style="padding-bottom:50px">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form method="post" action="submit.php?thread='.urldecode($_GET[thread]).'&id='.$_GET[id].'">
              <h3>Enter your reply title: </h3>
                <input type="text" name="reply_title">

              <h3>Enter your reply: </h3>
                <textarea name="reply"></textarea><br><br>
                <input type="submit" name="Submit" value="Submit">

            </form>
          </div>
        </div>
      </div>
    </div>';



?>

<?php include 'include/footer.php';?>
