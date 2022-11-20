<?php

require_once 'Application.php';
require_once 'FileLog.php';
require_once 'DbLog.php';
require_once 'RESTLog.php';

// Only change happends here
$app = new Application(
    // new FileLog()
    new DbLog()
    // new RESTLog()
);

$app->logger->error("Error Message");
$app->logger->success("Success Message");
$app->logger->warning("Warning Message");
$app->logger->info("Info Message");
$app->logger->log("debug", "Debug Message");

// Run app
// php index.php