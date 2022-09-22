<?php
require_once "dbcon.php";
if (isset($_POST['entryID']) && isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $entryID = $_POST['entryID'];

    $dbCon = dbCon($user, $pass);
    $query = $dbCon->prepare("UPDATE customers SET `username`='$userName', `Fname`='$firstName', `Lname`='$lastName', `email`='$email', `description`='$description' WHERE ID=$entryID");
    $query->execute();
    header("Location: index.php?status=updated&ID=$entryID");

}else{
    header("Location: index.php?status=0");
}