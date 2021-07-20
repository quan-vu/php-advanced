<?php

/**
 * PHP Magic method
 */
class Person
{
    private $name;
    private $phone;

    static $counter = 0;

    public function __construct($name, $phone)
    {
        echo "__construct is called" . PHP_EOL;
        $this->name = $name;
        $this->phone = $phone;
        self::$counter++;
    }

    public function __destruct()
    {
        echo "__destruct is called" . PHP_EOL;
    }

    public function __clone()
    {
        self::$counter++;
    }
}

// __construct
$person = new Person('Quan', 123456);

// Serialize & Unserialized
$serialized = serialize($person);
echo  "\n serialize(): " . PHP_EOL;
var_dump($serialized);

$unserialized = unserialize($serialized);
echo "\n unserialize(): " . PHP_EOL;
var_dump($unserialized);
var_dump($serialized === $unserialized);

// clone
echo "\n clone(): " . PHP_EOL;
$newPerson = clone $person;
var_dump($newPerson);

echo $person::$counter;