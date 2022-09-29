<?php
class DbCon
{
    private $user = "root";
    Private $pass = "123456";
    public $dbCon;
    public function __construct(){
        $user = $this->user;
        $pass = $this->pass;

        try {
            $this->dbCon = new PDO('mysql:host=localhost;dbname=login;charset=utf8', $user, $pass);
            return $this->dbCon;
        } catch (PDOException $err) {
            echo "Error!: " . $err->getMessage() . "<br/>";
            die();
        }}

    public function DBClose(){
        $this->dbCon = null;
    }
}