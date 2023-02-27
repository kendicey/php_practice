<?php
$file = fopen('dishes.csv', 'r');
if (!$file) {
    print "Error opening file: $php_errormsg";
} else {
    print "<table>";
    print "<tr><td>Dish</td><td>Price</td><td>Quantity</td></tr>";
    while (!feof($file)) {
        $line = fgets($file);
        if ($line !== false) {
            $line = trim($line);
            $data = explode(',', $line);
            print "<tr><td>{$data[0]}</td><td>{$data[1]}</td><td>{$data[2]}</td></tr>";
        }
    }
    fclose($file);
    print "</table>";
}
?>