<!-- 
    Write a PHP program that sets the variable $first_name to your first name
    and $last_name to your last name. Print our a string containing your first
    and last name separated by a space. Also print out the length of the string.
 -->

<?php

$first_name = "Kendice";
$last_name = "Yeung";

$full_name = "$first_name $last_name";
echo "$full_name : " . strlen($full_name);

?>