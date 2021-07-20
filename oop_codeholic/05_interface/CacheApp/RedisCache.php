<?php declare(strict_types=1);

require_once 'CacheInterface.php';

class RedisCache implements CacheInterface
{
    public function set(string $key, $value)
    {
        echo "Calling method " . __METHOD__ . PHP_EOL;
    }

    public function get(string $key)
    {
        echo "Calling method " . __METHOD__ . PHP_EOL;
    }

    public function invalidate(string $key)
    {
        echo "Calling method " . __METHOD__ . PHP_EOL;
    }
}