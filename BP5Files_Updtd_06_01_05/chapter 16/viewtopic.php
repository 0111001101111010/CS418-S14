<?php
require_once 'conn.php';
require_once 'functions.php';
require_once 'http.php';
if (!isset($_GET['t'])) redirect('index.php');
require_once 'header.php';

$topicid = $_GET['t'];
$limit = $admin['pageLimit']['value'];

showTopic($topicid, TRUE);

require_once 'footer.php';
?>
