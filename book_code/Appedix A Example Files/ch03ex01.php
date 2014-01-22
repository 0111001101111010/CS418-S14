<html><head><title>My Title</title></head>
<body>
<?php
if (isset($_POST[posted])) {
   echo "Thanks. Your first name is $_POST[first_name] and your last name is $_POST[last_name]";
} else {
?>
<h2>Please fill out this form</h2>
<form method="POST" action="<?php $PHP_SELF ?>">
<input type="hidden" name="posted" value="true">
First Name<input type="text" name="first_name"><br>
Last Name<input type="text" name="last_name">
<input type="submit" value="Send Info">
</form>
<?php
}
?>
</body>
</html>

