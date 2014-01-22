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
$ImageDir ="c:/Program Files/Apache Group/Apache2/test/images/";
$ImageName = $ImageDir . $image_tempname;

if (move_uploaded_file($_FILES['image_filename']['tmp_name'], 
                      $ImageName)) {

  //get info about the image being uploaded
  list($width, $height, $type, $attr) = getimagesize($ImageName);

  //**delete these lines
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
  //**end of deleted lines

  //**insert these new lines
  if ($type > 3) {
    echo "Sorry, but the file you uploaded was not a GIF, JPG, or " .
         "PNG file.<br>";
    echo "Please hit your browser's 'back' button and try again.";
  } else {

    //image is acceptable; ok to proceed

  //**end of inserted lines

  //insert info into image table

  $insert = "INSERT INTO images
            (image_caption, image_username, image_date)
            VALUES
            ('$image_caption', '$image_username', '$today')";
  $insertresults = mysql_query($insert)
    or die(mysql_error());

  $lastpicid = mysql_insert_id();

  //change the following line:
  $newfilename =  $ImageDir . $lastpicid . ".jpg";

  //**insert these lines
  if ($type == 2) {
    rename($ImageName, $newfilename);
  } else {
    if ($type == 1) {
      $image_old = imagecreatefromgif($ImageName);
    } elseif ($type == 3) {
      $image_old = imagecreatefrompng($ImageName);
    }

    //"convert" the image to jpg
    $image_jpg = imagecreatetruecolor($width, $height);
    imagecopyresampled($image_jpg, $image_old, 0, 0, 0, 0, 
                     $width, $height, $width, $height);
    imagejpeg($image_jpg, $newfilename);
    imagedestroy($image_old);
    imagedestroy($image_jpg);
  }
  
  $url = "location: showimage.php?id=" . $lastpicid;
  header($url);
  //**end of inserted lines
}

?>

<!-- DELETE THESE LINES
<html>
<head>
<title>Here is your pic!</title>
</head>
<body>
<h1>So how does it feel to be famous?</h1><br><br>
<p>Here is the picture you just uploaded to our servers:</p>
<img src="images/<?php echo $lastpicid . $ext;  ?>" align="left">
<strong><?php echo $image_caption; ?></strong><br>
This image is a <?php echo $ext; ?> image.<br>
It is <?php echo $width; ?> pixels wide 
and <?php echo $height; ?> pixels high.<br>
It was uploaded on <?php echo $today; ?>.
</body>
</html>
END OF DELETED LINES-->
