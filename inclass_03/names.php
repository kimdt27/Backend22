<?php
require ("conn.php");
$query = "SELECT * FROM names";
$result = mysqli_query($conn, $query) or die("noope!");
while ($row = mysqli_fetch_array($result)){
    echo
        $row['ID']. " - ".
        $row['fname']. " - ".
        $row['lname']. " - ".
        $row['age']. "<br>";
}