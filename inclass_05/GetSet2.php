<?php
class GetSet2{
    private $fullName;
    private $age;

    public function getFullName(){
        return $this->fullName;
    }
    public function getAge(){
        $newAge = md5($this->age);
        return $newAge;
    }
    public function setFullName($value){
        $this->fullName = $value;
    }
    public function setAge($value){
        $this->age = $value;
    }
    public function echoNameAge(){
        echo "Hi I'm ". $this->fullName."<br>";
        echo "I'm ". $this->age." Years old";
    }
}
$testOBJ = new GetSet2();
$testOBJ->setFullName("Kim T");
$testOBJ->setAge(37);

$testOBJ->echoNameAge();

echo $testOBJ->getFullName();
echo $testOBJ->getAge();

echo "INSERT INTO usertable VALUES ".$testOBJ->getFullName()." , ".
    $testOBJ->getAge();