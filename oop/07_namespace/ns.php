<?php

namespace OOPNamespace1;

class User
{
    public function hello()
    {
        echo "Hello, I am a User" . PHP_EOL;
    }
}

class Article
{

}

class Comment
{

}

function strlen($s)
{
    return "strlen in " . __METHOD__;
}

function count(array $arr)
{
    return "count array in " . __METHOD__;
}