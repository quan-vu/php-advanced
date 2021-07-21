<?php

namespace App;

require_once 'ns.php';

use \Datetime;
use OOPNamespace1\User;
use OOPNamespace1\{
    Article,
    Comment
};
use function OOPNamespace1\{
    strlen,
    count as MyCount
};

// Demo
$user = new User();
$article = new Article();
$comment = new Comment();

$d = new Datetime();

echo "String length with build-in php: " . \strlen('aaaa') . PHP_EOL;
echo "String length with namespace: " . \OOPNamespace1\strlen('aaaa') . PHP_EOL;
echo "String length with namespace function: " . strLen('aaaa') . PHP_EOL;
echo "Count array with namespace function: " . MyCount([]) . PHP_EOL;

// php index.php
