<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "123456");
define("DB_NAME", "hash");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno($connection)) {
    die ("Failed to connect to MySQL: " . mysqli_connect_error());
}

$UserInputPass = $_GET['userPass'];
$checkID = $_GET['id'];

echo "Is " . $UserInputPass . " salted and hashed in the DB as ID ".$checkID."?<br>";
$select_query = "SELECT * FROM hash where ID = $checkID";
$select_result = mysqli_query($connection, $select_query);

while ($row = mysqli_fetch_array($select_result)) {
        var_dump(password_verify($UserInputPass, $row['pass']));
}