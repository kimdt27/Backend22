<?php
require_once("includes/connection.php");
$query = "SELECT * FROM names";
$res1 = $db->query($query, PDO::FETCH_ASSOC);

foreach ($res1 as $row) {
    echo $row['ID'] . " ";
    echo $row['fname'] . " ";
    echo $row['lname'] . " ";
    echo $row['age'] . "<br>";
}
$res2 = $db->query($query);

while ($row = $res2->fetch(PDO::FETCH_ASSOC)) {
    echo
        $row['ID'] . " ".
        $row['fname'] . " ".
        $row['lname'] . " ".
        $row['age'] . "<br>";
}

$db = null;
