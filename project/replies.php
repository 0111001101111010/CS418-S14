<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php 
$query = "SELECT * from reply where reply_thread_id =".$_REQUEST['id'];
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
        </div>




<?php
    # Filter through rows and echo desired information
    if ($result){
    while ($row = mysql_fetch_object($result)) {
        echo '<div class="wrapper wrapper_post">
               <div class="container">
                 <div class="row">
                    <div class="col-md-3"><img src="view/holder_150_150.png"><br><h3>'.
                    $row->reply_user.'</h3>'.' Posted at: '
             .$row->reply_date.'</div>
                      <div class="col-md-9">';//thread='.$row->thread_name.
        echo  '<h3>'.$row->reply_title.'</h3>'
             .' ' 
             .$row->reply_post;
        echo '</div>
            </div>
          </div>
        </div>';
    }
    }
    else {
        echo "crud";
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
