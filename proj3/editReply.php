<?php include 'include/connect_database.php';?>
<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id

if(isset($_GET['reply_id'])){
    //    $query="DELETE FROM thread WHERE thread_id={$_GET['thread_id']}";
    $query="SELECT * from reply where reply_id ={$_GET['reply_id']}";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
//    var_dump($row);
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
    die();
    // if ($row["thread_frozen"]==0){
    //     $query="UPDATE thread SET thread_frozen = true where thread_id ={$_GET['thread_id']}";
    //     $result = mysql_query($query);
    // }
    // else{
    //     $query="UPDATE thread SET thread_frozen = false where thread_id ={$_GET['thread_id']}";
    //     $result = mysql_query($query);
    // }

}
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
