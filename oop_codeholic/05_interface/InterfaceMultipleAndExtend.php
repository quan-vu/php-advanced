<?php

interface MyInterface
{
    public function method1();
}

interface MyInterface2
{
    public function method2(): string;
}

/**
 * Extends other interface
 */
interface MyInterface3 extends MyInterface, MyInterface2
{
    public function method3();
}

class MyClass implements MyInterface3
{
    public function method1()
    {
        
    }

    public function method2(): string
    {
        return "";
    }

    public function method3()
    {
        
    }
}