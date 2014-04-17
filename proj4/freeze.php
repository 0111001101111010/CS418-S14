<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
include 'include/connect_database.php';

if(isset($_GET['thread_id'])){
    //    $query="DELETE FROM thread WHERE thread_id={$_GET['thread_id']}";
    $query="SELECT * from thread where thread_id ={$_GET['thread_id']}";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);

    if ($row["thread_frozen"]==0){
        $query="UPDATE thread SET thread_frozen = true where thread_id ={$_GET['thread_id']}";
        $result = mysql_query($query);
    }
    else{
        $query="UPDATE thread SET thread_frozen = false where thread_id ={$_GET['thread_id']}";
        $result = mysql_query($query);
    }

}
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
