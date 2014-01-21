<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<?php

//create the function to write the HTML tags
function createTags($field_name,$field_type)
{

   global $option_text01,$option_text02,$option_text03;
   global $option_value01,$option_value02,$option_value03;


   switch ($field_type) {

      case "text";
         $next_field = "<tr><td>$field_name:</td><td><input type='$field_type' name='$field_name'></td></tr>";
         break;

      case "radio";
         $next_field = "<tr><td>$field_name:</td><td><input type='$field_type' name='$field_name'></td></tr>";
         break;

      case "checkbox";
         $next_field = "<tr><td>$field_name:</td><td><input type='$field_type' name='$field_name'></td></tr>";
         break;

      case "hidden";
         $next_field = "<tr><td>$field_name:</td><td><input type='$field_type' name='$field_name'></td></tr>";
         break;

      case "textarea";
         $next_field = "<tr><td>$field_name:</td><td><textarea cols='40' name='$field_name'></textarea></td></tr>";
         break;

      case "select";
         $next_field = "<tr><td>$field_name:</td><td><select name='$field_name'>"
            ."<option value='$option_value01'>$option_text01</option>"
            ."<option value='$option_value02'>$option_text02</option>"
            ."<option value='$option_value03'>$option_text03</option>"
            ."</select></td></tr>";        

         break;

      default;
         break;

   }
   return $next_field;
}

