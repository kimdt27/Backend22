<?php
class ClassParent
{
    public function doStuff(){
        echo "i'm the parent";
    }
}

class ClassChild extends ClassParent{
    public function doStuff()
    {
        parent::doStuff();
    }
}

$obj = new ClassChild();
$obj->doStuff();