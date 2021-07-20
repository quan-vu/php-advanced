<?php

/**
 * Object Car
 */
class Car
{
    private string $color = 'black';
    private float $weight;
    private string $year;
    private array $avaiableColors = [
        'red', 'green', 'blue', 'white'
    ];

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setColor($color)
    {
        if (in_array($color, $this->avaiableColors)) {
            $this->color = $color;
        }
    }

    public function getColor()
    {
        return $this->color;
    }

}

$myCar = new Car();
$myCar->setColor('white');
$myCar->setYear('2010');

$myCar2 = new Car();

// Get/Set data
echo $myCar->getYear()."\n";
echo $myCar->getColor()."\n";
print_r($myCar);
var_dump($myCar);

// compare two instances
var_dump($myCar === $myCar2);

// Clone a instance
$myCar2 = clone $myCar;
$myCar2->setYear('2021');
var_dump($myCar2);

