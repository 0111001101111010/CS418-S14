<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
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
$query = 'INSERT INTO thread (thread_id, thread_board_id, thread_name,thread_description, thread_date) values (null,0,"'
          .$_REQUEST['thread_name'].'","'.$_REQUEST['thread_description'].'",NOW());';


//echo $query;
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
echo "<h2> your thread was successfully added</h2>";
//var_dump($_SESSION);
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
// Print_r ($_SESSION);


echo "<h1><a href=forum.php>Click to Return to Threads</a></h1>";
?>

<?php include 'include/footer.php';?>