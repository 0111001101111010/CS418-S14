<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php
session_start();
$query = "SELECT * from reply where reply_thread_id =".$_REQUEST['id'];
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
$query2 = "SELECT * from thread where thread_id =".$_REQUEST['id'];
$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
?>

  <div class="content">
    <div class="container">

      <div class="post">
        <h3><?php echo $_REQUEST['thread']?></h3>
        <h6>OP: <a href="profile.html">anonymous</a></h6> <h6><?php echo mysql_fetch_object($result2)->thread_date;?></h6>
        <p><?php echo mysql_fetch_object($result2)->thread_description;?> </p>
      </div>

      <hr>



<?php
//to and from
$start =0;
$end   =5;
$count = mysql_num_rows($result);

//print_r(mysql_fetch_array($result));
//die();
$url = "replies.php?thread=".urlencode($_GET[thread]).'&id='.$_GET[id];

//var_dump(mysql_fetch_object($result));
//die();
//if it has been specified reset these points
/*
#TODO some crazy ass shit
*/
if (isset($_GET['page'])){
  $start = 0+$_GET['page']*5;
  $end = 5+ $_GET['page']*5;
}
# Filter through rows and echo desired information
    if ($result){
      for($num=$start; $num<$end;$num++) {
      $row = mysql_fetch_array($result);
      //while ($row = mysql_fetch_object($result)) {
          echo '<div class="post"><h3>'.$row["reply_title"].'</h3><h6>OP: <a href="profile.html">'.$row["reply_user"].'</a></h6> <h6>Comments:# '. $num .' of   '.$count.'</h6>         <h6>Posted on '.$row["reply_date"].'</h6>
    <p>'.$row["reply_post"].'</p></div>'.
    '<p><a href="replyTo.php?foo=bar&bar=foo">Reply To</a>';

      }
    }
    else {
        echo "There are no replies yet, Add one now!g";
    }

echo'<div class="row"> <ul class="pagination">
  <li><a href="#">
    &laquo;
  </a></li>';
for ($i = 0; $i < ($count/5); $i++) {
echo '<li><a href="'.$url.'&page='.$i.'">'.$i.'</a></li>';
  }
echo '<li><a href="#">&raquo;</a></li></ul></div>';
/*
echo $pagination = <<<EOD
<div class="row">
<ul class="pagination">

  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>

</ul>
</div>
EOD;
*/
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
