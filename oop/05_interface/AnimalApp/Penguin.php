<?php

require_once 'SwimmableInterface.php';

class Penguin implements SwimmableInterface
{
    public function swim()
    {
        echo "I am a penguin. I am swimming" . PHP_EOL;
    }
}