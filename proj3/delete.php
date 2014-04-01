<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
//remember to delete the attached threads,replies, to each result

include 'include/connect_database.php';
    if(isset($_GET['board_id'])){

    $tbl_name = "board";
//delete the board
    $query="DELETE FROM $tbl_name WHERE board_id={$_GET['board_id']}";
    $result=mysql_query($query);
//delete all the threads
    $query2="DELETE FROM thread WHERE thread_board_id={$_GET['board_id']}";
    var_dump($query2);
    $result2=mysql_query($query2) or die (mysql_error());
//delete all the replies
    $query3="DELETE FROM reply WHERE reply_board_id={$_GET['board_id']}";
    $result3=mysql_query($query3) or die (mysql_error());
    }
    else if(isset($_GET['reply_id'])){

    $tbl_name = "reply";
    $query="DELETE FROM reply WHERE reply_id={$_GET['reply_id']}";
    $result=mysql_query($query);
    }
    else if(isset($_GET['thread_id'])){

    $tbl_name = "thread";
    $query="DELETE FROM thread WHERE thread_id={$_GET['thread_id']}";
    $result=mysql_query($query) or die ("Error in query:".mysql_error());
    $query2="DELETE FROM reply WHERE reply_thread_id={$_GET['thread_id']}";
    $result2=mysql_query($query2) or die ("Error in query: $query2");
    //var_dump($query2);
    //var_dump($result2);
    //die();
      //  die();
  }
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
