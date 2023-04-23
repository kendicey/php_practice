<?php

$turtle = "Mann";
$bandana = "";

$bandana = match ($turtle) {
    "Leo" => "blue",
    "Raph" => "red",
    "Mike" => "orange",
    "Don" => "purple",
    default => "red",
};

echo $bandana;

?>