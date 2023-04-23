<?php

$current = 1;
$prev = 0;
$next;

while ($current < 200) {
    echo $current . ' ';
    $next = $current + $prev;
    $prev = $current;
    $current = $next;
}

echo Date('d F, Y');

?>