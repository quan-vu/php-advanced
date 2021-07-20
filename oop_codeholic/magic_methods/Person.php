<?php

/**
 * PHP Magic method
 */
class Person
{
    private $name = 'John';
    private $phone = 12345;

    public function __construct()
    {
        echo "__construct is called" . PHP_EOL;
    }

    public function __destruct()
    {
        echo "__destruct is called" . PHP_EOL;
    }

    /**
     * __sleep
     * 
     * Call after serialize
     */
    public function __sleep()
    {
        unset($this->phone);
        return ['name'];
    }

    /**
     * __wakeup
     * 
     * Call after unserialize
     */
    public function __wakeup()
    {
        echo "I am waking up";
    }

    /**
     * __invoke()
     * 
     * Allow object is call as a function
     * Usage: $myobject()
     */
    public function __invoke()
    {
        return "Object is called as a function";
    }

    /**
     * __call
     * 
     * If you call an un-exist method, This method will handle.
     */
    public function __call($name, $arguments)
    {
        // var_dump($name, $arguments);
        if ($name === 'getMobilePhone') {
            return $this->getPhone();
        } elseif ($name === 'setMobilePhone') {
            call_user_func_array([$this, 'setPhone'], $arguments);
        }
    }

    /**
     * __toString
     * 
     * Convert object to a string string
     */
    public function __toString()
    {
        return "Name: {$this->name}, Phone: {$this->phone}";
    }

    /**
     * __get
     * 
     * Return value of a property if it is not public
     * Usage: object->property
     */
    public function __get($property)
    {
        if(property_exists($this, $property)) {
            return $this->$property;
        }
        throw new Exception("Property \"{$property}\" doesn't exist");
    }

    /**
     * __set
     * 
     * Initialize a property
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($value)
    {
        $this->phone = $value;
    }
}

// __construct
$person = new Person();

// __toString
echo "__toString(): " . $person.PHP_EOL;

// __get
echo "__get(): " . $person->name.PHP_EOL;

// __set
$person->lastname = "Caster";
echo "__set(): " . $person->lastname . PHP_EOL;

// __call
// Try to call an un-exists method
echo "__call(): " . $person->getMobilePhone() . PHP_EOL;

$person->setMobilePhone('(111)11111111');
echo "__call(): " . $person->getMobilePhone() . PHP_EOL;

// __invoke
echo  "__invoke(): " . $person() . PHP_EOL;

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