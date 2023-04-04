<?php
define('MY_API_KEY', 'nf26SWpUJpQHyAIMm2dHxQWFIyKwoqka4NhJAKUG');

$params = [
    'api_key' => MY_API_KEY,
    'date' => '2022-12-24',
];

$url = "https://api.nasa.gov/planetary/apod?" . http_build_query($params);

$response = file_get_contents($url);
$info = json_decode($response);
foreach ($info as $key => $value) {
    print "{$key}:<br> {$value}<br><br>";
}

?>