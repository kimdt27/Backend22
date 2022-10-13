<?php
class GetSet
{
    private $FullName;
    private $Age;

    public function setFullName($value){
        $value = htmlspecialchars(trim($value));
        $this->FullName = $value;
    }
    public function getFullName(){
        return $this->FullName;
    }
    public function setAge($value){
        $this->Age = $value;
    }
    public function getAge(){
        return $this->Age;
    }
    public function showNameAge(){
        echo "Hi my name is ". $this->FullName."<br>";
        echo "I am ". $this->Age." years old.";
    }
}

$testOBJ = new GetSet();
$testOBJ->setFullName("Kim Thoeisen");
$testOBJ->setAge(34);

echo $testOBJ->getFullName();
echo " - ";
echo $testOBJ->getAge();

echo "<br><br>";

$testOBJ->showNameAge();

echo "INSERT INTO usertable VALUES ". $testOBJ->getFullName(). ",".$testOBJ->getAge();
