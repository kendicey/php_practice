<?php
$php_version = file_get_contents('http://php.net/releases/?json');
//print $php_version;
$php_info = json_decode($php_version);
print $php_info->{'8'}->source[0]->name;
?>