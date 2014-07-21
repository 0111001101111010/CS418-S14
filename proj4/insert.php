<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
include 'include/connect_database.php';
include 'util/resize.php';

    if(isset($_POST['board_info'])){
    //board insert
    $tbl_name = "board";
    $query="INSERT into board (board_id,board_title,board_description) values (null,'".$_POST['board']."', '".$_POST['board_info']."')";
    $result=mysql_query($query);
    }
    else if(isset($_GET['replyto'])){


//Insert Image

    /*image insertion*/

    /*** Upload***/

// echo "FOO";
// var_dump($_POST["pics0"]);
echo isset($FILE["pics0"]["name"]);
$images = "<br>";
    if(isset($_FILES["pics0"]["name"])){ // Checks if the form is submitted or not
echo "TESTTESTTEST";
      //$ext = pathinfo($_POST["pics0"], PATHINFO_EXTENSION);
      $ext = pathinfo($_FILES["pics0"]["name"], PATHINFO_EXTENSION);
      $file="uploads/".$_FILES["pics0"]["name"];//.$_FILES["image"]["name"];
      $file_alias = $_FILES["pics0"]["name"];
        move_uploaded_file($_FILES["pics0"]["tmp_name"],$file);
        echo"<font size = '5'><font color=\"#0CF44A\">SAVED<br></font>";
        //extention

        $sql="INSERT INTO image (image_id, user, path) VALUES (null,'$user','$file')" or die('Error: ' . mysql_error());;
        $img = create_cropped_thumbnail($file, 200, 200,'');
        if (!mysql_query($sql))
        {
           die('Error: ' . mysql_error());
         }
      $images = $images.'<img src="uploads/'.$file_alias.'"/><br>';

    }
    //lets get the board id of the thread...
    //$_ID = thread
    $query2 = "SELECT * from thread where thread_id =". $_REQUEST['id'];
    $result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
    $result2 = mysql_fetch_array($result2);
    $board_id = $result2["thread_board_id"];

    $user = $_COOKIE['user'];
    //Reply insert
    /**My Reply
    **/
    $myReply = $_REQUEST['reply'].$images;
    $tbl_name = "reply";
    $query ="
    INSERT INTO reply(reply_id,reply_user,reply_thread_id,reply_reply_id,reply_reply_to_id,reply_title,reply_post,reply_date,reply_board_id)
      values (null,'".$user."',".$_GET[id].",0,0,'".$_REQUEST['reply_title']."','".$myReply."',NOW(),".$board_id.");";

    $result=mysql_query($query) or die('Query failed: ' . mysql_error());;


    }
    else if(isset($_GET['board_id'])){
    $user = $_COOKIE['user'];
    $tbl_name = "thread";
//    $query="DELETE FROM thread WHERE thread_id={$_GET['thread_id']}";
    $query = 'INSERT INTO thread (thread_id, thread_board_id, thread_user, thread_name,thread_description, thread_date,thread_frozen) values (null,'.$_REQUEST['board_id'].',"'.$user.'","'
          .$_REQUEST['thread_name'].'","'.$_REQUEST['thread_description'].'",NOW(),true);';
    $result = mysql_query($query);
    var_dump($query);
    die();

}

header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
