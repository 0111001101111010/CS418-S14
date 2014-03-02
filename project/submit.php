<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php
session_start();
$query = "SELECT * from reply where reply_thread_id =". $_REQUEST['id'];
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

?>

     <div class="thread_view">

        <div class="wrapper wrapper_thread_1" >
          <div class="container" style="padding:50px">
            <div class="row">
              <div class="col-md-12">
                <h1><?php echo $_REQUEST['thread']?></h1>
              </div>
            </div>
<?php
//print_r($_GET);
echo "<br>";
$user = $_SESSION['myusername'];
//print_r($_POST); //0,0
$query ="
INSERT INTO reply(reply_id,reply_user,reply_thread_id,reply_reply_id,reply_reply_to_id,reply_title,reply_post,reply_date)
  values (null,'".$user."',".$_GET[id].",0,0,'".$_REQUEST['reply_title']."','".$_REQUEST['reply']."',NOW());";
//var_dump($query);
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
echo "<h2> Your post was successfully added</h2>";
//var_dump($_SESSION);
//var_dump($query);
//var_dump($_SESSION['username']);
/*echo '<form method="post" action="replies.php?thread='.urldecode($_GET[thread]).'&id='.$_GET[id].'">
  <p>Enter your reply title:
    <input type="text" name="reply_title">
  </p>
  <p>Enter your reply:
    <textarea name="reply"></textarea>
  </p>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>'; */

echo "<h2><a href=replies.php?thread=".urlencode($_GET[thread]).'&id='.$_GET[id].">Return to Post</a></h2>";
?>

<?php include 'include/footer.php';?>
