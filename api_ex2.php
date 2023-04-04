<?php
// print out the latest version of PHP released with cURL
// ***USING CURL TO RETRIEVE DATA FROM PHP IS NO LONGER ALLOWED***
$url = 'http://numbersapi.com/12/24';
$c = curl_init($url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$info = curl_exec($c);
$c_info = curl_getinfo($c);
if ($info === false) {
    print "cURL error number: " . curl_errno($c);
    print "<br>error message: " . curl_error($c);
} else if ($c_info['http_code'] >= 300) {
    print "HTTP error code: {$c_info['http_code']}";
} else {
    print $info;
}
curl_close($c);
?>