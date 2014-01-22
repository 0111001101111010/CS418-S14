<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">

<?php

if (isset($_POST[posted])) {

   $phone_number = $_POST[phone_number];
   $ssn = $_POST[ssn];
   $gender = $_POST[gender];

   if ($phone_number != "") {
      if (ereg ("^([2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}|[2-9][0-9]{2}-[0-9]{4})$", $phone_number, $ph_numbers)) {
         echo "The Phone Number you entered ($phone_number) is valid.";
      } else {
         echo "The Phone Number you entered ($phone_number) is not valid.";
      }
   }

if ($ssn != "") {
      if (ereg ("^[0-9]{3}-[0-9]{2}-[0-9]{4}$", $ssn, $ssns)) {
         echo "The SSN you entered ($ssn) is valid.";
      } else {
         echo "The SSN you entered ($ssn) is not valid.";
      }
   }

if ($gender != "") {
      if (ereg ("^([M]|[F])$", $gender, $genders)) {
         echo "The Gender you entered ($gender) is valid.";
      } else {
         echo "The Gender you entered ($gender) is not valid.";
      }
   }
}
?>

<form method="POST" action="ch05ex01.php">
<input type="hidden" name="posted" value="true">
  <table width="100%" border="0" cellpadding="6">
    <tr> 
      <td><b><font face="Arial, Helvetica, sans-serif">Welcome to Beginning PHP5</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Chapter 05</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Exercise 01</font></b></td>
    </tr>
    <tr> 
      <td colspan="3"> 
        <p><font face="Arial, Helvetica, sans-serif" size="-1">Please validate 
          data with any of the following choices:</font></p>
        <table width="50%" border="0" cellpadding="6" align="center">
          <tr> 
            <td width="45%"><b><font face="Arial, Helvetica, sans-serif" size="-1">Type 
              of Data</font></b></td>
            <td width="55%"><b><font face="Arial, Helvetica, sans-serif" size="-1">Data</font></b></td>
          </tr>
          <tr> 
            <td width="45%"><font face="Arial, Helvetica, sans-serif" size="-1">US 
              Phone Numbers</font></td>
            <td width="55%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="phone_number">
              </font></td>
          </tr>
          <tr> 
            <td width="45%"><font face="Arial, Helvetica, sans-serif" size="-1">SSNs</font></td>
            <td width="55%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="ssn">
              </font></td>
          </tr>
          <tr> 
            <td width="45%"><font face="Arial, Helvetica, sans-serif" size="-1">Gender</font></td>
            <td width="55%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="gender">
              </font></td>
          </tr>
          <tr> 
            <td width="45%"><font face="Arial, Helvetica, sans-serif" size="-1"></font></td>
            <td width="55%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="submit" name="validate" value="Validate">
              </font></td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
</form>
</body>
</html>
