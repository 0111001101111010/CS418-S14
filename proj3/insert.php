<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
include 'include/connect_database.php';

    if(isset($_POST['board_info'])){
    //board insert
    $tbl_name = "board";
    $query="INSERT into board (board_id,board_title,board_description) values (null,'".$_POST['board']."', '".$_POST['board_info']."')";
    $result=mysql_query($query);
    }
    else if(isset($_GET['replyto'])){
    //lets get the board id of the thread...
    //$_ID = thread
    $query2 = "SELECT * from thread where thread_id =". $_REQUEST['id'];
    $result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
    $result2 = mysql_fetch_array($result2);
    $board_id = $result2["thread_board_id"];

    $user = $_COOKIE['user'];
    //Reply insert
    $tbl_name = "reply";
    $query ="
    INSERT INTO reply(reply_id,reply_user,reply_thread_id,reply_reply_id,reply_reply_to_id,reply_title,reply_post,reply_date,reply_board_id)
      values (null,'".$user."',".$_GET[id].",0,0,'".$_REQUEST['reply_title']."','".$_REQUEST['reply']."',NOW(),".$board_id.");";
    $result=mysql_query($query);
// var_dump($query);
// var_dump($result);
//die();
    }
    else if(isset($_GET['board_id'])){

    $tbl_name = "thread";
//    $query="DELETE FROM thread WHERE thread_id={$_GET['thread_id']}";
    $query = 'INSERT INTO thread (thread_id, thread_board_id, thread_name,thread_description, thread_date) values (null,'.$_REQUEST['board_id'].',"'
          .$_REQUEST['thread_name'].'","'.$_REQUEST['thread_description'].'",NOW());';
    $result = mysql_query($query);
// echo($query);
// echo($result);
// die();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
