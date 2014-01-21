<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">

<?php
$xmlstr = <<<XML
<php_programs>
   <program name="cart">
      <price>100</price>
   </program>
   <program name="survey">
      <price>500</price>
   </program>
</php_programs>
XML;

$first_xml_string = simplexml_load_string($xmlstr);

if (isset($_POST[posted])) {

   //capture which element to change, set to integer
   $element_to_change = (integer)$_POST[element_to_change];
   $change_value = $_POST[change_value];

   $first_xml_string->program[$element_to_change]->price = $change_value;
?>
<table width="100%" border="0" cellpadding="6">
    <tr> 
      <td><b><font face="Arial, Helvetica, sans-serif">Welcome to Beginning PHP5</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Chapter 08</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Exercise 01</font></b></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#EEEEEE"><font face="Arial, Helvetica, sans-serif" size="-1">XML File is:</font><br>
<?php
   echo "<pre>";
   var_dump($first_xml_string);
   echo "</pre>";
?>
</td></tr></table>
<?php
} else {


?>

<form method="POST" action="ch08ex01.php">
<input type="hidden" name="posted" value="true">
  <table width="100%" border="0" cellpadding="6">
    <tr> 
      <td><b><font face="Arial, Helvetica, sans-serif">Welcome to Beginning PHP5</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Chapter 08</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Exercise 01</font></b></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#EEEEEE"><font face="Arial, Helvetica, sans-serif" size="-1">XML File is:</font><br>
<?php

//display the XML file
echo "<pre>";
var_dump($first_xml_string);
echo "</pre>";

?>
    <tr> 
      <td colspan="3"> 
        
        <p><font face="Arial, Helvetica, sans-serif" size="-1">Please provide 
          the name of the element to change the value:</font></p>
        <table width="70%" border="0" cellpadding="6" align="center">
          <tr> 
            <td width="39%"><font face="Arial, Helvetica, sans-serif" size="-1">Top Level Element #</font></td>
            <td width="61%"><font face="Arial, Helvetica, sans-serif" size="-1">New 
              Value</font></td>
          </tr>
          <tr> 
            <td width="39%"> 
              <input type="text" name="element_to_change">
            </td>
            <td width="61%"> 
              <input type="text" name="change_value">
            </td>
          </tr>
          <tr align="right"> 
            <td colspan="2"> 
              <input type="submit" name="cmd' value="Change Value">
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form>
<?php
}
?>
</body>
</html>
