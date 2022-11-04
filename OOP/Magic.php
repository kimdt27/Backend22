<?php
class Magic
{
    private $data = "WOOP";

    public function __set($name, $value)
    {
        echo "Setting $name to $value";
        $this->$name = $value;
    }
    public function __get($name)
    {
        echo "Getting: $name";
        return $this->$name;
    }
}

$obj = new Magic();
$obj->data = "WOOP2";
echo $obj->data;

$obj->hidden = "pawwod";
echo $obj->hidden;