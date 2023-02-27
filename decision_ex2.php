<!-- 
    Use while() to print a table of Fahrenheit and Celsius temperature
    equivalents from -50 degrees F to 50 degrees F in 5-degree increments.
    On the Fahrenheit temperature scale, water freezes at 32 degrees and boils
    at 100 degrees. So, to convert from F to C, you subtract 32 from F, multiply
    by 5, and divided by 9. To convert from C to D, you multiply by 9, divide by 5,
    and then add 32.
 -->

<?php

$F = -50;

while ($F <= 50) {
    $C = ($F - 32) * 5 / 9;
    echo $F . " " . number_format($C, 2, '.', ',') . "<br>";
    $F += 5;
}

?>

<!-- 
    Modify your answer to use for() instead of while().
 -->

<?php

echo "<br><br>";

for ($F = -50; $F <= 50; $F += 5) {
    $C = ($F - 32) * 5 / 9;
    echo $F . " " . number_format($C, 2, '.', ',') . "<br>";
}

?>