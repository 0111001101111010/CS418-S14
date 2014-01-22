<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<form method="POST" action="ch04ex01.php">
<?php
if (isset($_POST[pre_qualify])) {

   $display_table = "form02";

} elseif (isset($_POST[search_or_submit_resume])) {

   if ($_POST[search_or_submit] == "search") {
      $display_table = "form03";
   } else {
      $display_table = "form04";
   }

} elseif (isset($_POST[pick_this_job])) {

		$display_table = "form04";
} elseif (isset($_POST[submit_resume])) {
		$display_table = "form05";		
} else {
	$display_table = "form01";
}

switch ($display_table) {

	Case "form01";
	//display the initial form	
?>

  <table width="100%" border="0" cellpadding="6">
    <tr> 
      <td><b><font face="Arial, Helvetica, sans-serif">Welcome to Beginning PHP5</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Chapter 04</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Exercise 01</font></b></td>
    </tr>
    <tr> 
      <td colspan="3"> 
        <p><font face="Arial, Helvetica, sans-serif" size="-1">Please pre-qualify 
          yourself by answering the following questions:</font></p>
        <table width="70%" border="0" cellpadding="6" align="center">
          <tr>
            <td width="50%"><font size="-1" face="Arial, Helvetica, sans-serif"><b>Pre-Qualification 
              Form</b></font></td>
            <td width="14%">&nbsp;</td>
            <td width="36%">&nbsp;</td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">Please 
              select your level of education:</font></td>
            <td width="14%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="36%"><font face="Arial, Helvetica, sans-serif" size="-1">School 
              Name</font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">High 
              School</font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="checkbox" name="high_school_chk" value="yes">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="high_school">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">Trade 
              School</font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="checkbox" name="trade_shool_chk" value="yes">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="trade_school">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">Bachelor's 
              </font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="checkbox" name="bachelors_chk" value="yes">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="bachelors">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">Master's 
              </font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="checkbox" name="masters_chk" value="yes">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="masters">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">Doctorate 
              </font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="checkbox" name="doctorate_chk" value="yes">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="doctorate">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="14%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="36%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">Please 
              select your level of experience:</font></td>
            <td width="14%"><font face="Arial, Helvetica, sans-serif" size="-1">Years</font></td>
            <td width="36%"><font face="Arial, Helvetica, sans-serif" size="-1">Position/Title</font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="years01" size="5">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="position01">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="years02" size="5">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="position02">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="years03" size="5">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="position03">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="years04" size="5">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="position04">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="14%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="years05" size="5">
              </font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="position05">
              </font></td>
          </tr>
          <tr> 
            <td width="50%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="14%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td width="36%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="submit" name="pre_qualify" value="Proceed">
              </font></td>
          </tr>
        </table>
<?php
		break;
		
	Case "form02";
	
	//display the second form

?>

<input type="hidden" name="high_school_chk" value="<?php echo $_POST[high_school_chk]; ?>">
<input type="hidden" name="high_school" value="<?php echo $_POST[high_school]; ?>">
<input type="hidden" name="trade_school_chk" value="<?php echo $_POST[trade_school_chk]; ?>">
<input type="hidden" name="trade_school" value="<?php echo $_POST[trade_school]; ?>">
<input type="hidden" name="bachelors_chk" value="<?php echo $_POST[bachelors_chk]; ?>">
<input type="hidden" name="bachelors" value="<?php echo $_POST[bachelors]; ?>">
<input type="hidden" name="masters_chk" value="<?php echo $_POST[masters_chk]; ?>">
<input type="hidden" name="masters" value="<?php echo $_POST[masters]; ?>">
<input type="hidden" name="doctorate_chk" value="<?php echo $_POST[doctorate_chk]; ?>">
<input type="hidden" name="doctorate" value="<?php echo $_POST[doctorate]; ?>">
<input type="hidden" name="years01" value="<?php echo $_POST[years01]; ?>">
<input type="hidden" name="position01" value="<?php echo $_POST[position01]; ?>">
<input type="hidden" name="years02" value="<?php echo $_POST[years02]; ?>">
<input type="hidden" name="position02" value="<?php echo $_POST[position02]; ?>">
<input type="hidden" name="years03" value="<?php echo $_POST[years03]; ?>">
<input type="hidden" name="position03" value="<?php echo $_POST[position03]; ?>">
<input type="hidden" name="years04" value="<?php echo $_POST[years04]; ?>">
<input type="hidden" name="position04" value="<?php echo $_POST[position04]; ?>">
<input type="hidden" name="years05" value="<?php echo $_POST[years05]; ?>">
<input type="hidden" name="position05" value="<?php echo $_POST[position05]; ?>">

        <p>&nbsp;</p>
        <table width="70%" border="0" cellpadding="6" align="center">
          <tr>
            <td><font face="Arial, Helvetica, sans-serif" size="-1"><b>Search 
              Form</b></font></td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td><font face="Arial, Helvetica, sans-serif" size="-1">Search for 
              Jobs then Submit Resume 
              <input type="radio" name="search_or_submit" value="search">
              </font></td>
            <td><font face="Arial, Helvetica, sans-serif" size="-1">Submit Resume 
              and View Jobs 
              <input type="radio" name="search_or_submit" value="submit">
              </font></td>
          </tr>
          <tr> 
            <td><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="submit" name="search_or_submit_resume" value="Proceed">
              </font></td>
          </tr>
        </table>
<?php
		break;
	
	Case "form03";
	
	//display the third form
?>

<input type="hidden" name="high_school_chk" value="<?php echo $_POST[high_school_chk]; ?>">
<input type="hidden" name="high_school" value="<?php echo $_POST[high_school]; ?>">
<input type="hidden" name="trade_school_chk" value="<?php echo $_POST[trade_school_chk]; ?>">
<input type="hidden" name="trade_school" value="<?php echo $_POST[trade_school]; ?>">
<input type="hidden" name="bachelors_chk" value="<?php echo $_POST[bachelors_chk]; ?>">
<input type="hidden" name="bachelors" value="<?php echo $_POST[bachelors]; ?>">
<input type="hidden" name="masters_chk" value="<?php echo $_POST[masters_chk]; ?>">
<input type="hidden" name="masters" value="<?php echo $_POST[masters]; ?>">
<input type="hidden" name="doctorate_chk" value="<?php echo $_POST[doctorate_chk]; ?>">
<input type="hidden" name="doctorate" value="<?php echo $_POST[doctorate]; ?>">
<input type="hidden" name="years01" value="<?php echo $_POST[years01]; ?>">
<input type="hidden" name="position01" value="<?php echo $_POST[position01]; ?>">
<input type="hidden" name="years02" value="<?php echo $_POST[years02]; ?>">
<input type="hidden" name="position02" value="<?php echo $_POST[position02]; ?>">
<input type="hidden" name="years03" value="<?php echo $_POST[years03]; ?>">
<input type="hidden" name="position03" value="<?php echo $_POST[position03]; ?>">
<input type="hidden" name="years04" value="<?php echo $_POST[years04]; ?>">
<input type="hidden" name="position04" value="<?php echo $_POST[position04]; ?>">
<input type="hidden" name="years05" value="<?php echo $_POST[years05]; ?>">
<input type="hidden" name="position05" value="<?php echo $_POST[position05]; ?>">

<?php
      //retrieve a jobs list from the database
      $jobs_array[0]["title"] = "Marketing Manager";
      $jobs_array[0]["salary"] = 40000;
      $jobs_array[0]["years_experience_required"] = 2;
      $jobs_array[0]["degree_required"] = "Doctorate";
      $jobs_array[0]["commission"] = "No";
      $jobs_array[0]["job_id"] = "A";

      $jobs_array[1]["title"] = "Sales Manager";
      $jobs_array[1]["salary"] = 30000;
      $jobs_array[1]["years_experience_required"] = 1;
      $jobs_array[1]["degree_required"] = "Masters";
      $jobs_array[1]["commission"] = "Yes";
      $jobs_array[1]["job_id"] = "B";

      $jobs_array[2]["title"] = "Sales Associate";
      $jobs_array[2]["salary"] = 15000;
      $jobs_array[2]["years_experience_required"] = 0;
      $jobs_array[2]["degree_required"] = "High School";
      $jobs_array[2]["commission"] = "Yes";
      $jobs_array[2]["job_id"] = "C";
	  


		//display the jobs available form
?>


        <p>&nbsp;</p>
        <table width="70%" border="0" cellpadding="6" align="center">
          <tr> 
            <td colspan="6"><font face="Arial, Helvetica, sans-serif" size="-1"><b>The 
              Following Jobs Are Available</b></font></td>
          </tr>
          <tr> 
            <td><font face="Arial, Helvetica, sans-serif" size="-1">Title</font></td>
            <td><font face="Arial, Helvetica, sans-serif" size="-1">Salary</font></td>
            <td><font face="Arial, Helvetica, sans-serif" size="-1">Years Exp 
              Req.</font></td>
            <td><font face="Arial, Helvetica, sans-serif" size="-1">Ed. Required</font></td>
            <td><font face="Arial, Helvetica, sans-serif" size="-1">Commission</font></td>
            <td><font face="Arial, Helvetica, sans-serif" size="-1">Job ID</font></td>
          </tr>
          <?php
   for ($i=0;$i<=2;$i++) {
?>
          <tr> 
            <td><font face="Arial, Helvetica, sans-serif" size="-1"><?php echo $jobs_array[$i]["title"]; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif" size="-1">$<?php echo $jobs_array[$i]["salary"]; ?></font></td>
            <td align="center"><font face="Arial, Helvetica, sans-serif" size="-1"><?php echo $jobs_array[$i]["years_experience_required"]; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif" size="-1"><?php echo $jobs_array[$i]["degree_required"]; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif" size="-1"><?php echo $jobs_array[$i]["commission"]; ?></font></td>
            <td><input type="radio" name="job_applied_for" value="<?php echo $jobs_array[$i]["job_id"]; ?>"></td>
          </tr>
          <?php
   }
?>
          <tr align="right"> 
            <td colspan="6"><font face="Arial, Helvetica, sans-serif" size="-1">
              <input name="pick_this_job" type="submit" id="pick_this_job" value="Proceed">
              </font></td>
          </tr>
        </table>
<?php
   		break;
	
	Case "form04";
	
		//display the submit recume form
?>
<input type="hidden" name="high_school_chk" value="<?php echo $_POST[high_school_chk]; ?>">
<input type="hidden" name="high_school" value="<?php echo $_POST[high_school]; ?>">
<input type="hidden" name="trade_school_chk" value="<?php echo $_POST[trade_school_chk]; ?>">
<input type="hidden" name="trade_school" value="<?php echo $_POST[trade_school]; ?>">
<input type="hidden" name="bachelors_chk" value="<?php echo $_POST[bachelors_chk]; ?>">
<input type="hidden" name="bachelors" value="<?php echo $_POST[bachelors]; ?>">
<input type="hidden" name="masters_chk" value="<?php echo $_POST[masters_chk]; ?>">
<input type="hidden" name="masters" value="<?php echo $_POST[masters]; ?>">
<input type="hidden" name="doctorate_chk" value="<?php echo $_POST[doctorate_chk]; ?>">
<input type="hidden" name="doctorate" value="<?php echo $_POST[doctorate]; ?>">
<input type="hidden" name="years01" value="<?php echo $_POST[years01]; ?>">
<input type="hidden" name="position01" value="<?php echo $_POST[position01]; ?>">
<input type="hidden" name="years02" value="<?php echo $_POST[years02]; ?>">
<input type="hidden" name="position02" value="<?php echo $_POST[position02]; ?>">
<input type="hidden" name="years03" value="<?php echo $_POST[years03]; ?>">
<input type="hidden" name="position03" value="<?php echo $_POST[position03]; ?>">
<input type="hidden" name="years04" value="<?php echo $_POST[years04]; ?>">
<input type="hidden" name="position04" value="<?php echo $_POST[position04]; ?>">
<input type="hidden" name="years05" value="<?php echo $_POST[years05]; ?>">
<input type="hidden" name="position05" value="<?php echo $_POST[position05]; ?>">
<input type="hidden" name="job_applied_for" value="<?php echo $_POST[job_applied_for]; ?>">

        <p>&nbsp;</p>
        <table width="70%" border="0" cellpadding="6" align="center">
          <tr> 
            <td colspan="3"><font face="Arial, Helvetica, sans-serif" size="-1"><b>Resume 
              Form</b></font></td>
          </tr>
          <tr> 
            <td width="35%"><font face="Arial, Helvetica, sans-serif" size="-1">First, 
              Middle, Last Name</font></td>
            <td colspan="2" width="65%"><font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="first_name">
              <input type="text" name="mi" size="5">
              <input type="text" name="last_name">
              </font></td>
          </tr>
          <tr> 
            <td width="35%"><font face="Arial, Helvetica, sans-serif" size="-1">Address</font></td>
            <td colspan="2" width="65%"><font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="address">
              </font></td>
          </tr>
          <tr> 
            <td width="35%"><font face="Arial, Helvetica, sans-serif" size="-1">City, 
              State, Zip</font></td>
            <td colspan="2" width="65%"><font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="city">
              <input type="text" name="state" size="5">
              <input type="text" name="zip_code" size="10">
              </font></td>
          </tr>
          <tr> 
            <td width="35%"><font face="Arial, Helvetica, sans-serif" size="-1">Phone 
              Number</font></td>
            <td colspan="2" width="65%"><font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="text" name="phone">
              </font></td>
          </tr>
          <tr> 
            <td width="35%"><font face="Arial, Helvetica, sans-serif" size="-1">&nbsp;</font></td>
            <td colspan="2" width="65%"> <font face="Arial, Helvetica, sans-serif" size="-1"> 
              <input type="submit" name="submit_resume" value="Submit Resume">
              </font></td>
          </tr>
        </table>
<?php
   		break;
		
	Case "form05";
	
		//display the submitted form response
?>
		<table width="70%" border="0" cellpadding="6" align="center">
          <tr> 
            <td width="165%" colspan="3"><font face="Arial, Helvetica, sans-serif" size="-1"><b>Thank 
              You - We have received your resume and any jobs you applied for.</b></font></td>
          </tr>
        </table>
<?php
		break;		
}
?>
        <p>&nbsp;</p>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
