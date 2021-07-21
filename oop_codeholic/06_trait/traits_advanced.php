<?php

namespace MyAdvancedTraits;

/**
 * Traits Advanced
 * 
 * - Can has properties, method, static, const as nomal.
 * - Example use abstract, statis, const
 * 
 * We design a OOP application with objects include Plain, Helicoper, Car.
 * 
 * Goals:
 * - Plain, Helioper can fly, has engine.
 * - Car has engine.
 */

trait FlyableTrait
{
    abstract public function fly();

    public function hello()
    {
        echo "Hello, I can fly" . PHP_EOL;
    }
}

trait EngineTrait
{
    public function hello()
    {
        echo "Hello, I have a engine" . PHP_EOL;
    }
}

class Plain
{
    use FlyableTrait;
    use EngineTrait {
        FlyableTrait::hello insteadOf EngineTrait;  // Special if two traits have same method
        EngineTrait::hello as engineHello;
    }

    public function fly()
    {
        echo "I am fly on 800km/h" . PHP_EOL;
    }
}

$plain = new Plain();
$plain->fly();
$plain->hello();
$plain->engineHello();

