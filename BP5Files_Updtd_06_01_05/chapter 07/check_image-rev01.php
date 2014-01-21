<?php
//connect to the database
$link = mysql_connect("localhost", "bp5am", "bp5ampass")
  or die("Could not connect: " . mysql_error());
mysql_select_db("moviesite", $link) 
  or die (mysql_error());

//make variables available
$image_caption = $_POST['image_caption'];
$image_username = $_POST['image_username'];
$image_tempname = $_FILES['image_filename']['name'];
$today = date("Y-m-d");

//upload image and check for image type
//make sure to change your path to match your images directory
$ImageDir ="c:/Program Files/Apache Group/Apache2/test/images/";
$ImageName = $ImageDir . $image_tempname;

if (move_uploaded_file($_FILES['image_filename']['tmp_name'], 
                       $ImageName)) {

  //get info about the image being uploaded
  list($width, $height, $type, $attr) = getimagesize($ImageName);

  switch ($type) {
    case 1:
      $ext = ".gif";
      break;
    case 2:
      $ext = ".jpg";
      break;
    case 3:
      $ext = ".png";
      break;
    default:
      echo "Sorry, but the file you uploaded was not a GIF, JPG, or " .
           "PNG file.<br>";
      echo "Please hit your browser's 'back' button and try again.";
  }

   //insert info into image table

  $insert = "INSERT INTO images
            (image_caption, image_username, image_date)
            VALUES
            ('$image_caption', '$image_username', '$today')";
  $insertresults = mysql_query($insert)
    or die(mysql_error());

  $lastpicid = mysql_insert_id();

  $newfilename = $ImageDir . $lastpicid . $ext;

  rename($ImageName, $newfilename);

}

?>

<html>
<head>
<title>Here is your pic!</title>
</head>
<body>
<h1>So how does it feel to be famous?</h1><br><br>
<p>Here is the picture you just uploaded to our servers:</p>
<img src="images/<?php echo $lastpicid . $ext; ?>" align="left">
<strong><?php echo $image_name; ?></strong><br>
This image is a <?php echo $ext; ?> image.<br>
It is <?php echo $width; ?> pixels wide 
and <?php echo $height; ?> pixels high.<br>
It was uploaded on <?php echo $today; ?>.
</body>
</html>
