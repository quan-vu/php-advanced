<?php declare(strict_types=1);

interface CacheInterface
{
    public function set(string $key, $value);
    public function get(string $key);
    public function invalidate(string $key);
}