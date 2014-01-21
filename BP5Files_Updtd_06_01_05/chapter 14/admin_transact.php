<?php
require('config.php');
require('class.SimpleMail.php');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
  or die('Could not connect to MySQL database. ' . mysql_error());

mysql_select_db(SQL_DB, $conn);

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'Add New Mailing List':
      $sql = "INSERT INTO ml_lists (listname) " .
             "VALUES ('" . $_POST['listname'] . "')";
      mysql_query($sql)
        or die('Could not add mailing list. ' . mysql_error());
      break;

    case 'Delete Mailing List':
      $sql = "DELETE FROM ml_lists WHERE ml_id=" . $_POST['ml_id'];
      mysql_query($sql)
        or die('Could not delete mailing list. ' . mysql_error());
      $sql = "DELETE FROM ml_subscriptions " .
             "WHERE ml_id=" . $_POST['ml_id'];
      mysql_query($sql)
        or die('Could not delete mailing list subscriptions. ' .
          mysql_error());
      break;

    case 'Send Message':
      if (isset($_POST['msg'], $_POST['ml_id'])) {
        if (is_numeric($_POST['ml_id'])) {
          $sql = "SELECT listname FROM ml_lists " .
                 "WHERE ml_id='" . $_POST['ml_id'] . "'";
          $result = mysql_query($sql, $conn)
            or die(mysql_error());
          $row = mysql_fetch_array($result);
          $listname = $row['listname'];
        } else {
          $listname = "Master";
        }

        $sql = "SELECT DISTINCT usr.email, usr.firstname, usr.user_id " .
               "FROM ml_users usr " .
               "INNER JOIN ml_subscriptions mls " .
               "ON usr.user_id = mls.user_id " .
               "WHERE mls.pending=0";
        if ($_POST['ml_id'] != 'all') {
          $sql .= " AND mls.ml_id=" . $_POST['ml_id'];
        }

        $result = mysql_query($sql) 
          or die('Could not get list of email addresses. ' . mysql_error());

        $headers = "From: " . ADMIN_EMAIL . "\r\n";
        
        while ($row = mysql_fetch_array($result)) {
          if (is_numeric($_POST['ml_id'])) {
            $ft = "You are receiving this message as a member of the ";
            $ft .= $listname . "\n mailing list. If you have received ";
            $ft .= "this e-mail in error, or would like to\n remove your ";
            $ft .= "name from this mailing list, please visit the ";
            $ft .= "following URL:\n";
            $ft .= "http://" . $_SERVER['HTTP_HOST'] .
                   dirname($_SERVER['PHP_SELF']) . "/remove.php?u=" .
                   $row['user_id'] . "&ml=" . $_POST['ml_id'];
          } else {
            $ft = "You are receiving this e-mail because you subscribed ";
            $ft .= "to one or more\n mailing lists. Visit the following ";
            $ft .= "URL to change your subscriptions:\n";
            $ft .= "http://" . $_SERVER['HTTP_HOST'] .
                   dirname($_SERVER['PHP_SELF']) . "/user.php?u=" .
                   $row['user_id'];
          }
     
          $msg = stripslashes($_POST['msg']) . "\n\n";
          $msg .= "--------------\n";
          $msg .= $ft;

          $email = new SimpleMail();

          $email->send($row['email'],
                      stripslashes($_POST['subject']),
                      $msg,
                      $headers) 
            or die('Could not send e-mail.');
        }
      }
      break;
  }
}

header('Location: admin.php');

?>
