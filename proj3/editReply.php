<?php include 'include/connect_database.php';?>
<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id

if(isset($_GET['id'])){
    $user = $_COOKIE["user"];
    //    $query="DELETE FROM thread WHERE thread_id={$_GET['thread_id']}";
    $query="SELECT * from reply where reply_id ={$_GET['id']}";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);

    // var_dump($row);
    $query='UPDATE reply SET
            reply_title="'.$_POST["reply_title"].'",
            reply_post = "'.$_POST["reply"].'",
            reply_editby="'.$user.'",
            reply_edited=true
            WHERE reply_id='.$_GET["id"];
    $result=mysql_query($query) or die('Query failed: ' . mysql_error());
var_dump($query);
var_dump($result);
 // var_dump($_POST);
 // die();
    echo "success!";
    echo "<h2><a href=".$_POST['url'].">Return to Post</a></h2>";
}
else{
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
}
?>
