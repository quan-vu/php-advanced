<?php declare(strict_types=1);

use Employee as GlobalEmployee;

/**
 * Inheritance Object
 */

class Person
{
    public string $name;
    protected int $age;
    private string $phone;

    public function __construct($name, $age, $phone)
    {
        $this->name = $name;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function hello(): string
    {
        return "Hello from person";
    }

    /**
     * getAge()
     * 
     * We dont want to child class overwrite so we use final
     */
    final public function getAge()
    {
        return $this->age;
    }
}

/**
 * Employee object
 * 
 * - Extends from Person
 * - Have salary property is private
 */
class Employee extends Person
{
    private float $salary;

    public function __construct($name, $age, $phone, $salary)
    {
        parent::__construct($name, $age, $phone);
        $this->salary = $salary;
    }

    public function hello(): string
    {
        return "Hello, I am an employee: {$this->name}";
    }
}

/**
 * Student object
 * 
 * - Extends form Person
 * - Has studentNo is public
 */
class Student extends Person
{
    public string $studentNo;

    public function __construct($name, $age, $phone, $studentNo)
    {
        parent::__construct($name, $age, $phone);
        $this->studentNo = $studentNo;
    }

    public function hello(): string
    {
        return "Hello, I am student: {$this->name} with NO: {$this->studentNo}";
    }
}

$employee = new Employee('John', 27, '123456', 1600);
$student = new Student('David', 20, '123123', 'ST-00001');

echo $employee->hello().PHP_EOL;
echo $student->hello().PHP_EOL;

