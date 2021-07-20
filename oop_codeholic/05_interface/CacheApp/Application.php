<?php declare(strict_types=1);

require_once 'CacheInterface.php';

class Application
{
    public $cache;

    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }
}