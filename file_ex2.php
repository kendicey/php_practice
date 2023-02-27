<?php
$lineArray;

$file = fopen('addresses.txt', 'r');

while (!feof($file)) {
    $line = trim(fgets($file));
    $lineArray[] = $line;
}

$countArray = (array_count_values($lineArray));
$countfile = fopen('addresses-count.txt', 'a');

arsort($countArray);
print_r($countArray);

foreach ($countArray as $address => $occurrence) {
    fwrite($countfile, $occurrence . "," . $address . "\n");
}

?>