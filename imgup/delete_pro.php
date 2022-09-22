<?php
require_once ("includes/connection.php");

$id=$_GET['id'];
$query = "SELECT * FROM `imgs` WHERE ID='$id'";
$result = mysqli_query($connection, $query) or die("nope!");
mysqli_query($connection, "DELETE FROM `imgs` WHERE ID='$id'");
while ($row = mysqli_fetch_array($result)){
    $file = "img/".$row['filename'];
}
unlink($file);
header("Location: delete.php");