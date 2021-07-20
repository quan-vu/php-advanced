<?php

require_once 'Application.php';
require_once 'FileCache.php';
require_once 'RedisCache.php';

// Only change happends here
$app = new Application(
    new FileCache()
    // new RedisCache()
);

$HTML = "...";
$app->cache->set('home-page', $HTML);
$app->cache->get('home-page');
$app->cache->invalidate('home-page');

// Run app
// php index.php