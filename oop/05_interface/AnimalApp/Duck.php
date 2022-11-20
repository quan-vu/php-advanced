<?php

require_once 'SwimmableInterface.php';
require_once 'FlyableInterface.php';

class Duck implements SwimmableInterface, FlyableInterface
{
    public function swim()
    {
        echo "I am duck. I am swimming" . PHP_EOL;
    }

    public function fly()
    {
        echo "I am duck. I am flying" . PHP_EOL;
    }
}