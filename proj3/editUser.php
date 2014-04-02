<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
//remember to delete the attached threads,replies, to each result

include 'include/connect_database.php';
    if($_GET['action']=="delete"){

     $tbl_name = "users";
// //delete the board
     $query="DELETE FROM $tbl_name WHERE user_id={$_GET['user']}";
     $result=mysql_query($query);
// //delete all the threads
//     $query2="DELETE FROM thread WHERE thread_board_id={$_GET['board_id']}";
//     var_dump($query2);
//     $result2=mysql_query($query2) or die (mysql_error());
// //delete all the replies
//     $query3="DELETE FROM reply WHERE reply_board_id={$_GET['board_id']}";
//     $result3=mysql_query($query3) or die (mysql_error());
    }
    else if($_GET['action']=="suspend"){
    echo "hello";
    //if else delet e
        $query="UPDATE users SET user_suspended=true  WHERE user_id={$_GET['user']} and user_suspended=false";
        $result=mysql_query($query) or die('Query failed: ' . mysql_error());
    }
    else if($_GET['action']=="unsuspend"){
        $query="UPDATE users SET user_suspended=false  WHERE user_id={$_GET['user']}
        and user_suspended=true";
        $result=mysql_query($query) or die('Query failed: ' . mysql_error());
    }
 //   die();
  //   else if(isset($_GET['thread_id'])){

  //   $tbl_name = "thread";
  //   $query="DELETE FROM thread WHERE thread_id={$_GET['thread_id']}";
  //   $result=mysql_query($query) or die ("Error in query:".mysql_error());
  //   $query2="DELETE FROM reply WHERE reply_thread_id={$_GET['thread_id']}";
  //   $result2=mysql_query($query2) or die ("Error in query: $query2");
  //   //var_dump($query2);
  //   //var_dump($result2);
  //   //die();
  //     //  die();
  // }
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
