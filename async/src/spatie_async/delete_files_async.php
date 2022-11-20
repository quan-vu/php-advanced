<?php

/**
 * Example 2: Delete files in concurrent
 * 
 * - We create 10 files for this example
 * - 10 files is deleting at the same time with 10s for complete delete a file
 * - Expected result is: Execution time ~10 seconds
 */
require_once('helper.php');
require_once('vendor/autoload.php');
 
use Spatie\Async\Pool;

// create sample data
$files = create_sample_files(10);
$startTime = microtime(true);

// START program 
$totalFiles = count($files);

if ($totalFiles) {
    $pool = Pool::create();

    for($i = 1; $i < $totalFiles; $i++) {
        $pool->add(function() use ($i, $files) {
            $file_name = $files[$i];
            if(is_file($file_name)) {
                sleep(10);
                unlink($file_name);
                return $file_name;
            } else {
                return "";
            }
        })->then(function ($file_name) {
            echo "Deleted file: $file_name".PHP_EOL;
        });
    }
    
    $pool->wait();
}
// END Program

print "Execution time of script = ". (microtime(true) - $startTime)." sec" . PHP_EOL;

