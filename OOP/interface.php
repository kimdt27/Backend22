<?php
interface door{
    public function doorsound();
}
interface moreDoor{
    public function sauron();
    public function orges();
}

class myDoor implements door, moreDoor{

    public function doorsound()
    {
        // TODO: Implement doorsound() method.
    }

    public function sauron()
    {
        // TODO: Implement sauron() method.
    }

    public function orges()
    {
        // TODO: Implement orges() method.
    }
}