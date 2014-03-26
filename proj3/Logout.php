<?php
session_start();
session_destroy();
setcookie("user", NULL, time()-3600);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
