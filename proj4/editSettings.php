<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
//remember to delete the attached threads,replies, to each result

include 'include/connect_database.php';
var_dump($_POST);
    if(isset($_POST['pagination'])){

    $query="UPDATE settings SET setting_value = {$_POST["pagination"]} WHERE setting_id=1";
    $result=mysql_query($query) or die('Query failed: ' . mysql_error());
    }
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
