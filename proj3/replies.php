<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>
<?php
session_start();

//get settings for pagination first
$query5 = "SELECT * from settings";
$result5 = mysql_query($query5) or die('Query failed: ' . mysql_error());
$row5 = mysql_fetch_array($result5);
$page_setting = $row5["setting_value"];

$query = "SELECT * from reply where reply_thread_id =".$_REQUEST['id'];
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

//calculate num pages;
//to and from
$start =0;
$end   = $page_setting;
$count = mysql_num_rows($result);

$query2 = "SELECT * from thread where thread_id =".$_REQUEST['id'];
$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
//get id agains
$query3 = "SELECT * from thread where thread_id =".$_REQUEST['id'];
$result3 = mysql_query($query3) or die('Query failed: ' . mysql_error());
//get thread ID
$query4 = "SELECT * from thread where thread_id =".$_REQUEST['id'];
$result4 = mysql_query($query4) or die('Query failed: ' . mysql_error());
// var_dump($row5);
// var_dump($page_setting);
// die();
$user = $_COOKIE['user'];
?>

  <div class="content">
    <div class="container">

      <div class="post">
        <h3><?php echo $_REQUEST['thread']?></h3>
        <h6>OP: <a href="#"><?php echo mysql_fetch_object($result4)->thread_user;?></a></h6> <h6><?php echo mysql_fetch_object($result2)->thread_date;?></h6>
        <p><?echo mysql_fetch_object($result3)->thread_description;
        ?> </p>
      </div>

      <hr>



<?php

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
  $start = 0+$_GET['page']*$page_setting;
  $end = $page_setting+ $_GET['page']*$page_setting;
}
# Filter through rows and echo desired information
    if ($result){
      for($num=$start; $num<$end;$num++) {
      $row = mysql_fetch_array($result);
      if ($row!=null){
          $id = $row['reply_id'];
          echo '<div class="post">
            <h3>'.$row["reply_title"].'</h3>
            <h6>OP: <a href="profile.html">'.$row["reply_user"].'</a></h6>
            <h6>Posted on '. date("\n l F jS Y @\t\t g:ia",strtotime("-45 minutes",strtotime($row["reply_date"]))) .'</h6>
        <p>'.$row["reply_post"].'</p>
        <br>';
        if ($row['reply_edited']==true){
            echo "edited by ". $row['reply_editby'];
        }

        echo'<div class="pull-right" style="font-size:20px; margin-top:-20px;">
          <a href="#"><i class="fa fa-reply"></i></a>';

        if ($user==$row['reply_user']){
            echo $buttons = <<<EOD
            <a href=""><i class="fa fa-pencil"></i></a>
            <a href=delete.php?reply_id="$id"><i class="fa fa-times"></i></a>
                </div>
            </div>
EOD;
        }
        else{
        echo "</div></div>";
        }
}

      }
    }
    else {
        echo "<h1>There are no replies yet, Add one now!</h1>";
    }

echo'<ul class="pagination">';
for ($i = 0; $i < ($count/$page_setting); $i++) {
echo '<li><a href="'.$url.'&page='.$i.'">'.$i.'</a></li>';
  }
echo '</ul>';
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
        <form method="post" action="insert.php?replyto='.urldecode($_GET[thread]).'&id='.$_GET[id].'" class="response">
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
  <!-- Modal for edit comments -->
  <div class="modal fade" id="newboard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">New Thread</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo 'insert.php?board_id='.$_GET["board_id"]; ?>">
            <input name="thread_name" type="text" placeholder="Enter Title"></input><br>
            <textarea name="thread_description" placeholder="Enter Description"></textarea>
            <div class="modal-footer">
              <input type="submit" class="btn btn-blue" value="Create"></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include 'include/footer.php';?>
