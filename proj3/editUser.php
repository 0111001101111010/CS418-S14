<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
//remember to delete the attached threads,replies, to each result

include 'include/connect_database.php';

if(isset($_GET["user"]) && isset($_GET["action"]) ){
    $user = $_COOKIE['user'];
    # Perform database query for users
    $query = "SELECT * from users where user_id={$_GET['user']}";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    $row = mysql_fetch_object($result);
    //var_dump($row);
    $type  = $row->user_preference;
    $email = $row->user_email;

    if($_GET['action']=="delete"){

     $tbl_name = "users";
// //delete the board
     $query="DELETE FROM $tbl_name WHERE user_id={$_GET['user']}";
     $result=mysql_query($query);
    }
    else if($_GET['action']=="suspend"){
    //if else delet e
        $query="UPDATE users SET user_suspended=true  WHERE user_id={$_GET['user']} and user_suspended=false";
        $result=mysql_query($query) or die('Query failed: ' . mysql_error());
    }
    else if($_GET['action']=="unsuspend"){
        $query="UPDATE users SET user_suspended=false  WHERE user_id={$_GET['user']}
        and user_suspended=true";
        $result=mysql_query($query) or die('Query failed: ' . mysql_error());
    }

    //email an outcome
    if  ($type != "text/plain"){
        echo "text";
        $msg = "You have been ". $_GET['action'] ."from Hackchat, email hackchat@cs.odu.edu if you have any questions";
            mail($email,"Notice from HackChat!",$msg);
    }
    else{
        echo "html";
        $msg ="<h1><b>You have been". $_GET['action'] ."ed from Hackchat, email hackchat@cs.odu.edu if you have any questions</b></h1>";
            mail($email,"Notice from HackChat!", $msg);
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
