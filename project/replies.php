<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php
session_start();
$query = "SELECT * from reply where reply_thread_id =".$_REQUEST['id'];
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
$query2 = "SELECT * from thread where thread_id =".$_REQUEST['id'];
$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
$query3 = "SELECT * from thread where thread_id =".$_REQUEST['id'];
$result3 = mysql_query($query3) or die('Query failed: ' . mysql_error());

//var_dump($query2);
//die();
?>

  <div class="content">
    <div class="container">

      <div class="post">
        <h3><?php echo $_REQUEST['thread']?></h3>
        <h6>OP: <a href="profile.html">anonymous</a></h6> <h6><?php echo mysql_fetch_object($result2)->thread_date;?></h6>
        <h2><?echo mysql_fetch_object($result3)->thread_description;
        ?> </h2>
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
      if ($row!=null){
          $id = $row['reply_id'];
          echo '<div class="post">
            <h3>'.$row["reply_title"].'</h3>
            <h6>OP: <a href="profile.html">'.$row["reply_user"].'</a></h6> <h6>Comments:# '. $num  .' of   '.$count.'</h6>
            <h6>Posted on '.$row["reply_date"].'</h6>
        <p>'.$row["reply_post"].'</p>
        <br>
        <div class="pull-right" style="font-size:20px">
          <a href="#"><i class="fa fa-reply"></i></a>';
echo $buttons = <<<EOD
<a href=""><i class="fa fa-pencil"></i></a>
<a href=delete.php?reply_id="$id"><i class="fa fa-times"></i></a>
    </div>
</div>
EOD;
}

      }
    }
    else {
        echo "<h1>There are no replies yet, Add one now!</h1>";
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

if (isset($_COOKIE['user'])){
  echo '<hr>
        <form method="post" action="submit.php?thread='.urldecode($_GET[thread]).'&id='.$_GET[id].'" class="response">
          <h3>Reply title: </h3>
            <input type="text" name="reply_title">

          <h3>Comment: </h3>
            <textarea name="reply"></textarea><br><br>
            <input type="submit" name="Submit" value="Submit" class="btn btn-blue pull-right">

        </form>

      </div>
    </div>';
}


?>

<?php include 'include/footer.php';?>
