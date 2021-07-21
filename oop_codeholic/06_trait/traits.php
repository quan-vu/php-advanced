<?php

namespace MyTraits;

/**
 * Traits
 * 
 * - Can has properties, method, static, const as nomal.
 * 
 * We design a OOP application with objects include Plain, Helicoper, Car.
 * 
 * Goals:
 * - Plain, Helioper can fly, has engine.
 * - Car has engine.
 */

trait FlyableTrait
{
    public function fly()
    {
        echo "I am flying" . PHP_EOL;
    }
}

trait EngineTrait
{
    public function hello()
    {
        echo "I have a engine" . PHP_EOL;
    }
}

class Plain
{
    use FlyableTrait, EngineTrait;
}

class Helicopter
{
    use FlyableTrait, EngineTrait;
}

class Car
{
    use EngineTrait;
}

// Plain, Helicopter can fly, has engine
$plain = new Plain;
echo "Plain:" . PHP_EOL;
$plain->fly();
$plain->hello();

$helicopter = new Helicopter;
echo "Helicopter:" . PHP_EOL;
$helicopter->fly();

// Car has engine
$car = new Car;
echo "Car:" . PHP_EOL;
$car->hello();