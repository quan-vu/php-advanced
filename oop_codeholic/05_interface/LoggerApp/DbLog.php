<?php declare(strict_types=1);

require_once 'AbstractLogger.php';

class DbLog extends AbstractLogger
{
    public function log(string $level, string $message)
    {
        echo "Calling method " . $level. " " . __METHOD__ . PHP_EOL;        
    }
}