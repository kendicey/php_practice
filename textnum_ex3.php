<!-- 
    Write a PHP program that uses the increment operator (++)
    and the combined multiplication operator (*=) to print out
    the numbers from 1 to 5 and powers of 2 from 2 to 32.
 -->

<?php

$x = 1;
$y = 2;
while ($x <= 5 && $y <= 32) {
    echo $x . " " . $y ** $x . "<br>";
    $x++;
}

?>