<?php
class Vistest{
    public $one = "I'm public";
    private $two = "I'm private";
    protected $three = "I'm Protected";

    function __construct()
    {
        echo $this->one . "<br>";
        echo $this->two . "<br>";
        echo $this->three . "<br><br>";
    }

    public function change($two2, $three2){
        $this->two = $two2;
        $this->three = $three2;
        echo $this->one . "<br>";
        echo $this->two . "<br>";
        echo $this->three . "<br><br>";

    }

}
$vtest = new Vistest();

$vtest->one = "I'm also still public";

echo $vtest->change("I'm still private", "yo protected");
