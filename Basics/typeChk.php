<?php
$a = "Hi";
$b = 52.20;
$c = "1234yolo";

var_dump(is_array($a)); //false
var_dump(is_bool($a)); //false
var_dump(is_float($b)); //false
var_dump(is_int($b));//true
var_dump(is_null($c)); //false
var_dump(is_string($c)); //true
var_dump(is_numeric($c)); //true

echo $c+$b;
