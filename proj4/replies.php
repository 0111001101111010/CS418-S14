<?php include 'include/header.php';?>
<?php include 'include/connect_database.php';?>
<?php include 'include/nav.php';?>
<?php
session_start();

  //get settings for pagination first
  $query5 = "SELECT * from settings";
  $result5 = mysql_query($query5) or die('Query failed: ' . mysql_error());
  $row5 = mysql_fetch_array($result5);
  $page_setting = $row5["setting_value"];

  //calculate num pages;
  //to and from
  $start = $_GET[page]*$page_setting;
  $end   = $page_setting;

  $query = "SELECT * from reply where reply_thread_id =".$_REQUEST['id']." limit ". $start.','.$end;
  $result = mysql_query($query) or die('Query failed: ' . mysql_error());
  //var_dump($query);
  //die();
  $queryCount = "SELECT * from reply where reply_thread_id =".$_REQUEST['id'];
  $resultCount = mysql_query($queryCount) or die('Query failed: ' . mysql_error());
  $count = mysql_num_rows($resultCount);

  $query2 = "SELECT * from thread where thread_id =".$_REQUEST['id'];
  $result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
  //get id agains
  $query3 = "SELECT * from thread where thread_id =".$_REQUEST['id'];
  $result3 = mysql_query($query3) or die('Query failed: ' . mysql_error());
  //get thread ID
  $query4 = "SELECT * from thread where thread_id =".$_REQUEST['id'];
  $result4 = mysql_query($query4) or die('Query failed: ' . mysql_error());

  $query5 = "SELECT * from board where board_id =".$_GET['id'];
  $result5 = mysql_query($query5) or die('Query failed: ' . mysql_error());
  // var_dump($row5);
  // die();
  $user = $_COOKIE['user'];
?>

<div class="content">
  <div class="container">

<?php
  $returnResult4 = mysql_fetch_object($result4);
  //var_dump(mysql_fetch_object($result3)->thread_description);

  //mysql_fetch_object($result3)->thread_description
  $title = urldecode(mysql_fetch_object($result3)->thread_description);
  $whichBoard = $returnResult4->thread_board_id;
  $theThread=$returnResult4->thread_id;
  $urltitle= urlencode($_GET[thread]);
  echo $breadcrumb= <<< EOD
<h2>
  <a href=index.php>HackChat</a>->
  <a href=forum.php?board_id=$returnResult4->thread_board_id>..</a>->
  <a href=replies.php?$urltitle&thread=$urltitle&id=$theThread&page=0>$returnResult4->thread_name</a>
</h2>
EOD;

?>
<div class="post">
  <h3><?php echo $_REQUEST['thread']?></h3>
  <h6>Original Poster:
    <?php

    $threadUser = $returnResult4->thread_user;
    $whichBoard = $returnResult4->thread_board_id;

    # Perform database count user  boards
    $queryCount = "select * from reply where reply_user ='".$threadUser."';";
    $resultCount = mysql_query($queryCount) or die('Query failed: ' . mysql_error());
    $posts = mysql_num_rows($resultCount);

/* AM I A MODERATOR OR ADMIN?*/
  {//encapsulating
  $queryModerator = "SELECT * from moderator where moderator_name_id=".'"'.$threadUser.'" and moderator_board_id ='.$whichBoard;//.$_GET['id'];

  $resultModerator = mysql_query($queryModerator) or die('Query failed: ' . mysql_error());
  //$result3 = mysql_fetch_object($result3);
  //#moderator number
  //#is an ADMIN search ** this is different
  $queryAdmin = "SELECT * from users where user_name=".'"'.$threadUser."\";";
  $resultAdmin = mysql_query($queryAdmin) or die('Query failed: ' . mysql_error());
  $admin = mysql_fetch_object($resultAdmin)->user_admin;

  $user_level_array =mysql_fetch_object($resultModerator);
  $permission=mysql_num_rows($resultModerator);
  }
$moderator=$user_level_array->moderator_user_level;


  // // if not admin or mod
  // // if admin -- star
  if ($admin==true){
    echo '<i class="fa fa-star"></i> ';
  }
  // // if moderator -- bookmark
  else if ($moderator==true){
     echo '<i class="fa fa-bookmark"></i> ';
  }
  else {
    // if # of post is less than 10 -- user
   if ($posts >0 && $posts <5){
      echo '<i class="fa fa-user"></i> ';
   }
    // if # of post is between 10 and 50 -- coffee
    else if($posts>6 && $posts<9){
      echo '<i class="fa fa-coffee"></i> ';
    }
    // if # of post is greater than 50 -- check
    else if($posts>10){
      echo '<i class="fa fa-check-circle"></i> ';
    }
  }
 echo $threadUser?> </a></h6><h6>
 <?php echo mysql_fetch_object($result2)->thread_date;?></h6>
    <p><?echo mysql_fetch_object($result3)->thread_description;
    ?> </p>
  </div>

  <hr>



<?php

//print_r(mysql_fetch_array($result));
//die();
$url = "replies.php?thread=".urldecode($_GET[thread]).'&id='.$_GET[id];

