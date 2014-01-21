<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<?php

if (isset($_POST[posted])) {

   //get the folder to search for
   $folder_to_find = $_POST[folder_name];

   //set the default directory
   $default_dir = array(realpath("/Inetpub/wwwroot/beginning_php5/appendix_a/"));

   //create an array to hold any matches
   $matching_folder_file_names = array();

  while (count($default_dir) > 0) {
    foreach ($default_dir as $dir_key => $startingdir) {
     if ($dir = @opendir($startingdir)) {
       while (($file = readdir($dir)) !== false) {
         if (($file != '.') && ($file != '..')) {
           $real_path_name = realpath($startingdir.'/'.$file);
           if (is_dir($real_path_name)) {
             if (!in_array($real_path_name, $matching_folder_file_names) && !in_array($real_path_name, $default_dir)) {
               $default_dir[] = $real_path_name;
               if ($folder_to_find == $file) {
                 $dir_list[] = $real_path_name;
               }
             }
           } 
         }
       }
       closedir($dir);
     }
     $matching_folder_file_names[] = $startingdir;
     unset($default_dir[$dir_key]);
    }
  }

  $dir_list = array_unique($dir_list);
  sort($dir_list);

  foreach ($dir_list as $dirname) {
    echo $dirname."<br>";
  }
}
?>
<form method="POST" action="ch07ex01.php">
<input type="hidden" name="posted" value="true">
  <table width="100%" border="0" cellpadding="6">
    <tr> 
      <td><b><font face="Arial, Helvetica, sans-serif">Welcome to Beginning PHP5</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Chapter 07</font></b></td>
      <td><b><font face="Arial, Helvetica, sans-serif">Exercise 01</font></b></td>
    </tr>
    <tr> 
      <td colspan="3"> 
        <p><font face="Arial, Helvetica, sans-serif" size="-1">Please enter the 
          folder to search for:</font></p>
        <table width="40%" border="0" cellpadding="6" align="center">
          <tr> 
            <td width="36%"><font face="Arial, Helvetica, sans-serif" size="-1"><b>Folder 
              Name</b></font></td>
          </tr>
          <tr> 
            <td width="36%"> 
              <input type="text" name="folder_name" size="40">
            </td>
          </tr>
          <tr> 
            <td width="36%"> 
              <input type="submit" name="search" value="Search">
            </td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
