<?php
require ("conn2.php");
$query2 = "SELECT * FROM names";

$result2 = $db2->query($query2,PDO::FETCH_ASSOC);
foreach ($result2 as $row){
    echo
        $row['ID']. " - ".
        $row['fname']. " - ".
        $row['lname']. " - ".
        $row['age']. "<br>";
}

