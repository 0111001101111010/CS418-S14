<?php

//connect to the database
$link = mysql_connect("localhost", "bp5am", "bp5ampass")
  or die("Could not connect: " . mysql_error());
mysql_select_db("moviesite", $link) 
  or die (mysql_error());


//make variables available
$id = $_REQUEST['id'];

//get info on the pic we want
$getpic = mysql_query("SELECT * FROM images WHERE image_id = '$id'")
  or die(mysql_error());
$rows = mysql_fetch_array($getpic);
extract($rows);

$image_filename = "images/" . $image_id . ".jpg";

list($width, $height, $type, $attr) = getimagesize($image_filename);

?>

<html>
<head>
<title>Here is your pic!</title>
</head>
<body>
<h1>So how does it feel to be famous?</h1><br><br>
<p>Here is the picture you just uploaded to our servers:</p>
<img src="<?php echo $image_filename; ?>" align="left" 
  <?php echo $attr; ?> >
<strong><?php echo $image_caption; ?></strong><br>
It is <?php echo $width; ?> pixels wide a
nd <?php echo $height; ?> pixels high.<br>
It was uploaded on <?php echo $image_date; ?> 
by <?php echo $image_username; ?>.
</body>
</html>
