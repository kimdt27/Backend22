<?php
class Vistest{
    public $one = "I'm nr. One!!1";
    private $two = "THIS IS TWO!";
    protected $three = "Imma nr. three!!! hehe";

    function __construct(){
        echo $this->one . "<br>";
        echo $this->two . "<br>";
        echo $this->three . "<br>";
    }
    public function change($param1, $param2){
        $this->two = $param1;
        $this->three = $param2;
        echo $this->one . "<br>";
        echo $this->two . "<br>";
        echo $this->three . "<br>";
    }
}

$vtest = new Vistest();
$vtest->one = "Doingleberrys!";
echo $vtest->one;
$vtest->change("im the new two", "ya boi nr 3");
