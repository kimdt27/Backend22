<?php
require_once "dbcon.php";
if (isset($_POST['submit'])) {

$userName = $_POST['userName'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$description = $_POST['description'];

$dbCon = dbCon($user, $pass);
$query = $dbCon->prepare("INSERT INTO customers (`username`, `Fname`, `Lname`, `email`, `rank`, `description`) VALUES ('$userName', '$firstName', '$lastName', '$email', 3, '$description')");
$query->execute();
    header("Location: index.php?status=added");

}else{
    header("Location: index.php?status=0");
}