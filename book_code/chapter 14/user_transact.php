<?php
require('config.php');
require('class.SimpleMail.php');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
  or die('Could not connect to MySQL database. ' . mysql_error());

mysql_select_db(SQL_DB, $conn);

$headers = "From: " . ADMIN_EMAIL . "\r\n";

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
    case 'Remove':
      $sql = "SELECT user_id FROM ml_users " .
             "WHERE email='" . $_POST['email'] . "'";
      $result = mysql_query($sql, $conn);

      if (mysql_num_rows($result)) {
        $row = mysql_fetch_array($result);
        $user_id = $row['user_id'];
        $url = "http://" . $_SERVER['HTTP_HOST'] .
               dirname($_SERVER['PHP_SELF']) .
               "/remove.php?u=" . $user_id .
               "&ml=" . $_POST['ml_id'];
        header("Location: $url");
        exit();
      }
      $redirect = 'user.php';
      break;

    case 'Subscribe':
      $sql = "SELECT user_id FROM ml_users " .
             "WHERE email='" . $_POST['email'] . "'";
      $result = mysql_query($sql, $conn);

      if (!mysql_num_rows($result)) {
        $sql = "INSERT INTO ml_users " .
               "(firstname,lastname,email) ".
               "VALUES ('" . $_POST['firstname'] . "'," .
               "'" . $_POST['lastname'] . "'," .
               "'" . $_POST['email'] . "')";
        $result = mysql_query($sql, $conn);
        $user_id = mysql_insert_id($conn);
      } else {
        $row = mysql_fetch_array($result);
        $user_id = $row['user_id'];
      }

      $sql = "INSERT INTO ml_subscriptions (user_id,ml_id) " .
             "VALUES ('" . $user_id . "','" . $_POST['ml_id'] . "')";
      mysql_query($sql, $conn);

      $sql = "SELECT listname FROM ml_lists " .
             "WHERE ml_id=" . $_POST['ml_id'];
      $result = mysql_query($sql, $conn);
      $row = mysql_fetch_array($result);
      $listname = $row['listname'];

      $url = "http://" . $_SERVER['HTTP_HOST'] .
             dirname($_SERVER['PHP_SELF']) .
             "/user_transact.php?u=" . $user_id .
             "&ml=" . $_POST['ml_id'] . "&action=confirm";

      $subject = 'Mailing list confirmation';
      $body = "Hello " . $_POST['firstname'] . "\n" .
              "Our records indicate that you have subscribed to " .
             "the " . $listname . " mailing list.\n\n" .
              "If you did not subscribe, please accept our " .
              "apologies. You will not be subscribed if you do " .
              "not visit the confirmation URL.\n\n" .
              "If you subscribed, please confirm this by visiting " .
              "the following URL:\n" . $url;

      $mailmsg = new SimpleMail();
      $mailmsg->send($_POST['email'],$subject,$body,$headers);

      $redirect = "thanks.php?u=" . $user_id . "&ml=" .
                  $_POST['ml_id'] . "&t=s";
      break;

    case 'confirm':
      if (isset($_GET['u'], $_GET['ml'])) {
        $sql = "UPDATE ml_subscriptions SET pending=0 " .
               "WHERE user_id=" . $_GET['u'] .
               " AND ml_id=" . $_GET['ml'];
        mysql_query($sql, $conn);

        $sql = "SELECT listname FROM ml_lists " .
               "WHERE ml_id=" . $_GET['ml'];
        $result = mysql_query($sql, $conn);

        $row = mysql_fetch_array($result);
        $listname = $row['listname'];

        $sql = "SELECT * FROM ml_users " .
               "WHERE user_id='" . $_GET['u'] . "'";
        $result = mysql_query($sql, $conn);
        $row = mysql_fetch_array($result);
        $firstname = $row['firstname'];
        $email = $row['email'];

        $url = "http://" . $_SERVER['HTTP_HOST'] .
               dirname($_SERVER['PHP_SELF']) .
               "/remove.php?u=" . $_GET['u'] .
               "&ml=" . $_GET['ml'];

        $subject = 'Mailing List Subscription Confirmed';
        $body = "Hello " . $firstname . ",\n" .
                "Thank you for subscribing to the " .
                $listname . " mailing list. Welcome!\n\n" .
                "If you did not subscribe, please accept our " .
                "apologies.\n".
                "You can remove this subscription immediately by ".
                "visiting the following URL:\n" . $url;

        $mailmsg = new SimpleMail();
        $mailmsg->send($email,$subject,$body,$headers);

        $redirect = "thanks.php?u=" . $_GET['u'] . "&ml=" .
                    $_GET['ml'] . "&t=s";
      } else {
        $redirect = 'user.php';
      }
      break;

    default:
      $redirect = 'user.php';
  }
}

header('Location: ' . $redirect);

?>
