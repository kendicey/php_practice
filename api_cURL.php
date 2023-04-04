<?php
$c = curl_init('http://numbersapi.com/12/24');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$fact = curl_exec($c);
$curl_info = curl_getinfo($c);
if ($fact === false) {
    print "Error #" . curl_errno($c);
    print "<br>Error message: " . curl_error($c);
} else if ($curl_info['http_code'] >= 400) {
    print "HTTP error code: {$curl_info['http_code']}";
} else {
    print "Successful response! Total time: {$curl_info['total_time']}";
}
curl_close($c);
?>