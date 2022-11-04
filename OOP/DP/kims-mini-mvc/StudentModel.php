<?php
class StudentModel
{
    public $students;

    public function all(){
        $students = array("Jytte","Berit","Pernille");
        return $students;

    }
    public function getAll(){
        $this->students = array("Jens","Bent","Peter");

    }

}