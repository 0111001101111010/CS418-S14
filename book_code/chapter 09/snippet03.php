<?php
//beginning of page
echo "Beginning";

//we are going to make a call to
//a function that doesn't exist
//this will generate an E_ERROR
//and will halt script execution
//after the call of the function
fatalerror();

//end of page
echo "End";
//won't be output due to the fatal error
?>
