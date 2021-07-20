<?php

/**
 * Object CarV2
 * 
 * Use construct
 */
class Car
{
    private string $color = 'black';
    private float $weight;
    private string $year;
    static private array $avaiableColors = [
        'red', 'green', 'blue', 'white'
    ];

    public function __construct($color, $year, $weight)
    {
        $this->color = $color;
        $this->year = $year;
        $this->weight = $weight;
    }

    public static function getAvaiableColors()
    {
        return self::$avaiableColors;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getWeight()
    {
        return $this->weight;
    }
}

$myCar = new Car('blue', '2020', 500.25);
$myCar2 = new Car('green', '2022', 1000.25);

echo $myCar->getColor().PHP_EOL;
echo $myCar2->getColor().PHP_EOL;

// Static method must be call without create an instance
$avaiableColors = Car::getAvaiableColors();
print_r($avaiableColors);