<?php
require('config.php');

if (isset($_GET['o']) && is_numeric($_GET['o'])) {
  $ord = round(min(max($_GET['o'], 1), 3));
} else {
  $ord = 1;
}
$order = array(1 => 'alias ASC',
               2 => 'name ASC',
               3 => 'align ASC, alias ASC'
);

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
  or die('Could not connect to MySQL database. ' . mysql_error());
mysql_select_db(SQL_DB, $conn);

$sql = "SELECT c.id, p.power " .
       "FROM char_main c " .
       "JOIN char_power p " . 
       "JOIN char_power_link pk " .
       "ON c.id = pk.char_id AND p.id = pk.power_id";

$result = mysql_query($sql) 
  or die(mysql_error());
if (mysql_num_rows($result) > 0) {
  while ($row = mysql_fetch_array($result)) {
    $p[$row['id']][] = $row['power'];
  }
  foreach ($p as $key => $value) {
    $powers[$key] = implode(", ", $value);
  }
}

$sql = "SELECT c.id, n.alias " .
       "FROM char_main c " .
       "JOIN char_good_bad_link gb " .
       "JOIN char_main n " .
       "ON (c.id = gb.good_id AND n.id = gb.bad_id) " .
       "OR (n.id = gb.good_id AND c.id = gb.bad_id)";

$result = mysql_query($sql) 
  or die(mysql_error());
if (mysql_num_rows($result) > 0) {
  while ($row = mysql_fetch_array($result)) {
    $e[$row['id']][] = $row['alias'];
  }
  foreach ($e as $key => $value) {
    $enemies[$key] = implode(", ", $value);
  }
}
$table = "<table><tr><td align=\"center\">No characters " .
         "currently exist.</td></tr></table>";
?>
<html>
<head>
<title>Comic Book Appreciation</title>
</head>
<body>
<img src="CBA_Tiny.gif" align="left" hspace="10">
<h1>Comic Book<br>Appreciation</h1><br>
<h3>Character Database</h3>

<?php
$sql = "SELECT id, alias, real_name AS name, align " .
       "FROM char_main ORDER BY ". $order[$ord];

$result = mysql_query($sql) 
  or die(mysql_error());
if (mysql_num_rows($result) > 0) {
  $table = "<table border=\"0\" cellpadding=\"5\">";
  $table .= "<tr bgcolor=\"#FFCCCC\"><th>";
  $table .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?o=1\">Alias</a>";
  $table .= "</th><th><a href=\"" . $_SERVER['PHP_SELF'] . "?o=2\">";
  $table .= "Name</a></th><th><a href=\"" . $_SERVER['PHP_SELF'];
  $table .= "?o=3\">Alignment</a></th><th>Powers</th>";
  $table .= "<th>Enemies</th></tr>";

  // build each table row
  $bg = '';
  while ($row = mysql_fetch_array($result)) {
    $bg = ($bg=='F2F2FF'?'E2E2F2':'F2F2FF');
    $pow = ($powers[$row['id']]==''?'none':$powers[$row['id']]);
    if (!isset($enemies) || ($enemies[$row['id']]=='')) {
      $ene = 'none';
    } else {
      $ene = $enemies[$row['id']];
    }
    $table .= "<tr bgcolor=\"#" . $bg . "\">" .
              "<td><a href=\"charedit.php?c=" . $row['id'] . "\">" .
              $row['alias']. "</a></td><td>" .
              $row['name'] . "</td><td align=\"center\">" .
              $row['align'] . "</td><td>" . $pow . "</td>" .
              "<td align=\"center\">" . $ene . "</td></tr>";
  }

  $table .= "</table>";
  $table = str_replace('evil', 
                      '<font color="red">evil</font>',
                      $table);
  $table = str_replace('good',
                      '<font color="darkgreen">good</font>',
                      $table);

}
echo $table;
?>
<br /><a href="charedit.php">New Character</a> &bull;
<a href="poweredit.php">Edit Powers</a>
</body>
</html>
