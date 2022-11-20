<?php

require_once 'FlyableInterface.php';

class Bird implements FlyableInterface
{
    public function fly()
    {
        echo "I am bird. I am flying" . PHP_EOL;
    }
}