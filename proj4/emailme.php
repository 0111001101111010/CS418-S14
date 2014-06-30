<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
include 'include/connect_database.php';

//if(isset($_GET['thread_id'])){
    //    $query="DELETE FROM thread WHERE thread_id={$_GET['thread_id']}";
    $query="SELECT * from users where user_email ='{$_POST['user_email']}'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    $num_rows = mysql_num_rows($result);
//check if this user with this email exists
    if($num_rows>0){
        $email = $_POST['user_email'];
        //discover their preference
    if ($row['user_preference']=="text/html")
        $type  = "text/html";
    else
        $type  = "text/plain";
    //email them their password
        if  ($type == "text/plain"){
            mail($email,
             "Forgot Password to HackChat!",
             "Your password was " .$row['user_password']);
            }
            else
            {
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            mail($email,
             "Forgot Password  to HackChat!",
            "<h1><b>Your password was " .$row['user_password']."</b></h1>",$headers );
            }
    }

header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
