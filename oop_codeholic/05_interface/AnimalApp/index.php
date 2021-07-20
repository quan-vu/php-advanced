<?php

require_once 'Bird.php';
require_once 'Penguin.php';
require_once 'Duck.php';

$bird = new Bird;
$bird->fly();

$penguin = new Penguin;
$penguin->swim();

$duck = new Duck;
$duck->swim();
$duck->fly();