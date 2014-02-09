<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php 
$query = "SELECT * from reply where reply_thread_id =". $_REQUEST['id'];
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
 
?>

     <div class="thread_view">

        <div class="wrapper wrapper_thread_1">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1><?php echo $_REQUEST['thread']?></h1>
              </div>
            </div>
<?php
//print_r($_GET); 
echo "<br>";
//print_r($_POST);
$query ="
INSERT INTO reply(reply_id,reply_user,reply_thread_id,reply_title,reply_post,reply_date) 
  values (null,"."'test'".",".$_GET[id].",'".$_REQUEST['reply_title']."','".$_REQUEST['reply']."',NOW());";

$result = mysql_query($query) or die('Query failed: ' . mysql_error());
echo "<h2> your post was successful</h2>";


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

echo "<a href=replies.php?thread=".urlencode($_GET[thread]).'&id='.$_GET[id].">Return to Post</a>";
?>

<?php include 'include/footer.php';?>