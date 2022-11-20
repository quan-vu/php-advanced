<?php 

// prints e.g. Current PHP version
echo 'Current PHP version: ' . phpversion() . PHP_EOL;

// prints e.g. version number or nothing if the extension isn't enabled
echo 'PHP curl extension: ' . phpversion('curl') . PHP_EOL;

// phpinfo();