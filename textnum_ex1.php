<!-- 
    Write a PHP program that computes the total cost of this restaurant meal:
    two hamburgers at $4.95 each,
    one chocolate milkshake at $1.95,
    and one cola at 85 cents.
    The sales tax rate is 7.5%, and you left a pre-tax tip of 16%.
 -->

<?php

$hamburger = 4.95;
$chocolateMilkshake = 1.95;
$cola = 0.85;
$salesTax = 1.075;
$tip = 1.6;

$total = ($hamburger * 2 + $chocolateMilkshake + $cola) * $tip * $salesTax;

echo "The total cost is: $" . number_format($total, 2, '.', ',');

?>