if (isset($_POST[posted])) {

   //capture the values posted
   $field_name01 = $_POST[field_name01];
   $field_name02 = $_POST[field_name02];
   $field_name03 = $_POST[field_name03];
   $field_type01 = $_POST[field_type01];
   $field_type02 = $_POST[field_type02];
   $field_type03 = $_POST[field_type03];

   //check to see if we need to display the select options form

   if ($field_type01 == "select" or $field_type02 == "select" or $field_type03 == "select") {

      //display the Options form

      ?>
      <form method="POST" action="ch06ex01.php">
      <input type="hidden" name="posted01" value="true">
      <input type="hidden" name="field_name01" value="<?php echo $field_name01; ?>">
      <input type="hidden" name="field_name02" value="<?php echo $field_name02; ?>">
      <input type="hidden" name="field_name03" value="<?php echo $field_name03; ?>">
      <input type="hidden" name="field_type01" value="<?php echo $field_type01; ?>">
      <input type="hidden" name="field_type02" value="<?php echo $field_type02; ?>">
      <input type="hidden" name="field_type03" value="<?php echo $field_type03; ?>">  
        <table width="50%" border="0" cellpadding="6" align="center">
          <tr> 
            <td width="50%"><b><font face="Arial, Helvetica, sans-serif" size="-1">Option 
              Text</font></b></td>
            <td width="36%"><b><font face="Arial, Helvetica, sans-serif" size="-1">Option 
              Value</font></b></td>
          </tr>
          <tr> 
            <td width="50%"> 
              <input type="text" name="option_text01">
            </td>
            <td width="36%"> 
              <input type="text" name="option_value01">          
            </td>
          </tr>
          <tr> 
            <td width="50%"> 
              <input type="text" name="option_text02">
            </td>
            <td width="36%"> 
              <input type="text" name="option_value02">          
            </td>
          </tr>
          <tr> 
            <td width="50%"> 
              <input type="text" name="option_text03">
            </td>
            <td width="36%"> 
              <input type="text" name="option_value03">          
            </td>
          </tr>
          <tr> 
            <td width="50%">&nbsp;</td>
            <td width="36%"> 
              <input type="submit" name="create_form" value="Create Options">
            </td>
          </tr>
        </table>
      </form>
<?php

} else {
      
      //begin the table of fields
      $my_form = "<form method='POST' action='ch06ex01.php'><table width='50%' border='1'>";

      //construct and display the form made by the user
      if ($field_name01 != "" and $field_type01 != "") {
         $my_form .= createTags($field_name01,$field_type01);
      }
      if ($field_name02 != "" and $field_type02 != "") {
         $my_form .= createTags($field_name02,$field_type02);
      }
      if ($field_name03 != "" and $field_type03 != "") {
         $my_form .= createTags($field_name03,$field_type03);
      }

      //complete the table for fields
      $my_form .= "<tr><td><input type='submit' value='Send'></td></tr></table></form>";

      echo "$my_form";
   }
} else if (isset($_POST[posted01])) {

   //capture the values posted
   $field_name01 = $_POST[field_name01];
   $field_name02 = $_POST[field_name02];
   $field_name03 = $_POST[field_name03];
   $field_type01 = $_POST[field_type01];
   $field_type02 = $_POST[field_type02];
   $field_type03 = $_POST[field_type03];
   $option_text01 = $_POST[option_text01];
   $option_text02 = $_POST[option_text02];
   $option_text03 = $_POST[option_text03];
   $option_value01 = $_POST[option_value01];
   $option_value02 = $_POST[option_value02];
   $option_value03 = $_POST[option_value03];

   //begin the table of fields
   $my_form = "<form method='POST' action='ch06ex01.php'><table width='50%' border='1'>";

   //construct and display the form made by the user
   if ($field_name01 != "" and $field_type01 != "") {
      $my_form .= createTags($field_name01,$field_type01);
   }
   if ($field_name02 != "" and $field_type02 != "") {
      $my_form .= createTags($field_name02,$field_type02);
   }
   if ($field_name03 != "" and $field_type03 != "") {
      $my_form .= createTags($field_name03,$field_type03);
   }

   //complete the table for fields
   $my_form .= "<tr><td><input type='submit' value='Send'></td></tr></table></form>";

   echo "$my_form";
} else {
?>
<form method="POST" action="ch06ex01.php">
<input type="hidden" name="posted" value="true">
  <table width="100%" border="0" cellpadding="6">
    <tr> 
      <td><b><font face="Arial, Helvetica, sans-serif">Welcome to Beginning PHP5</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Chapter 06</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Exercise 01</font></b></td>
    </tr>
    <tr> 
      <td colspan="3"> 
        <p><font face="Arial, Helvetica, sans-serif" size="-1">Please fill out 
          the following field names and types to create your own HTML form.</font></p>
        <table width="50%" border="0" cellpadding="6" align="center">
          <tr> 
            <td width="50%"><b><font face="Arial, Helvetica, sans-serif" size="-1">Field 
              Name</font></b></td>
            <td width="36%"><b><font face="Arial, Helvetica, sans-serif" size="-1">Field 
              Type</font></b></td>
          </tr>
          <tr> 
            <td width="50%"> 
              <input type="text" name="field_name01">
            </td>
            <td width="36%"> 
              <select name="field_type01">
                <option value="text">Text</option>
                <option value="radio">Radio</option>
                <option value="checkbox">Checkbox</option>
                <option value="hidden">Hidden</option>
                <option value="select">Drop Down</option>
                <option value="textarea">TextArea</option>
              </select>
            </td>
          </tr>
          <tr> 
            <td width="50%"> 
              <input type="text" name="field_name02">
            </td>
            <td width="36%"> 
              <select name="field_type02">
                <option value="text">Text</option>
                <option value="radio">Radio</option>
                <option value="checkbox">Checkbox</option>
                <option value="hidden">Hidden</option>
                <option value="select">Drop Down</option>
                <option value="textarea">TextArea</option>
              </select>
            </td>
          </tr>
          <tr> 
            <td width="50%"> 
              <input type="text" name="field_name03">
            </td>
            <td width="36%"> 
              <select name="field_type03">
                <option value="text">Text</option>
                <option value="radio">Radio</option>
                <option value="checkbox">Checkbox</option>
                <option value="hidden">Hidden</option>
                <option value="select">Drop Down</option>
                <option value="textarea">TextArea</option>
              </select>
            </td>
          </tr>
          <tr> 
            <td width="50%">&nbsp;</td>
            <td width="36%"> 
              <input type="submit" name="create_form" value="Create Form">
            </td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </td>
    </tr>
  </table>
</form>
<?php
}
?>
</body>
</html>
