<?php
require('config.php');
?>
<html>
<head>
<title>Mailing List Signup</title>
</head>
<body>

<form method="post" action="user_transact.php">

<p>
  Sign up for Mailing List:<br />
</p>

<?php

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
  or die('Could not connect to MySQL database. ' . mysql_error());

mysql_select_db(SQL_DB, $conn);

if (isset($_GET['u'])) {
  $uid = $_GET['u'];
  $sql = "SELECT * FROM ml_users WHERE user_id = '$uid'";
  $result = mysql_query($sql)
    or die('Invalid query: ' . mysql_error());
  if (mysql_num_rows($result)) {
    $row = mysql_fetch_array($result);
    $email = $row['email'];
  } else {
    $email = "";
  }
} else {
  $email = "";
}
?>

<p>
  E-mail Address:<br />
  <input type="text" name="email" size="40" value="<?php echo 
    $email;?>"/>
</p>

<p>
  If you aren't currently a member, please provide 
  your name:<br /><br />
  First Name:<br />
  <input type="text" name="firstname" /><br />
  Last Name:<br />
  <input type="text" name="lastname" /><br />
</p>

<p>
  Select the mailing lists you want to receive:<br />
  <select name="ml_id">

<?php
$result = mysql_query("SELECT * FROM ml_lists ORDER BY listname")
  or die('Invalid query: ' . mysql_error());

while ($row = mysql_fetch_array($result)) {
  echo "    <option value=\"" . $row['ml_id'] . "\">" .
       $row['listname'] . "</option>\n";
}

?>
  </select>
</p>

<p>
  <input type="submit" name="action" value="Subscribe" />
</p>

</form>

</body>
</html>
