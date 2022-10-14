<?php
interface door{
    public function openDoor();
}
interface bigDoor{
    public function slow();
    public function Sound();

}

class GateDoor implements door, bigDoor{

    public function openDoor()
    {
        // TODO: Implement openDoor() method.
    }

    public function slow()
    {
        // TODO: Implement slow() method.
    }

    public function Sound()
    {
        // TODO: Implement Sound() method.
    }

}