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
    else if(isset($_POST['thread_name'])){

    //thread insert
    $tbl_name = "reply";
    $query="INSERT into thread (thread_id,thread_board_id,thread_name,thread_description,thread_date) values (null,".$_GET[board_id].",'".$_POST['thread_name']."', '".$_POST['thread_description']."',"."NOW()".")";
    var_dump($query);
    //$query="DELETE FROM reply WHERE reply_id={$_GET['reply_id']}";
    //var_dump($query);
    //die();
    $result=mysql_query($query);
//echo($query);
//die();
    }
    else if(isset($_GET['thread_id'])){

    $tbl_name = "thread";
//    $query="DELETE FROM thread WHERE thread_id={$_GET['thread_id']}";
    $query = 'INSERT INTO thread (thread_id, thread_board_id, thread_name,thread_description, thread_date) values (null,'.$_REQUEST['board_id'].',"'
          .$_REQUEST['thread_name'].'","'.$_REQUEST['thread_description'].'",NOW());';
echo($query);
die();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
