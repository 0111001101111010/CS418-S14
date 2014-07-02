<?php
ob_start();
require 'CaptchasDotNet.php';

// See query.php for documentation

$captchas = new CaptchasDotNet ('demo', 'secret',
                                '/tmp/captchasnet-random-strings','3600',
                                'abcdefghkmnopqrstuvwxyz','6',
                                '240','80','000088');

// Read the form values
$message       = $_REQUEST['message'];
$password      = $_REQUEST['password'];
$random_string = $_REQUEST['random'];
?>


<?php
  // Check the random string to be valid and return an error message
  // otherwise.
  if (!$captchas->validate ($random_string))
  {
    echo 'The session key (random) does not exist, please go back and reload form.<br/>';
    echo 'In case you are the administrator of this page, ';
    echo 'please check if random keys are stored correct.<br/>';
    echo 'See http://captchas.net/sample/php/ "Problems with save mode"';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    header('refresh:5;url= ' . $_SERVER['HTTP_REFERER']);
    ob_flush();
  }
  // Check, that the right CAPTCHA password has been entered and
  // return an error message otherwise.
  elseif (!$captchas->verify ($password))
  {
    echo 'You entered the wrong password. Aren\'t you human? Sending you back!';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    header('refresh:10;url= ' . $_SERVER['HTTP_REFERER']);
    ob_flush();
  }
  // Return a success message
  else
  {
    echo 'Your message was verified to be entered by a human and is "' . $message . '"';
    //encapsualte the rest of the page here
  }
?>
