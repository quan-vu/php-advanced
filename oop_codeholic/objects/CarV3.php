<?php

/**
 * Object CarV2
 * 
 * Use constants
 */
class Car
{
    private string $color = 'black';
    private string $manufacturer;
    
    const MANUFACTURER_BMW = 'BMW';
    const MANUFACTURER_TESLA = 'Tesla';
    const MANUFACTURER_MERCEDES = 'Mercedes';

    const COLOR_RED = 'red';
    const COLOR_GREEN = 'green';
    const COLOR_BLUE = 'blue';
    

    public function __construct($color, $manufacturer)
    {
        $this->color = $color;
        $this->manufacturer = $manufacturer;
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

$myCar = new Car(Car::COLOR_RED, CAR::MANUFACTURER_BMW);
$myCar2 = new Car(Car::COLOR_GREEN, CAR::MANUFACTURER_MERCEDES);

var_dump($myCar);
var_dump($myCar2);
