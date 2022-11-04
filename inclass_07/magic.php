<?php
class Magic{
    private $myVar = "YAY";

    public function __set($name, $value){
        echo "Setting '$name' to '$value' <br>";
        $this->$name = $value;
    }
    public function __get($name){
        echo "Getting '$name' <br>";
        return $this->$name;
    }
}
$obj = new Magic();
$obj->myVar = "Pineapple";
$obj->myNewVar = "Turd";

echo $obj->myVar;
echo $obj->myNewVar;