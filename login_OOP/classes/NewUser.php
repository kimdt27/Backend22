<?php
class NewUser
{
    public $message;
    public function __construct($username, $password)
    {
    // perform validations on the form data
    $db = new DbCon();
    $user = trim($username);
    $pass = trim($password);
    $iterations = ['cost' => 15];
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT, $iterations);
    $query = $db->dbCon->prepare("INSERT INTO `users` (user, pass) VALUES ('{$user}', '{$hashed_password}')");

    if ($query->execute()) {
        $this->message = "User Created.";
    } else {
        $this->message = "User could not be created.";
    }
    $db->DBClose();
}
}