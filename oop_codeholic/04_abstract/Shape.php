<?php

/**
 * Abstracl class Shap
 */

abstract class Shape
{
    public $color;

    abstract public function getArea(): float;

    public function getColor()
    {
        return $this->color;
    }
}

class Triangle extends Shape
{
    public float $base;
    public float $height;

    public function __construct(string $color, float $base, float $height)
    {
        $this->color = $color;
        $this->base = $base;
        $this->height = $height;   
    }

    public function getArea(): float
    {
        return ($this->base * $this->height) / 2;
    }
}

class Rectangle extends Shape
{
    public float $width;
    public float $length;

    public function __construct(string $color, float $width, float $length)
    {
        $this->color = $color;
        $this->width = $width;
        $this->length = $length;   
    }

    public function getArea(): float
    {
        return $this->width * $this->length;
    }
}

class Circle extends Shape
{
    const PI = 3.14;

    public float $radius;

    public function __construct(string $color, float $radius)
    {
        $this->color = $color;
        $this->radius = $radius;
    }

    public function getArea(): float
    {
        return $this->radius * $this->radius * self::PI;
    }
}

$triangle = new Triangle('green', 3, 5);
$rectangle = new Rectangle('red', 10, 5);
$circle = new Circle('blue', 6);

echo "Triangle area: " . $triangle->getArea() . PHP_EOL;
echo "Rectangle area: " . $rectangle->getArea() . PHP_EOL;
echo "Circle area: " . $circle->getArea() . PHP_EOL;
