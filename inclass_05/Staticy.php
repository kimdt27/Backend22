<?php
class Staticy{
    public static $staticVar = "I'm Static dude!";
    public static function staticEcho(){
        echo "I'm the static function! dude!";
        echo self::$staticVar;
    }
}

$test = new Staticy();

echo Staticy::$staticVar;
Staticy::staticEcho();

