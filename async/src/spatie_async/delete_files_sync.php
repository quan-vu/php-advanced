<?php

/**
 * Example: Delete files in sync
 * 
 * - We create 10 files for this example
 * - 10 files is deleting in synchronization with 10s for complete delete a file
 * - Expected result is: Execution time ~100 seconds
*/
require_once('helper.php');

$files = create_sample_files(10);

$startTime = microtime(true);
print "[Delete files non concurrent] Start at: " . date('g:i:sa') . PHP_EOL;

// START Program
foreach($files as $file) {
    delete_file($file);
}
// END Program

print "[Delete files non concurrent] Execution time of script = ". (microtime(true) - $startTime)." sec" . PHP_EOL;
print "[Delete files non concurrent] Finish at: ". date('g:i:sa') . PHP_EOL;