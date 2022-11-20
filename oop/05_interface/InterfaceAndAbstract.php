<?php

interface MyInterface
{
    const MY_CONSTANT = 1;

    public function method1();
    public function method2();
}

/**
 * Use abstract class can implement some methods of interface
 */
abstract class MyClass implements MyInterface
{
    const MY_CONSTANT = 2;

    public function method2()
    {
        
    }
}

class MyClass2 extends MyClass
{
    public function method1()
    {
        
    }
}