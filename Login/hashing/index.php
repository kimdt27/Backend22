<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "123456");
define("DB_NAME", "hash");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno($connection)) {
    die ("Failed to connect to MySQL: " . mysqli_connect_error());
}

$setPass = $_GET['setPass'];
$iterations = ['cost' => 15];
$Hpass = password_hash($setPass, PASSWORD_BCRYPT, $iterations);

//Hpass is then saved to DB
$query = "INSERT INTO hash (pass) VALUES ('{$Hpass}')";
$result = mysqli_query($connection, $query);
echo "This is the hashed pass: ".$Hpass . "<br>";
echo "The length of the string is: ". strlen($Hpass);