if (isset($_GET['page'])){
  $start = 0+$_GET['page']*$page_setting;
  $end = $page_setting+ $_GET['page']*$page_setting;
}
# Filter through rows and echo desired information
if ($result){
  for($num=$start; $num<$end;$num++) {
    $row = mysql_fetch_array($result);
    if ($row!=null){
if ($_GET['edit']==$row['reply_id']){
  //insert.php?replyto='.urldecode($_GET[thread]).'
  echo '<div style="background:#C2E1E0;padding:20px;border:1px solid #fff">
  <form style="margin-bottom:50px" method="post" action=editReply.php?id='.$row['reply_id'].' class="response">
      <input id="url" type="hidden" name="url" value="'.$url.'" />
          <h3>Edit Title: </h3>
            <input type="text" name="reply_title" value="'.$row['reply_title'].'">
          <h3>Edit Comment: </h3>
            <textarea name="reply">'.$row['reply_post'].'</textarea><br><br>
            <a class="btn btn-blue pull-right" href="'.$url.'">Cancel</a>
            <input style="margin-right:10px;" type="submit" name="Submit" value="Edit" class="btn btn-blue pull-right">
  </form></div>';
}
else{
/**  row threads**/
//calculate
  /* AM I A MODERATOR OR ADMIN?*/
    {//encapsulating
    $queryModerator = "SELECT * from moderator where moderator_name_id='{$row['reply_user']}' and moderator_board_id ={$row['reply_board_id']}";
    //var_dump($queryModerator);

    $resultModerator = mysql_query($queryModerator) or die('Query failed: ' . mysql_error());
    //$result3 = mysql_fetch_object($result3);
    //#moderator number
    //#is an ADMIN search ** this is different
    $queryAdmin = "SELECT * from users where user_name='{$row['reply_user']}'";
    $resultAdmin = mysql_query($queryAdmin) or die('Query failed: ' . mysql_error());
    $admin = mysql_fetch_object($resultAdmin)->user_admin;

    $user_level_array =mysql_fetch_object($resultModerator);
    $permission=mysql_num_rows($resultModerator);
    }
// // if not admin or mod
// // if admin -- star
if ($admin==true){
  $icon = '<i class="fa fa-star"></i> ';
}
// // if moderator -- bookmark
else if ($permission==true){
   $icon ='<i class="fa fa-bookmark"></i>';
}
else {
  // if # of post is less than 10 -- user
  if ($posts >0 && $posts <10){
    $icon ='<i class="fa fa-user"></i> ';
  }
  // if # of post is between 10 and 50 -- coffee
  else if($posts>10 && $posts<50){
    $icon ='<i class="fa fa-coffee"></i> ';
  }
  // if # of post is greater than 50 -- check
  else if($posts>50){
    $icon ='<i class="fa fa-check-circle"></i> ';
  }
}


$id = $row['reply_id'];
    echo '<div class="post">
    <h3>'.$row["reply_title"].'</h3>
      <h6>User: <a href="">'.$icon.$row["reply_user"].'</a>
      </h6>
    <h6>Posted on '. date("\n l F jS Y @\t\t g:ia",strtotime("-45 minutes",strtotime($row["reply_date"]))) .'</h6>
        <p>'.$row["reply_post"].'</p>
        <br>';
    if ($row['reply_edited']==true){
    echo "edited by ". $row['reply_editby'];
    }
  /* IS VIEWER*/
    {//encapsulating
    $viewUser = $_COOKIE["user"];
    $queryModerator = "SELECT * from moderator where moderator_name_id=".'"'.$viewUser.'" and moderator_board_id ='.$whichBoard;//.$_GET['id'];

    $resultModerator = mysql_query($queryModerator) or die('Query failed: ' . mysql_error());
    //$result3 = mysql_fetch_object($result3);
    //#moderator number
    //#is an ADMIN search ** this is different
    $queryAdmin = "SELECT * from users where user_name=".'"'.$viewUser."\";";
    $resultAdmin = mysql_query($queryAdmin) or die('Query failed: ' . mysql_error());
    $admin = mysql_fetch_object($resultAdmin)->user_admin;

    $user_level_array =mysql_fetch_object($resultModerator);
    $permission=mysql_num_rows($resultModerator);
    }
    // check if person is logged in
        if(isset($_COOKIE["user"])){
          $user = $_COOKIE["user"];
          if ($viewUser==$row['reply_user'] || $moderator || $admin){
              echo $buttons = <<<EOD
              <div class="pull-right" style="font-size:20px; margin-top:-20px;">
              <a href=$url&edit=$id><i class="fa fa-pencil"></i></a>
              <a href=delete.php?reply_id=$id><i class="fa fa-times"></i></a>
              </div>

EOD;
                  }
               }
             }
             echo '</div> <!-- end of post?? -->';//end of editlogic
          }//end of if($row)
        //if is $reply_id=edit
      }//end of $row for loop
    }//end of if result
else {
    echo "<h1>There are no replies yet, Add one now!</h1>";
}

//paginatinn at the bottom
echo'<ul class="pagination">';
for ($i = 0; $i < ($count/$page_setting); $i++) {
echo '<li><a href="'.$url.'&page='.$i.'">'.$i.'</a></li>';
  }
echo '</ul>';

//javascript editor text
$js = <<< EOD

  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({selector:'textarea'});
  </script>
EOD;
echo $js;

//dont let people edit if its locked
    $queryX="SELECT * from thread where thread_id ={$_GET['id']}";
    $resultX = mysql_query($queryX);
    $rowX = mysql_fetch_array($resultX);
    $frozen = $rowX["thread_frozen"];

if (isset($_COOKIE['user'])&& ($frozen==true) && !$_GET['edit']){
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
