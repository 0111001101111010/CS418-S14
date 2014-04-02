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
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
