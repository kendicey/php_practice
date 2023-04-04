<?php
// print out the latest version of PHP released
$url = 'http://php.net/releases/?json';
$response = file_get_contents($url);
$info = json_decode($response, true);
print "Version: {$info[8]['date']}";
?>