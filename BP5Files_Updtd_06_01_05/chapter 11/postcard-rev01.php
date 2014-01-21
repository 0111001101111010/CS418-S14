<html>
<head>
<title>Enter E-mail Data</title>
</head>
<body>
<form name="theform" method="post" action="sendmail.php">
<table>
  <tr>
    <td>To:</td>
    <td><input type="text" name="to" size="50"></td>
  </tr>
  <tr>
    <td>From:</td>
    <td><input type="text" name="from" size="50"></td>
  </tr>
  <tr>
    <td>Subject:</td>
    <td><input type="text" name="subject" size="50"></td>
  </tr>
  <tr>
    <td valign="top">Message:</td>
    <td>
      <textarea cols="60" rows="10" name="message"
      >Enter your message here</textarea>
    </td>
  </tr>
  <tr>
    <td></td>
    <td>
      <input type="submit" value="Send"> 
      <input type="reset" value="Reset the form">
    </td>
  </tr>
</table>
</form>
</body>
</html>
