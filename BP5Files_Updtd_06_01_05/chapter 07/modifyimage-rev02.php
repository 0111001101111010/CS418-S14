<?php

//connect to the database
$link = mysql_connect("localhost", "bp5am", "bp5ampass")
  or die("Could not connect: " . mysql_error());
mysql_select_db("moviesite", $link) 
  or die (mysql_error());


//make variables available
$id = $_POST['id'];
if (isset($_POST['bw'])) {
  $bw = $_POST['bw'];
} else {
  $bw = '';
}
$action = $_POST['action'];
//**INSERT THE FOLLOWING LINE:
if (isset($_POST['text'])) {
  $text = $_POST['text'];
} else {
  $text = '';
}
//**END OF INSERT

//get info on the pic we want
$getpic = mysql_query("SELECT * FROM images WHERE image_id = '$id'")
  or die(mysql_error());
$rows = mysql_fetch_array($getpic);
extract($rows);

$image_filename = "images/" . $image_id . ".jpg";

list($width, $height, $type, $attr) = getimagesize($image_filename);

$image = imagecreatefromjpeg("$image_filename");

if ($bw == 'on') {
  imagefilter($image, IMG_FILTER_GRAYSCALE);
}

//**INSERT THE FOLLOWING LINES:
if ($text == 'on') {
  imagettftext($image, 12, 0, 20, 20, 0, "arial.ttf", $image_caption);
}
//**END OF INSERT

if ($action == "preview") {
  header("Content-type:image/jpeg");
  imagejpeg($image);
}

if ($action == "save") {
  imagejpeg($image, $image_filename);

  $url = "location:showimage.php?id=". $id . "&mode=change";
  header($url);
}

?>
