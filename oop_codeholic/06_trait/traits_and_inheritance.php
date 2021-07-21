<?php

/**
 * Traits 
 * 
 * Use with inhertitance
 * 
 * In inheritance, Trait overwite method of parent class if has same method name.
 */

trait HelloTrait
{
    public function hello()
    {
        echo "Hello form HelloTrait." . PHP_EOL;;
    }
}

class A
{
    public function hello()
    {
        echo "Hello from class A" . PHP_EOL;
    }
}

class ChildA extends A
{

}

class ChildAUseTrait
{
    use HelloTrait;
}

// Should be run hello() from parent class
$childA = new ChildA();
$childA->hello();

// should be run hello() from trait
$childA2 = new ChildAUseTrait();
$childA2->hello();