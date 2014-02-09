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
    # Filter through rows and echo desired information
    if ($result){
    echo '<ul>';
    while ($row = mysql_fetch_object($result)) {
        echo '<div class="wrapper wrapper_post">
               <div class="container">
                 <div class="row">
                    <div class="col-md-3"><img src="view/holder_150_150.png"><br><h3>'.
                    $row->reply_user.'</h3></div>
                      <div class="col-md-9">';//thread='.$row->thread_name.
        echo  '<h3>'.$row->reply_title.'</h3>'
             .' ' 
             .$row->reply_post.' posted at: '
             .$row->reply_date;
        echo '</div>
            </div>
          </div>
        </div>';
    }
    echo '</ul>';
    }
    else {
        echo "crud";
    }

//print_r($_GET); 
//print_r($_POST);

echo '<form method="post" action="submit.php?thread='.urldecode($_GET[thread]).'&id='.$_GET[id].'">
  <p>Enter your reply title: 
    <input type="text" name="reply_title">
  </p>
  <p>Enter your reply: 
    <textarea name="reply"></textarea>
  </p>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>'; 


?>

<?php include 'include/footer.php';?>