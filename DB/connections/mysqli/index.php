<?php require_once("includes/connection.php"); 

$query = "SELECT * FROM names";
$result = mysqli_query($connection, $query) or die('Error, query failed');

while ($row = mysqli_fetch_array($result))
{
echo
$row["ID"]." ".
$row["fname"]." ".
$row["lname"]." ".
$row["age"]."<br />";
}
?>
