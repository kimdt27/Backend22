<?php
class Singleton
{
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }
        return $instance;
    }
    //constructor Protected to prevent creating
    //a new instance of the Singleton
    protected function __construct()
    {
    }
    //Private clone method to prevent cloning
    // of the instance
    private function __clone()
    {
    }
}
class SingletonChild extends Singleton
{
}
$obj = Singleton::getInstance();
var_dump($obj === Singleton::getInstance());
//returns bool(true)

$anotherObj = SingletonChild::getInstance();
var_dump($anotherObj === Singleton::getInstance());
//returns bool(false) - Singleton can't set up a new instance.

var_dump($anotherObj === SingletonChild::getInstance());
//returns bool(true) - Singleton works, both variables ($anotherObj & $obj) contain the same instance.

