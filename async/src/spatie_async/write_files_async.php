<?php
 
require_once('vendor/autoload.php');
 
use Spatie\Async\Pool;

$startTime = microtime(true);

// START Program
$pool = Pool::create();
 
for($i = 1; $i <= 10; $i++) {
    $pool->add(function() use ($i) {
        $file_name = "tmp/file_$i.txt";
        $content = bin2hex(random_bytes(2048));
        file_put_contents($file_name, $content);
 
        return $file_name;
    })->then(function ($file_name) {
        echo "Generated file: $file_name".PHP_EOL;
    });
}
 
$pool->wait();
// END progran

print "Execution time of script = ". (microtime(true) - $startTime)." sec" . PHP_EOL;
