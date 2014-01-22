<?php
  $link = mysql_connect("localhost", "bp5am", "bp5ampass") 
    or die("Could not connect: " . mysql_error()); 
  mysql_select_db('moviesite', $link) 
    or die ( mysql_error()); 
  $peoplesql = "SELECT * FROM people";
   
  $result = mysql_query($peoplesql) 
    or die("Invalid query: " . mysql_error()); 
  while ($row = mysql_fetch_array($result)) {
    $people[$row['people_id']] = $row['people_fullname'];
  }
?>
<html>
<head>
<title>Add movie</title>
<style type="text/css">
TD{color:#353535;font-family:verdana}
TH{color:#FFFFFF;font-family:verdana;background-color:#336699}
</style>
</head>
<body>
<form action="commit.php?action=add&type=movie" method="post">
<table border="0" width="750" cellspacing="1" cellpadding="3" 
       bgcolor="#353535" align="center">
  <tr>
    <td bgcolor="#FFFFFF" width="30%">Movie Name</td>
    <td bgcolor="#FFFFFF" width="70%">
      <input type="text" name="movie_name">
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">Movie Type</td>
    <td bgcolor="#FFFFFF">
      <select id="game" name="movie_type" style="width:150px">
<?php
  $sql = "SELECT movietype_id, movietype_label " .
         "FROM movietype ORDER BY movietype_label";
  $result = mysql_query($sql)
    or die("<font color=\"#FF0000\">Query Error</font>" . 
           mysql_error());
  while ($row = mysql_fetch_array($result)) {
    echo '<option value="' . $row['movietype_id'] . '">' .
         $row['movietype_label'] . '</option>' . "\r\n";
  }
?>
      </select>

    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">Movie Year</td>
    <td bgcolor="#FFFFFF">
      <select name="movie_year">
        <option value="" selected>Select a year...</option>
<?php
  for ($year = date("Y"); $year >= 1970; $year--) {
?>
        <option value="<?php echo $year; ?>"><?php 
        echo $year; ?></option>
<?php
  }
?>
      </select>
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">Lead Actor</td>
    <td bgcolor="#FFFFFF">
      <select name="movie_leadactor">
        <option value="" selected>Select an actor...</option>
<?php
  foreach ($people as $people_id => $people_fullname) {
?>
        <option value="<?php echo $people_id; ?>" ><?php 
        echo $people_fullname; ?></option>
<?php
  }
?>
      </select>
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">Director</td>
    <td bgcolor="#FFFFFF">
      <select name="movie_director">
        <option value="" selected>Select a director...</option>
<?php
  foreach ($people as $people_id => $people_fullname) {
?>
        <option value="<?php echo $people_id; ?>" ><?php 
        echo $people_fullname; ?></option>
<?php
  }
?>
      </select>
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" colspan="2" align="center">
      <input type="submit" name="SUBMIT" value="Add">
    </td>
  </tr>
</table>
</form>
</body>
</html>
