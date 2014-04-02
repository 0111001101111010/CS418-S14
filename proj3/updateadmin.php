<?php
ob_start();
//the most evil php file ever
//deletings anything that is passed into thread_id
include 'include/connect_database.php';
if(isset($_POST['level'])){
	$tbl_name = "moderator";
	$level = $_POST['level'];

	//delete it
	if ($_POST["admin"]=="true"){
		//actually go to user and adjust their boolean user.user_admin = true;
	    $query = "UPDATE users SET user_admin=true WHERE user_name='{$_POST['user']}'";
	    $result = mysql_query($query);
	}

	else if ($_POST["admin"]=="false"){
		//update to false
	    $query = "UPDATE users SET user_admin=false WHERE user_name='{$_POST['user']}'";
	    $result = mysql_query($query);
	}

	else{
		//set your levelness
		$query = "delete from $tbl_name where moderator_board_id={$_POST['board']} and moderator_name_id='{$_POST['user']}'";
		$result = mysql_query($query);
		
		//insert it
		$query2 = "insert into $tbl_name (moderator_id, moderator_name_id, moderator_board_id,moderator_user_level) values (null,'{$_POST['user']}',{$_POST['board']},{$_POST['level']})";
		$result2 = mysql_query($query2);
	}
		// die();
		//update
		/*
		    $query="UPDATE $tbl_name SET moderator_user_level={$_POST['level']} WHERE       moderator_board_id={$_POST['board']} and moderator_name_id='{$_POST['user']}'";
		    $result=mysql_query($query);

		// Mysql_num_row is counting table row
		//$count=mysql_num_rows($result);
		*/

}
header('Location: ' . $_SERVER['HTTP_REFERER']);
header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
ob_flush();
?>
