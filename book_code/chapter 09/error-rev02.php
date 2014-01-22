<?php
function email_admin($error_no, 
                    $error_output, 
                    $full_date, 
                    $full_time, 
                    $request_page) {
     
  $to = "Administrator <admin@yourdomain.com>";

  $subject = "Apache Error Generation";

  $body = "<html>";
  $body .= "<head>";
  $body .= "<title>Apache Error</title>";
  $body .= "</head>";
  $body .= "<body>";
  $body .= "Error occurred on <b>" . $full_date . "</b> " .
           "at <b>" . $full_time . "</b><br>";
  $body .= "Error received was a <b>" . $error_no . "</b> error.<br>";
  $body .= "The page that generated the error was: <b>" . 
           $request_page . "</b><br>";
  $body .= "The generated error message was:" . $error_output;
  $body .= "</body>";
  $body .= "</html>";
     
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
     
  $headers .= "From: Apache Error <host@yourdomain.com>\r\n";
  $headers .= "Cc: webmaster@yourdomain.com\r\n";
     
  mail($to, $subject, $body, $headers);
}

$date = getdate();
$full_date = $date['weekday'] . ", " . 
             $date['month'] . " " . 
             $date['mday'] . ", " . 
             $date['year'];
$full_time = $date['hours'] . ":" . 
             $date['minutes'] . ":" . 
             $date['seconds'] . ":" . 
             $date['year'];

$error_no = $_SERVER['QUERY_STRING'];
$request_page = $_SERVER['REQUEST_URI'];

switch ($error_no) {
  case 400:
    $error_output = "<h1>\"Bad Request\" Error Page - " .
                    "(Error Code 400)</h1>";
    $error_output .= "The browser has made a Bad Request<br>";
    $error_output .= "<a href=\"mailto:sysadmin@localhost.com\">" .
                     "Contact</a> the system administrator";
    $error_output .= " if you feel this to be in error";
          
    email_admin($error_no, 
               $error_output, 
               $full_date, 
               $full_time,
               $request_page);
    break;
     
  case 401:
    $error_output = "<h1>\"Authorization Required\" Error Page - " .
                    "(Error Code 401)</h1>";
    $error_output .= "You have supplied the wrong information to " .
                     "access a secure area<br>";
    $error_output .= "<a href=\"mailto:sysadmin@localhost.com\">" .
                     "Contact</a> the system administrator";
    $error_output .= " if you feel this to be in error";
          
    email_admin($error_no, 
               $error_output, 
               $full_date, 
               $full_time,
               $request_page);
    break;
     
  case 403:
    $error_output = "<h1>\"Forbidden Access\" Error Page - " .
                    "(Error Code 403)</h1>";
    $error_output .= "You are denied access to this area<br>";
    $error_output .= "<a href=\"mailto:sysadmin@localhost.com\">" .
                     "Contact</a> the system administrator";
    $error_output .= " if you feel this to be in error";
          
    email_admin($error_no, 
               $error_output, 
               $full_date, 
               $full_time,
               $request_page);
    break;
     
  case 404:
    $error_output = "<h1>\"Page Not Found\" Error Page - " .
                    "(Error Code 404)</h1>";
    $error_output .= "The page you are looking for " .
                     "cannot be found<br>";
    $error_output .= "<a href=\"mailto:sysadmin@localhost.com\">" .
                     "Contact</a> the system administrator";
    $error_output .= " if you feel this to be in error";
          
    email_admin($error_no, 
               $error_output, 
               $full_date, 
               $full_time,
               $request_page);
    break;
     
  case 500:
    $error_output = "<h1>\"Internal Server Error\" Error Page - " .
                    "(Error Code 500)</h1>";
    $error_output .= "The server has encountered " .
                     "an internal error<br>";
    $error_output .= "<a href=\"mailto:sysadmin@localhost.com\">" . 
                     "Contact</a> the system administrator";
    $error_output .= " if you feel this to be in error";
          
    email_admin($error_no, 
               $error_output, 
               $full_date, 
               $full_time,
               $request_page);
    break;
     
  default:
    $error_output = "<h1>Error Page</h1>";
    $error_output .= "This is the custom error Page<br>";
    $error_output .= "You should be <a href=\"index.php\">here</a>";
}
?>
<html>
<head>
<title>Beginning PHP5, Apache, MySQL Web Development</title>
</head>
<body>
<?php
echo $error_output;
?>
</body>
</html>
