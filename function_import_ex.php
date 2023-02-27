<!-- Put your function from the previous exercise in one file. 
     Then make another file that loads the first file and uses it to print out some <img /> tags -->

<?php
require 'function_ex.php';
echo returnHTML("photo.png");
echo returnHTML("photo1.png", "photo1", "200px");
echo returnHTML("photo2.png");
?>