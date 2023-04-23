<?php

$min = 1;
$max = 50;
$guess = rand($min, $max);
$num = 16;

$difference = $guess - $num;

if ($guess > $max || $guess < $min) {
    echo "guess is out of range.";
} else {
    if ($guess > $num) {
        echo "$guess is too high!";
    } elseif ($guess < $num) {
        echo "$guess is too low!";
    } else {
        echo "Bingo! the number is $num";
    }
}
?>