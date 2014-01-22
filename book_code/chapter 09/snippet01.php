<?php
//set string with "Wrox" spelled wrong
$string_variable = "Worx books are great!";

//try to use str_replace to replace Worx with Wrox
//this will generate an E_WARNING
//because of wrong parameter count
str_replace("Worx", "Wrox");
?>
