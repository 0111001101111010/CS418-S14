<?php include 'include/header.php';?>
<?php include 'include/connect_database.php';?>
<?php include 'include/nav.php';?>

<br>
<br>
<br>
<br>
<h1> Search Results </h1>
<div class="content">
  <div class="container">

<?php
session_start();

  //get settings for pagination first
  $query5 = "SELECT * from settings";
  $result5 = mysql_query($query5) or die('Query failed: ' . mysql_error());
  $row5 = mysql_fetch_array($result5);
  $page_setting = $row5["setting_value"];

  //calculate num pages;
  //to and from
  $start = $_GET[page]*$page_setting;
  $end   = $page_setting;
  $user = $_COOKIE['user'];
  $url = "search.php";

//get query
  $queryCount = "SELECT * from thread where MATCH(thread_name) AGAINST('".$_POST['search']."') ORDER BY thread_name DESC";
//  var_dump($queryCount);
echo "\n\n\n";
  $resultCount = mysql_query($queryCount) or die('Query failed: ' . mysql_error());
  // $resultSearch = mysql_fetch_object($resultCount);
  // var_dump($resultSearch);
  $counting = 1;
  while ($row = mysql_fetch_object($resultCount)) {
    echo "<h2>".$counting.". <a href=replies.php?&thread=".urlencode($row->thread_name)."&id=".$row->thread_id."&page=0>".$row->thread_name."->".$row->thread_description."</a></h2><br>";
    $counting++;
  }
  $count = mysql_num_rows($resultCount);


  // $query = "SELECT * from reply where reply_thread_id =".$_REQUEST['id']." limit ". $start.','.$end;
  // $result = mysql_query($query) or die('Query failed: ' . mysql_error());
  // //var_dump($query);
  // //die();
  // $queryCount = "SELECT * from reply where reply_thread_id =".$_REQUEST['id'];
  // $resultCount = mysql_query($queryCount) or die('Query failed: ' . mysql_error());
  // $count = mysql_num_rows($resultCount);
//paginatinn at the bottom
echo'<ul class="pagination">';
for ($i = 0; $i < ($count/$page_setting); $i++) {
echo '<li><a href="'.$url.'&page='.$i.'">'.$i.'</a></li>';
  }
echo '</ul>';
?>
 </div>
</div>
<?php include 'include/footer.php';?>
