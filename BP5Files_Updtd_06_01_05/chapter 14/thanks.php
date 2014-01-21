<?php
require('config.php');
?>
<html>
<head>
<title>Thank You</title>
</head>
<body>

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
    $msg = "<h2>Thank You, " . $row['firstname'] . "</h2><br /><br />";
    $email = $row['email'];
  } else {
    die("No match for user id " . $uid);
  }
}

if (isset($_GET['ml'])) {
  $ml_id = $_GET['ml'];
  $sql = "SELECT * FROM ml_lists WHERE ml_id = '" . $ml_id . "'";
  $result = mysql_query($sql)
    or die('Invalid query: ' . mysql_error());
  if (mysql_num_rows($result)) {
    $row = mysql_fetch_array($result);
    $msg .= "Thank you for subscribing to the <i>" .
            $row['listname'] . "</i> mailing list.<br />";
  } else {
    die ("Could not find Mailing List $ml_id");
  }
} else {
  die ("Mailing List id missing.");
}

if (!isset($_GET['t'])) {
  die("Missing Type");
}

switch ($_GET['t']) {
  case 'c':
    $msg .= "A confirmation request has been sent " .
            "to <b>$email</b>.<br /><br />";
    break;
  case 's':
    $msg .= "A subscription notification has been " .
            "sent to you at <b>$email</b>.<br /><br />";
}
$msg .= "<a href='user.php?u=$uid'>" .
        "Return to Mailing List Signup page</a>";
echo $msg;
?>

</body>
</html>
