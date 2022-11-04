<?php
class ClassParent{
    public function doStuff(){
        echo "I'm The parent";
    }
}
class ClassChild extends ClassParent {
    public function doStuff(){
        echo "I'm the child";
        parent::doStuff();
    }
}
$obj = new ClassChild();
$obj->doStuff();