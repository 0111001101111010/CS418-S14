<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
include 'include/connect_database.php';
    if(isset($_POST['level'])){
    var_dump($_POST);
    die();
    $tbl_name = "board";
    $query="DELETE FROM $tbl_name WHERE board_id={$_GET['board_id']}";
    $result=mysql_query($query);
    }
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
