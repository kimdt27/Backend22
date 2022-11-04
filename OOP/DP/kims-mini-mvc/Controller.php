<?php
class Controller
{
    private $student;

    public function __construct(){
        $this->student = new StudentModel();
    }

    public function welcomePage() {
        $students = $this->student->all();
        require_once("welcomePage.php");
    }
    public function welcomePage2(){
        $this->student->getAll();
        require_once("welcomePage2.php");

    }
}